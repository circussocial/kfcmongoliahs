<script>

function saveBasicSettings(var_name)
{

    var themeData = {};

    themeData.themeId = <?php echo $nowTheme->id; ?>;
    themeData.localAppId = <?php echo $localApp->id; ?>;
    
	var settings = {};

	settings['adminEmail'] = {
	    'var_name':"adminEmail",
	    'value4_text':$("#adminEmail").val(),
	    'value5_text':$("#emailSubject").val()

	};
 

	settings['maintainDb'] = {
	    'var_name':"maintainDb",
	    'value1':$("#maintainDb:checked").is(':checked')
	};
	
	settings['downloadExcel'] = {
	    'var_name':"downloadExcel",
	    'value1':$("#downloadExcel:checked").is(':checked')
	};
	
	settings['enablePrelikePage'] = {
	    'var_name':"enablePrelikePage",
	    'value1':$("#enablePrelikePage").val(),
	    'value4_text':$("#uploaderImg1applicationImageNameHolder").val(),
	    'value5_text':$("#prelikePageSettingsCustomHTML").val()
	};
	
	
	//Advance
	settings['enableSelectiveAccess'] = {
	    'var_name':"enableSelectiveAccess",
	    'value1':$("#enableSelectiveAccess:checked").is(':checked')
	};
	
	settings['enableFbMobile'] = {
	    'var_name':"enableFbMobile",
	    'value1':$("#enableFbMobile:checked").is(':checked'),
	    'value4_text':$("#uploaderImg3applicationImageNameHolder").val()
	};
	
	settings['customThankYouScreen'] = {
	    'var_name':"customThankYouScreen",
	    'value1':$("#customThankYouScreen").val(),
	    'value4_text':$("#uploaderImg2applicationImageNameHolder").val(),
	    'value5_text':$("#customThankYouScreenSettingsCustomHTML").val()
	};
	
	
	settings['tabIcon'] = {
	    'var_name':"tabIcon",
	    'value1':$("#uploaderImg1applicationImageNameHolder").val(),
	    'value2':$("#tabName").val()
	};
        
        
        
        
	settings['APP_DETAILS'] = {
	    'var_name':"APP_DETAILS",
	    'value4_text':$("#APP_DETAILS_TITLE").val(),
	    'value5_text':$("#APP_DETAILS_DETAILS").val()
	};
	
	
	settings['FB_AUTO_MSG_ON_ENTRY_SUBMISSION'] = {
	    'var_name':"FB_AUTO_MSG_ON_ENTRY_SUBMISSION",	   
	    'value4_text':$("#FB_AUTO_MSG_ON_ENTRY_SUBMISSION_TITLE").val(),
	    'value5_text':$("#FB_AUTO_MSG_ON_ENTRY_SUBMISSION_DETAILS").val()  
	};
	
	
	
	settings['FB_AUTO_MSG_ON_RATING'] = {
	    'var_name':"FB_AUTO_MSG_ON_RATING",
	    'value4_text':$("#FB_AUTO_MSG_ON_RATING_TITLE").val(),
	    'value5_text':$("#FB_AUTO_MSG_ON_RATING_DETAILS").val()	    
	};
        
        
        settings['FB_AUTO_MSG_ON_WISHLIST'] = {
	    'var_name':"FB_AUTO_MSG_ON_WISHLIST",
	    'value4_text':$("#FB_AUTO_MSG_ON_WISHLIST_TITLE").val(),
	    'value5_text':$("#FB_AUTO_MSG_ON_WISHLIST_DETAILS").val()	    
	};

	
	 
	
	
	settings['FB_SHARING_SINGLE_ENTRY'] = {
	    'var_name':"FB_SHARING_SINGLE_ENTRY",
	    'value4_text':$("#FB_SHARING_SINGLE_ENTRY_TITLE").val(),	    
	    'value5_text':$("#FB_SHARING_SINGLE_ENTRY_DETAILS").val()  
	};
	
	
	settings['TWITTER_MESSAGE_SINGLE_ENTRY'] = {
	    'var_name':"TWITTER_MESSAGE_SINGLE_ENTRY",
	    'value4_text':$("#TWITTER_MESSAGE_SINGLE_ENTRY_DATA").val()
	};
	
	
	
	themeData.settings = settings[var_name];
		
	

    $.ajax({
      type: "GET",
      url: "index.php?r=kfcmongoliahs/default/saveBasicSettings",
      data: themeData
    }).done(function( out ) {
	console.log(out);
	out = out.toString();
	
	//$.jGrowl('Settings Saved');
	
	var outObj = jQuery.parseJSON(out);
	 
    });
    
    
    
    
}
    
</script>    