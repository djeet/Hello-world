<?php

class UploadsController extends AppController {
//public $helpers = array('Html', 'Form', 'Image');
public $components = array('ImageUploader');
//public $type = 'attachment';

function picture(){
  App::uses('Sanitize', 'Utility');

  $output= array();  
  $data=Sanitize::clean($this->request->data);

  $file = $data['file']['image'];

  //the folder where the files will be stored
  $fileDestination = 'files';

  //the folder where the thumbnails will be saved (files/thumbnails/)
  $thumbnailDestination = $fileDestination.'/thumbnails/';

  /*
   * 
   * this is an array of options that can be passed to the 
   * ImageUploader function upload($formData, $path=null,$options=array('custom_name'=>null, 'thumbnail'=>null, 'max_width'=>null))
   * 
   * 
   * where $formData is the uploaded file, $path is the path where the file will be saved,
   * and options are available when uploading the image 
   * $options('thumbnail'=>array("max_width"=>'width_for_thumbnail',"max_height"=>'height_for_thumbnail', "path"=>'file/path/for/thumbnail/', "custom_name"=>'custom_name_for_the_thumbnail')
   *          'max_width'=>
   *          'custom_name'=>)
   * Where thumbnail is to create a thumbnail of the image when uploaded, 
   * max_width is to rescale the picture with a specific width,
   * custom_name is a custom name for the uploaded image
   * 
   * If you don't want to use options and simply upload the image just call the upload function without the options' array
   * 
   */   
  $options = array('thumbnail'=>array("max_width"=>180,
                                      "max_height"=>100, 
                                      "path"=>$thumbnailDestination),
                   'max_width'=>700);    
  try{
        //this is where the magic happens we call the function upload using the imageuploader component 
        $output = $this->ImageUploader->upload($file,$fileDestination,$options);

   }catch(Exception $e){

        $output = array('bool'=>FALSE,'error_message'=>$e->getMessage());

      }

}
}

?>
