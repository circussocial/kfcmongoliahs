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
	//$("#progressImg").show();
    },
  oncomplete:
    function(out) 
    {
	//alert(out);
	//$("#progressImg").hide();	
	out = out.toString();

	var outObj = jQuery.parseJSON(out);
	
	if(outObj.msg=="Uploaded")
	{
	   $("#UserEntry_user_image").val(outObj.filename);   
	   
	   img = outObj.filename;
	   $("#photoPreview").attr("src","https://apps.circussocial.com/protected/modules/kfcmongoliahs/themes/basic/vendors/timbthumb/timthumb.php?src=https://apps.circussocial.com/user_assets/uploads/kfcmongoliahs/"+img+"&h=143&w=176&zc=1");	   
	}

	if(outObj.msg=="invalid_file_type")
	{
	     $.prompt('<span style="color:red" >Please select valid image file.');
	     $("#fb_area").hide();
	}
	
	if(outObj.msg=="file_size_exceeded")
	{
	    $.prompt('<span style="color:red" >Image size must be less than 5 MB.');
	    $("#fb_area").hide();
	}
	
	$('.submitstep3').show();
 $('.submitstep3_image').hide();
 $('#tick2').show();
		
    }
 });
    
</script>