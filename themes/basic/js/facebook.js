    FB.init({
        appId  : 440958892676429,
        status : true, // check login status
        cookie : true, // enable cookies to allow the server to access the session
        xfbml  : true  // parse XFBML
    });

    FB.Canvas.setAutoGrow();

window.fbAsyncInit = function() {
    FB.Canvas.setAutoGrow();
}

window.fbAsyncInit = function() {
    FB.Canvas.setAutoGrow();
}
// Do things that will sometimes call sizeChangeCallback()
function sizeChangeCallback() {
    
    //FB.Canvas.setSize({ width: 640, height: 1880 });
    FB.Canvas.setAutoGrow();
}

$(document).ready(function() {


    sizeChangeCallback();

});
 
 
$(document).mouseover(function() {
    
    sizeChangeCallback();
});


function publish_stream_pop(post_name,details,url,pic)
{
	 FB.ui(
	   {
		 method: 'feed',
		 name: post_name,
		 link: url,
		 picture: pic,
		 caption: '',
		 description: details,
		 message: ''
	   },
	   function(response) {
		 if (response && response.post_id) {
		  alert('Post was published.');
		 } else {
		 alert('Post was not published.');
		 }
	   }
	 );
}
		
//publish_stream_pop("MS Photo Contests",'you can win prize here','http://apps.facebook.com/contest','http://smsread.com/contest/logo.jpeg');


function publish_stream(body_msg,post_name,details,pic)
{
	var body = body_msg;
	FB.api('/me/feed', 'post', 
	{
	 message: body, 
	 name: post_name,
	 caption: 'http://apps.facebook.com/naughtiest_kids',
	 description: (details),
	 picture: pic,
	 link: 'http://apps.facebook.com/naughtiest_kids'
	
	}, function(response)
	{
            //alert(response.toSource());
            
		if (!response || response.error)
		{
		   //alert('Error occured'+response.error);
		}
		else
		{
		    //alert('Post ID: ' + response.id);
		}
	});


}
		
//publish_stream('I have just published a photo album',"My first album",'this is my full detail here',22);

function sendFriendInviteGlobal(title,message)
{

    FB.ui({
        method: 'apprequests', 
        message: message, 
        title: title
    },
    function(response) {
			
        if (response && response.to) 
        {				
            tid=response.to;
            //Sent!
            
        } else {
    //Not Sent
    }
    }); 
}

function preview_photo(img_src)
{
    
    if(img_src!='')
    {
        $("#browse_area").html("<div style='color:green'>(image attached)</div>");
    }

}

function remove_fb_pic()
{
        $("#demoPhoto").show();
	        
        $("#fb_photo").val('');        
        
	//document.getElementById('browse_area').style.display='';
	$("#fb_area").hide();
}

//customFbShare used for post sharing

function customFbShare(title,details,url,img){

    var popupUrl = "https://www.facebook.com/sharer.php?s=100&p[url]="+url+"&p[images][0]="+img+"&p[title]="+title+"&p[summary]="+details;

    newwindow=window.open(popupUrl,'Facebook','height=320,width=650');
        if (window.focus) {newwindow.focus()}
        return false;
}

//ammar custom facebook share

 FB.init({appId: "440958892676429", status: true, cookie: true});

      function postToFeed(title,details,url,img) {

        // calling the API ...
        var obj = {
          method: 'feed',
         // redirect_uri: '',
          link: url,
          picture: img,
          name: title,
          //caption: 'Reference Documentation',
          description: details
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
}
