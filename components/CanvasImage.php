<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class CanvasImage
{
    //public $modulepath;
    function __construct()
    {
	//$this->modulepath = "/home/appscirc/www/protected/modules/cscoverphotolive";
    }

    public function save($saveAs)
    {

	if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
	{

	    // Get the data
	    $img = $imageData = $GLOBALS['HTTP_RAW_POST_DATA'];

	    // Remove the headers (data:,) part.  
	    // A real application should use them according to needs such as to check image type
	    //$filteredData=substr($imageData, strpos($imageData, ",")+1);
	    // 
	    //    // Need to decode before saving since the data we received is already base64 encoded
	    //    $unencodedData=base64_decode($filteredData);
	    //echo "unencodedData".$unencodedData;
	    // Save file.  This example uses a hard coded filename for testing, 
	    // but a real application can specify filename in POST variable
	    /* $fp = fopen( 'test.png', 'wb' );

	      fwrite( $fp, $unencodedData);

	      fclose( $fp ); */
	    //$img = $_POST['img'];
		
	    $img = str_replace('data:image/png;base64,', '', $img);
	    //$img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
	 
	    $success = file_put_contents($saveAs, $data);
	    if ($success)
	    {
		return end(explode("/",$saveAs));
	    }
	    else
	    {

		return 'no';
	    }
	}
    }

}