<?php
App::import('Vendor', 'Facebook', array('file' => 'Facebook/Facebook.php'));
class FacebookApi {
	private static $instance;

	public static function getInstance(){
		if(!$instance){
			$instance = new Facebook\Facebook([
			  'app_id'                => '417356031990919',
			  'app_secret'            => '77346a689cd309ff9e88fd33171a5558',
			  'default_graph_version' => 'v2.9',
			]);
		}
		return $instance;
	}


}