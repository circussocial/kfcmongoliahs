<?php $imagenamae='';?>
<script type="text/javascript">
//var jqrynoconflict = jQuery.noConflict();
var uploader = document.getElementById('uploaderImg');
//alert(uploader);
upclick(
 {
  element: uploader,
  action: 'index.php?r=<?php echo $this->moduleName; ?>/tab/uploadPhoto&signed_request=<?php echo $_REQUEST['signed_request']?>', 
  onstart:
    function(filename)
    {
		$(".mainloaderimage").show();
		$(".backcover").show();
	//$("#progressImg").show();
    },
  oncomplete:
    function(out) 
    {
	
	//$("#progressImg").hide();	
	out = out.toString();
	//alert(out);
	var outObj = jQuery.parseJSON(out);
	
	if(outObj.msg=="Uploaded")
	{
	   $("#UserEntry_user_image").val(outObj.filename);  
	   $("#framewidthandheight").val(outObj.width); 
	  // console.log(outObj.width+'fasial');
	   img = outObj.filename;
		//$('.merge_title').show();  
	    $("#photoPreview").attr("src","https://apps.circussocial.com/protected/modules/kfcmongoliahs/uploads/kfcmongoliahs/thumbs_big/"+img);
	    $("#photoPreview2").attr("src","https://apps.circussocial.com/protected/modules/kfcmongoliahs/uploads/kfcmongoliahs/thumbs_big/"+img);
	 // $("#photoPreview2").css("display","none");
	  $(".drag_drop_frmae_unsubmission").css("display","none");
	}

	if(outObj.msg=="invalid_file_type")
	{
		$(".mainloaderimage").hide();
		$(".backcover").hide();
		alert("Invalid file type");
	    // $.prompt('<span style="color:red" >Please select valid image file.');
	    // $("#fb_area").hide();
	}
	if(outObj.msg=="To small size")
	{
		$(".mainloaderimage").hide();
		$(".backcover").hide();
		alert("To small size");
	    // $.prompt('<span style="color:red" >Please select valid image file.');
	    // $("#fb_area").hide();
	}
	
	if(outObj.msg=="file_size_exceeded")
	{
	   // $.prompt('<span style="color:red" >Image size must be less than 5 MB.');
	    
		$(".backcover").css("display","block");
		$(".mainfilesizelimit").css("display","block");
	  //  $("#fb_area").hide();
	}
	$(".mainloaderimage").hide();
		$(".backcover").hide();
	//$('.submitstep3').show();
 //$('.submitstep3_image').hide();
// $('#tick2').show();
		
    }
 });
    
</script>