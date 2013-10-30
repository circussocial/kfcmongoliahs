

<style>
    #fb_photos_listings li{
	list-style: none;
	display: inline;
	padding:3px;
    }
    </style>

<div id="fb_photos_listings" >
    

    
<ul>
    <?php
  	   foreach($photos['data'] as $photo)
	  {
	     echo "<li><a href='javascript:void(0)' onclick='select_pic(\"".$photo['source']."\",\"{$photo['picture']}\")' ><img src='{$photo['picture']}' height='80' /></a></li>";
	       
	      
	  }
    
    ?>
    </ul>
</div>    
    
  
    
<script>
    
    
function select_pic(url,url_short) 
{
	//window.opener.window.document.getElementById('fb_photo').value=url;
	
	var d = new Date();
	var nowUTC = d.getTime() + d.getTimezoneOffset()*60*1000;

	var imgName = nowUTC+"-"+uniqid()+".jpg";
	
	window.opener.window.document.getElementById('UserEntry_user_image').value=imgName;
	 
	 var xhReq = new XMLHttpRequest();
	 
  xhReq.open("GET", "index.php?r=kfcmongoliahs/tab/imagepreviewSmall&imageUrl="+url+"&imgName="+imgName+"&signed_request=<?php echo $_REQUEST['signed_request']; ?>", false);
  xhReq.send(null);
  
  var serverResponse = xhReq.responseText;
  //alert(serverResponse);

 if(serverResponse != ''){
 
 
  var img = "https://apps.circussocial.com/protected/modules/kfcmongoliahs/themes/basic/vendors/timbthumb/timthumb.php?src=https://apps.circussocial.com/user_assets/uploads/kfcmongoliahs/"+imgName+"&h=143&w=176&zc=1";
  
   window.opener.window.document.getElementById('photoPreview').src=img;
  // window.opener.window.document.getElementById('submitstep3_image').style.display = "none";
  // window.opener.window.document.getElementById('tick2').style.display = "block";
//	window.opener.window.document.getElementById('submitstep3').style.display = "block";
//	window.opener.window.document.getElementById('submitstep3_image').style.display = "none";
	
	window.close();
	 
 }

}

function uniqid (prefix, more_entropy) {
  // +   original by: Kevin van Zonneveld (https://kevin.vanzonneveld.net)
  // +    revised by: Kankrelune (https://www.webfaktory.info/)
  // %        note 1: Uses an internal counter (in php_js global) to avoid collision
  // *     example 1: uniqid();
  // *     returns 1: 'a30285b160c14'
  // *     example 2: uniqid('foo');
  // *     returns 2: 'fooa30285b1cd361'
  // *     example 3: uniqid('bar', true);
  // *     returns 3: 'bara20285b23dfd1.31879087'
  if (typeof prefix == 'undefined') {
    prefix = "";
  }

  var retId;
  var formatSeed = function (seed, reqWidth) {
    seed = parseInt(seed, 10).toString(16); // to hex str
    if (reqWidth < seed.length) { // so long we split
      return seed.slice(seed.length - reqWidth);
    }
    if (reqWidth > seed.length) { // so short we pad
      return Array(1 + (reqWidth - seed.length)).join('0') + seed;
    }
    return seed;
  };

  // BEGIN REDUNDANT
  if (!this.php_js) {
    this.php_js = {};
  }
  // END REDUNDANT
  if (!this.php_js.uniqidSeed) { // init seed with big random int
    this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
  }
  this.php_js.uniqidSeed++;

  retId = prefix; // start with prefix, add current milliseconds hex string
  retId += formatSeed(parseInt(new Date().getTime() / 1000, 10), 8);
  retId += formatSeed(this.php_js.uniqidSeed, 5); // add seed hex string
  if (more_entropy) {
    // for more entropy we add a float lower to 10
    retId += (Math.random() * 10).toFixed(8).toString();
  }

  return retId;
}

</script>


