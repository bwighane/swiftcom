<?php
/**
 * FaceBookComponent
 *
 * A CakePHP Component that will connect to the facebook graph api
 *
 * @author		Bwighane Clive Mwalwanda - htt://www.facebook.com/bmwalwanda1
 * @copyright	Copyright 2017, Bwighane Clive Mwalwanda, Inc.
 *
 */
App::uses('Component', 'Controller');
App::uses('Constants', 'Lib');
App::import('Vendor', 'Facebook', array('file' => 'Facebook/Facebook.php'));
class FacebookComponent extends Component{

	private $facebook;

	public function __construct(){
		$this->facebook = new Facebook\Facebook([
			'app_id'                => '417356031990919',
		  	'app_secret'            => '77346a689cd309ff9e88fd33171a5558',
		  	'default_graph_version' => 'v2.9',
		  	// 'persistent_data_handler' => 'session'
		]);
	}

	public function getFacebook(){
		return $this->facebook;
	}

	public function getLoginUrl(){
		$helper = $this->facebook->getRedirectLoginHelper();
		$permissions = ['email', 'public_profile']; // Optional permissions
		return $helper->getLoginUrl(Constants::BASE_URL . '/users/facebooklogin', $permissions);
	}

	public function getAccessToken(){
		$facebook = $this->getFacebook();

  		$helper = $facebook->getRedirectLoginHelper();

		try {
		    $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		    throw new Exception('Facebook Graph returned an error: ' . $e->getMessage());
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		    // When validation fails or other local issues
		    throw new Exception('Facebook SDK returned an error: ' . $e->getMessage());
		}

		if (! isset($accessToken)) {
		    if ($helper->getError()) {
		    	throw new NotFoundException("Facebook Unauthorized");
		        // header('HTTP/1.0 401 Unauthorized');
		        // echo "Error: " . $helper->getError() . "\n";
		        // echo "Error Code: " . $helper->getErrorCode() . "\n";
		        // echo "Error Reason: " . $helper->getErrorReason() . "\n";
		        // echo "Error Description: " . $helper->getErrorDescription() . "\n";
		    } else {
		    	throw new NotFoundException("Facebook Bad Request");
		        // header('HTTP/1.0 400 Bad Request');
		        // echo 'Bad request';
		    }
		}

		// Logged in
		// echo '<h3>Access Token</h3>';
		// var_dump($accessToken->getValue());

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $facebook->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		// echo '<h3>Metadata</h3>';
		// var_dump($tokenMetadata);

		if (!$accessToken->isLongLived()) {
		    try {
		        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		    } catch (Facebook\Exceptions\FacebookSDKException $e) {
		        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		        exit;
		    }
		}

		$facebook->setDefaultAccessToken($accessToken);
		return $accessToken;
	}

}
