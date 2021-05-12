<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');
App::uses('ImageTool', 'Lib');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    var $phoneRegex = '/^(\+?265|0)(99|88)\d{7}$/';
    
    /*
        function for handling file uploads
        @return string - name of the file in the destination for other uses
        if the returned string is empty then the file something went wrong in the process
        
        $data['tmpName'] - the name of the temporary file after upload
        
        $data['mimeType'] - the mime type of the image
        
        $data['destinationFolder'] - where the image will go after uploading without trailing slash

        $data['acceptedMimeTypes'] - and array of mimeTypes for validation purposes
        
        $data['width'] $data['height'] - well self explanatory right
    */
	public function saveUploadedFile($data = array()){

        
        if(!isset($data['tmpName']) || !isset($data['mimeType']) || !isset($data['destinationFolder'])){
            return '';
        }
        
        if(empty($data['tmpName']) || empty($data['mimeType']) || empty($data['destinationFolder'])){
            return '';
        }

        if(!in_array($data['mimeType'], $data['acceptedMimeTypes'])){
            return '';
        }
        
        $destination = WWW_ROOT . 'img' . DS . $data['destinationFolder'] . DS;

        // if(){
        //     $destinationsM = WWW_ROOT . 'img' . DS . $data['destinationFolder'] . DS . 'sm' . DS; // for small images for the android application 
        // }
        
        // $filename = string::uuid();
        $filename = (string) microtime(true);
        
        //determining the file extension ie either jpg, png etc
        
        if($data['mimeType'] == 'image/jpeg'){
            $filename = $filename . '.jpeg';
        }elseif($data['mimeType'] == 'image/jpg'){
            $filename = $filename . '.jpg';
        }elseif($data['mimeType'] == 'image/png'){
            $filename = $filename . '.png';
        }elseif($data['mimeType'] == 'image/gif'){
            $filename = $filename . '.gif';
        }
        
        $file = $destination . $filename;
        $fileSm = $destination . 'sm' . DS . $filename;
        $fileThumbnail = $destination . 'thumbnail' . DS . $filename;


        //options for the save image

        $options = array(
            'input' => $file,
            'output' => $file,
            'width' => $data['width'],
            'paddings' => array(0,0,0),
        );


        //$data['width'] may be left out in some instances hence optional
        
        if(isset($data['height']) && !empty($data['height'])){
            $options['height'] = $data['height'];  
        }

        if(move_uploaded_file($data['tmpName'], $file)){
            ImageTool::resize($options);
            if(isset($data['productImage']) && $data['productImage'] == true){

                //100 X 100 for android ui
                $options['width'] = 100;
                $options['height'] = 100;
                $options['input'] = $file;
                $options['output'] = $fileSm;
                ImageTool::resize($options);


                //200 X 200 for the thumbnails
                $options['width'] = 220;
                $options['height'] = 220;
                $options['input'] = $file;
                $options['output'] = $fileThumbnail;
                ImageTool::resize($options);
            }
            return $filename;
        }else{
            return '';
        }
    }

    public function deleteFile($filename){
        if(file_exists($filename)){
            unlink(filename);
        }
    }

    //Custom validation rules
    public function emailOrPhone($data){
        if(Validation::email($data['username'])){
            return true;
        }elseif(preg_match($this->phoneRegex, $data['username'])){
            return true;
        }
        return false;
    }

    
    public function phoneOrNot($data, $index, $param){
        if(empty($data[$index])){
            return true;
        }elseif(preg_match($this->phoneRegex, $data[$index])){
            return true;
        }
        return false;
    }
}