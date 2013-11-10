<script type="text/javascript" language="javascript">
		var jvalidnoconft = jQuery.noConflict();
		jvalidnoconft(document).ready(function(){
			// binds form submission and fields to the validation engine
			jvalidnoconft("#user_entry_form").validationEngine();
		});

</script>
<!--image drag and drop-->
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/jquery-1.9.1.js"></script>
<script src="/protected/modules/kfcmongoliahs/themes/basic/js/jquery.ui.core.js"></script>
<script src="/protected/modules/kfcmongoliahs/themes/basic/js/jquery.ui.widget.js"></script>
<script src="/protected/modules/kfcmongoliahs/themes/basic/js/jquery.ui.mouse.js"></script>
<script src="/protected/modules/kfcmongoliahs/themes/basic/js/jquery.ui.draggable.js"></script>
<script src="/protected/modules/kfcmongoliahs/themes/basic/js/jquery.ui.droppable.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/jcanvas.js"></script>
<script>
    jq11 = jQuery.noConflict(true);
</script>
<script>
	var valdeletediv='';
	var upload=new Array();
	var imgrotation=new Array();
 var counterdata=1;
 var counterallowdata=1;
jq11(document).ready(function($) {
    jq11(".framefinalsticker").droppable({
        accept: '.drag',
        drop: function(event, ui) {
            if(counterallowdata<=5){
            var jq11clone = ui.helper.clone();
            if (!jq11clone.is('.inside-droppable')) {
				var i=1;
                jq11(this).append(jq11clone.addClass('inside-droppable'+counterdata));
				jq11clone.addClass('inside-droppable')
				var image=jq11('.inside-droppable'+counterdata+' input.val').val();
				var imagewidth=jq11('.inside-droppable'+counterdata+' img').css("width");
				imagewidth=imagewidth.replace("px", "");
				var imageheight=jq11('.inside-droppable'+counterdata+' img').css("height");
				imageheight=imageheight.replace("px", "");
				
				jq11('.inside-droppable'+counterdata).html('<img src="<?php echo $this->imgpath;?>'+image+'" onclick="imagedataclick('+counterdata+');" class="image"/><input id="val1" name="val1" class="val" value="'+image+'" type="hidden" /><input id="width" name="width" class="width" value="'+imagewidth+'" type="hidden" /><input id="height" name="height" class="height" value="'+imageheight+'" type="hidden" />');
				
                counterdata++;
				image='';
                counterallowdata++;
				console.log(jq11('#framecountr').val());
				}
            } else{
				
				jq11('#framecountr').val('1');
				var finalerrorpopup=jq11('#finalpopuperror').val();
				if(finalerrorpopup=='' || finalerrorpopup==undefined){
					
				//	$(".backcover").css("display","block");
				//	$(".mainsricker_limit_popup").css("display","block");
					}
				//console.log(counterdata);
				}            
        }
    });
    jq11(".drag").draggable({
		containment: '.frames',
        helper: 'clone',
		revert:"invalid",
	stop:function(ev, ui) {	
		jq11('.ui-draggable-dragging').draggable({
                    containment: '.framefinalsticker',
					tolerance: 'fit',
					position: 'relaitve'
                });
		}	
    });
    });
function customFbShare(url,img){
	
	
    <?php
	$title = str_replace("'","",$fb_share_Message[0]->fb_msg_title);
	$title = str_replace('"',"",$title);
	$title = str_replace(',',"",$title);
	$title = str_replace('"\"',"",$title);
	$title = str_replace('/',"",$title);
	
	$desc = str_replace("'","",$fb_share_Message[0]->fb_msg_detail);
	$desc = str_replace('"',"",$desc);
	$desc = str_replace(',',"",$desc);
	$desc = str_replace('/',"",$desc);
	$desc = str_replace('"\"',"",$desc);
	
	
	?>
	
	var img=img+'/'+jq11('#IMGcanvas').val();
    var popupUrl = "https://www.facebook.com/sharer.php?s=100&p[url]="+url+"&p[images][0]="+img+"&p[title]=<?php echo urlencode($title); ?>&p[summary]=<?php echo urlencode($desc); ?>";

    newwindow=window.open(popupUrl,'Facebook','height=320,width=650');
        if (window.focus) {newwindow.focus()}
		window.top.location.href = "https://apps.facebook.com/kfcmongoliahs";
        return false;
		
}
function getRotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");
    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { var angle = 0; }
    return (angle < 0) ? angle +=360 : angle;
}
function facebookpermissions(){
	$(".backcover").css("display","block");
jq11.ajax({
			url: "index.php?r=kfcmongoliahs/tab/authentication&signed_request=<?php echo CHtml::encode($_REQUEST['signed_request']);?>",
			type: 'POST',
			success: function(out)
			{
				$(".backcover").css("display","none");
				show_box('index.php?r=kfcmongoliahs/FacebookPhotos/albums&signed_request=<?php echo $_REQUEST['signed_request']; ?>')
				}
			});
}
function checklimit(){
	var datafrcounter=jq11('#framecountr').val();
	console.log(datafrcounter);
	if(datafrcounter==1){
		$(".backcover").css("display","block");
		$(".mainsricker_limit_popup").css("display","block");
		}
	}
	</script>
<script type="text/javascript">
  // function add layers
function dataMergeImages()
 {
	 
    for (var z = 0; z <2; z++){
	  if(z==0){
		var   image="<?php echo $this->imgpath;?>balck_image.jpg";
		 var  imgWidth = 328; 
		 var  imgHeight =330;
		 var  left =5;
		 var  top =10;
		 var  angle=0;
				console.log(image+'-top:'+top+'-left:'+left+'-width:'+imgWidth+'-height:'+imgHeight+'-angle:'+angle);
		  jq11("canvas").addLayer({
				method: "drawImage",
                source: image,
                x: left, y: top,
                sx: left, sy: top,
                cropFromCenter: false,
             // sWidth: imgWidth, 
			//	sHeight: imgHeight,
				width: imgWidth, 
				height: imgHeight,
				rotate: angle,
                draggable: false,
                fromCenter: false
            })
			
		  }else{
      for (var i = 0; i <=counterdata; i++) 
    { 
     var image='';
	   if(i==0){
		  image=jq11('#UserEntry_user_image').val();
		  image="<?php echo $this->assetsUrl;?>/thumbs_big/"+image;
		  image=image;
		  }else if(i==counterdata){
			var outerframe=jq11('#frameactive').val();
			if(outerframe==1){
					image="<?php echo $this->imgpath;?>submission_photo_frame.png";
				}else{
					image="<?php echo $this->imgpath;?>submission_photo_frame_1.png";
				}
		}else{
			 image = jq11('.inside-droppable'+i+' input.val').val();
			image="<?php echo $this->imgpath;?>"+image;
			  }
   if(image != ''){
           var img = image;
		   var imgWidth='0px';
		   if(i==0){
			   imgWidth = jq11('#photoPreview').css("width"); 
			}else if(i==counterdata){
				if(outerframe==1){
					imgWidth = jq11('#framesqureimg').css("width");
				}else{
					imgWidth = jq11('#frameroundimg').css("width");
				}
		}else if(i>0 && i<counterdata){
          		imgWidth = jq11('.inside-droppable'+i+' img.image').css("width");
		   }
		   imgWidth = imgWidth.replace("px", "");
           var imgHeight = '0px';
		   if(i==0){
			   imgHeight = jq11('#photoPreview').css("height"); 
			}else if(i==counterdata){
				if(outerframe==1){
					imgHeight = jq11('#framesqureimg').css("height");
				}else{
					imgHeight = jq11('#frameroundimg').css("height");
				}
		}else if(i>0 && i<counterdata){
		   		imgHeight = jq11('.inside-droppable'+i+' img.image').css("height");
			}
		   imgHeight = imgHeight.replace("px", "");
           var top = 0;
           var left = 0;
		   if(i!=0){
				left = jq11('.inside-droppable'+i).css("left");
				top = jq11('.inside-droppable'+i).css("top");
		   }else if(i==counterdata){
				left=6;
				top=9;
		}else if(i==0){ 
		    var imgleft=0;
			if(imgWidth<296){
				imgleft=296-imgWidth;
				imgleft=imgleft/2;
				}
			
			left =19+imgleft;
			top =53;
			}else{
				
				left =0;
				top =0;
				
				}
			
			var angle =0;
			if(imgrotation[i]== undefined || imgrotation[i]== null ||  imgrotation[i]==''){
					angle=0;
					}else{angle=imgrotation[i];}
			tops = parseInt(top);
            var plusy = 0;
            if (tops > 0)
            {
                plusy = tops;
            }
            top = parseInt(top);
            var plusx = 0;
            lefts = parseInt(left);
            if (lefts > 0)
            {
                plusx = lefts;
            }
            left = parseInt(left);
            if (left == 0)
            {
                left = 1;
            }
            if (top == 0)
            {
                top = 1;
            }
			if(i==0){
				left = parseInt(left);
				top = parseInt(top);
			}else if(i==counterdata){
				top = parseInt(9);
				left=parseInt(6);
			}else if(i!=0 && i!=counterdata){
				left = parseInt(left-390);
				top = parseInt(top-1);
			}
            top = top;
            left = left;
			console.log(image+'-top:'+top+'-left:'+left+'-width:'+imgWidth+'-height:'+imgHeight+'-angle:'+angle);
			
   jq11("canvas").addLayer({
				method: "drawImage",
                source: image,
                x: left, y: top,
                sx: left, sy: top,
                cropFromCenter: false,
             // sWidth: imgWidth, 
			//	sHeight: imgHeight,
				width: imgWidth, 
				height: imgHeight,
				rotate: angle,
                draggable: false,
                fromCenter: false
            })
   } // if empty check
  } 
  		}
	  }
   // for loop
   
  jq11("canvas").addLayer({
            method: "drawRect",
            width: 0,
            height: 0,
            opacity: 0,
            fromCenter: false
        })
                .drawLayers();
		jq11('.photo_frame_submission_1').css('display','none');
		jq11('.canvsdata').css('display','block');
		jq11('.merge_title').css('display','none');		
		jq11('#framemergeactive').val('1');
		jq11('#merge_title').html('');
 upload=new Array();
 
 }
 
 function phonenumber()
 	{
		var phone=jq11('#Phone').val().replace(/ /g,'');
		$("#Phone").val(phone);
	}
 
 function correctInput(f) {
		var usersimage=jq11('#UserEntry_user_image').val();
		var name=jq11('#Name').val();
		var email=jq11('#Email').val();
		var phone=jq11('#Phone').val();

	if( /(.+)@(.+){2,}\.(.+){2,}/.test(email) ){
	  // valid email
	} else {
	  return false;
	}
	
	var countphone=jq11('#Phone').val().replace(/ /g,'').length
	if(countphone<8){
		return false;
		}else{
			if(!jq11.isNumeric( phone )){
			return false;
			}
			
		}
	
		
	if(name=='' || name==undefined){
	}else if(email=='' || email==undefined){
		return false;
	}else if(phone=='' || phone==undefined){
		return false;
	}else if(usersimage=='' || usersimage==undefined ) {
		jq11(".backcover").css("display","block");
		jq11(".mainupload_photo_popup").css("display","block");
		return false;
	}else{
			jq11(".mainloaderimage").css("display","block");
			jq11(".backcover").css("display","block");
			setTimeout(function() {
			dataMergeImages();
			}, 1500);
		
		setTimeout(function() {
			downloadimage();
			}, 25000);
		setTimeout(function() {
		var imageupload=jq11('#UserEntry_user_image').val();
		var imagecanvas=jq11('#IMGcanvas').val();
		
		jq11.ajax({
			url: "index.php?r=kfcmongoliahs/tab/userformsubmit&signed_request=<?php echo CHtml::encode($_REQUEST['signed_request']);?>",
			type: 'POST',
			data: {
		   Name:name,
		   Email:email,
		   Phone:phone,
		   ImageUpload:imageupload,
		   ImageCanvas:imagecanvas
		}, 
			success: function(out)
			{
				if(out=='save'){
					
					jq11(".mainloaderimage").css("display","none");
					jq11(".backcover").css("display","block");
					jq11(".maincongratulation_popup").css("display","block");
					}
			}
			});
			 }, 45000);
		return false;
		}
	return false;
}
 function closeRequierdField(){
	 jq11('.botton_required_feild').css('display','none');	
}
function downloadimage()
  {
    setTimeout(function() {
     var canvasData = canvsdata.toDataURL("image/png");
     var ajax = new XMLHttpRequest();
     var newDate = new Date;
     fileName = newDate.getTime() + ".png";
     ajax.open("POST", 'index.php?r=kfcmongoliahs/tab/ImageMergeSave&filename='+fileName+'&signed_request=<?php echo $_REQUEST['signed_request'];?>', false);
     ajax.setRequestHeader('Content-Type', 'application/upload');
     ajax.send(canvasData);
     var out = ajax.response;
	 
	 jq11('#IMGcanvas').val(fileName);
   }, 200);
  }
</script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/image-rotation-resize/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/image-rotation-resize/jquery-ui-1.8.21.custom.min.js"></script>
<script>
    jq12 = jQuery.noConflict(true);
</script>
<script>
function imagedataclick(id){
	//valdeletediv=id;
jq12(".main_deletebuton").html('<a href="javascript:;" onclick="deleteactive('+id+');"><img src="<?php echo $this->themeUrl;?>/images/delete_button.png" width="46" height="30" /></a>');	
	imgrotationdiv='.inside-droppable'+id;
	imagesize(imgrotationdiv,id);
	imagerotate(imgrotationdiv,id);
	//deleteactive(imgrotationdiv,id);
}
function deleteactive(id){
	
	
	jq12('.inside-droppable'+id).hide();
	if(counterallowdata==5 || counterallowdata>5){
	jq11('#framecountr').val('');
	}
	counterallowdata=counterallowdata-1;
	imgrotationdiv='.inside-droppable'+id;
	imagesize(imgrotationdiv,id);
	imagerotate(imgrotationdiv,id);
	
}
function imagerotate(id,index){	
	//Store frequently elements in variables
			var slider  = jq12('#slider'),
				tooltip = jq12('.tooltip');
				var imagediv=jq12(id);
				var displaystatus=jq12(id).css('display');
				if(displaystatus=='block'){
					jq12('.notrotateandresize').css('display','none');	
				var prev_value=0;
				prev_value= getRotationDegrees(jq12(imgrotationdiv));
			//Hide the Tooltip at first
			tooltip.hide();
			//Call the Slider
			slider.slider({
				//Config
				range: "min",
				min: 0,
			max:360,
			step: 1,
				value: prev_value,
				start: function(event,ui) {
				    tooltip.fadeIn('fast');
				},
				//Slider Event
				slide: function(event, ui) { //When the slider is sliding
					var value  = slider.slider('value'),
					volume = jq12('.volume');
					tooltip.text(ui.value);  //Adjust the tooltip accordingly
				  jq12(imagediv).css("-moz-transform","rotate("+ui.value+"deg)");
                  jq12(imagediv).css("-webkit-transform","rotate("+ui.value+"deg)");
                  jq12(imagediv).css("-o-transform","rotate("+ui.value+"deg)");
                  jq12(imagediv).css("ms-transform","rotate("+ui.value+"deg)");
				  imgrotationangle=ui.value;
				  imgrotation[index]=ui.value;
				},
				stop: function(event,ui) {
				    tooltip.fadeOut('fast');
				},
			});
		}else{
			
			jq12('.notrotateandresize').css('display','block');	
			}
}
function imagesize(id,index){	
	//Store frequently elements in variables
			var slider  = jq12('#sliderresize'),
				tooltip = jq12('.tooltipresize');
				var imagediv=jq12(id);
				var prev_value=100;
			var displaystatus=jq12(id).css('display');
				if(displaystatus=='block'){
					jq12('.notrotateandresize').css('display','none');	
				var orgwidth=jq12(id+' input.width').val();
				var orgheight=jq12(id+' input.height').val();
				var newwidth=jq12(id).css("width");
				newwidth = newwidth.replace("px", "");
				var newheight=jq12(id).css("height");
				newheight = newheight.replace("px", "");
			if(upload[index]== undefined || upload[index]== null ||  upload[index]==''){
					prev_value=100;
					}else{prev_value=upload[index];}
					
			//Hide the Tooltip at first
			tooltip.hide();
			//Call the Slider
			slider.slider({
				//Config
				range: "min",
				min: 50,
			max:150,
			step: 1,
				value: prev_value,
				start: function(event,ui) {
				    tooltip.fadeIn('fast');
				},
				//Slider Event
				slide: function(event, ui) { //When the slider is sliding
					var value  = slider.slider('value'),
					volume = jq12('.volume');
					tooltip.text(ui.value);  //Adjust the tooltip accordingly
				var valuewidth=ui.value;
				
				
				  jq12(id+" img.image").css("width",(orgwidth*valuewidth)/100);
				  var after_resize_img_width=jq12(id+" img.image").css("width");
				  var after_resize_img_height=jq12(id+" img.image").css("height");
				  jq12(id).css("width",after_resize_img_width);
				  jq12(id).css("height",after_resize_img_height);
				  
				  console.log("barvalue--"+valuewidth+'------imgwidth--'+after_resize_img_width+'--------imgheight--'+after_resize_img_height);
				//console.log(after_resize_img_width);
				//console.log(after_resize_img_height);
				  
				  upload[index]=ui.value;
				},
				stop: function(event,ui) {
				    tooltip.fadeOut('fast');
				},
			});
		}else{
			
			jq12('.notrotateandresize').css('display','block');	
			}
}
</script>

<div class="main_wrapper">
  <form method="post" name="user_entry_form" id="user_entry_form"   onsubmit="return correctInput(this);" action="">
    <div id="backcover" class="backcover"></div>
    <div class="mainsricker_limit_popup">
      <?php $this->renderPartial("sricker_limit_popup"); ?>
    </div>
    <div class="mainloaderimage"> <img src="<?php echo $this->themeUrl;?>/images/Loading_t.gif" width="200" height="200" /> </div>
    <div class="mainupload_photo_popup">
      <?php $this->renderPartial("upload_photo_popup"); ?>
    </div>
    <div class="maincongratulation_popup">
      <?php $this->renderPartial("congratulation_popup",array("fb_share_Message"=>$fb_share_Message)); ?>
    </div>
    <div class="mainfilesizelimit">
      <?php $this->renderPartial("file_size_limit_popup"); ?>
    </div>
    <div class="maintermandcondition">
      <?php $this->renderPartial("termandcondition",array("PagesContent"=>$PagesContent)); ?>
    </div>
    <div class="mainmergefirst">
      <?php $this->renderPartial("mergefirst_popup"); ?>
    </div>
    <div class="mainprivacypolicy"> <?php echo $this->renderPartial("privacypolicy",array("PagesContent"=>$PagesContent)) ?> </div>
    <div class="third_page_submission_page">
      <div class="submisstion_left_1">
        <div class="submisstion_left_title">
          <p class="yellow_title_left_1">1-р алхам</p>
          <p class="white_title_left_1">Дараах хэсгийг бүрэн дүүрэн бөглөнө үү?</p>
        </div>
        <div class="name_input_submisstion">
          <div class="lable"> Нэр: </div>
          <div class="name_input">
            <input type="text" id="Name" title="" maxlength="100"  data-validation-engine="validate[required]"/>
          </div>
        </div>
        <div class="name_input_submisstion">
          <div class="lable"> Цахим хаяг: </div>
          <div class="name_input">
            <input type="text" id="Email" title=""  maxlength="100" data-validation-engine="validate[required,custom[email]] text-input" />
          </div>
        </div>
        <div class="name_input_submisstion">
          <div class="lable"> Утасны дугаар: </div>
          <div class="name_input">
            <input type="text" id="Phone" onkeyup="phonenumber()" title=""  maxlength="8" data-validation-engine="validate[required,custom[phone],maxSize[8],minSize[8]] text-input"/>
          </div>
        </div>
        <!------------------------- ☺ Submission Left Form End ☺ ------------------------->
        <div class="terms_and_condition_text"> Эдгээр мэдээллийг бөглөж, зургаа оруулснаар <span> <a href="javascript:;" onclick="showtermandcondition();"> Нууцлалыг хадгалах журам </a> </span> , <span> <a href="javascript:;" onclick="showprivacypolicy();"> Уралдааны дүрэм </a> </span> -ийг хүлээн зөвшөөрч байна. </div>
        <div class="submisstion_left_title_1">
          <p class="yellow_title_left_1">2-р алхам</p>
          <p class="white_title_left_2">Зураг оруулах</p>
        </div>
        <div class="computer_facebook_button">
          <div class="botton_required_feild" onclick="closeRequierdField();"><img src="<?php echo $this->themeUrl;?>/images/feild-is-require.png" width="136" height="50" /></div>
          <ul>
            <li> <a href="#" id="auploaderImg"> <img id="uploaderImg" src="<?php echo $this->themeUrl;?>/images/computer_button.png" width="136" height="29" /> </a> <a href="#" id="auploader2Img"> <img id="uploader2Img" src="<?php echo $this->themeUrl;?>/images/computer_button.png" width="136" height="29" /> </a>
              <input type="hidden" id="UserEntry_user_image" name ="UserEntry[user_image]" value="" />
              <input type="hidden" id="IMGcanvas" name ="IMGcanvas" value=""/>
            </li>
            <li> <a id="uploaderImgfacebook"  onclick="show_box('index.php?r=kfcmongoliahs/FacebookPhotos/albums&signed_request=<?php echo $_REQUEST['signed_request']; ?>');"> <img src="<?php echo $this->themeUrl;?>/images/facebook_button.png" width="136" height="29" /> </a> <a id="uploader2Imgfacebook"> <img src="<?php echo $this->themeUrl;?>/images/facebook_button.png" width="136" height="29" /> </a> </li>
          </ul>
        </div>
        <div class="p_text">
          <p class="text_white">Файлын дээд хэмжээ: 5МВ Файлын өргөтгөл: jpg, .png, .gif </p>
        </div>
        <div class="submisstion_left_title_3">
          <p class="yellow_title_left_3">3-р алхам</p>
          <p class="white_title_left_3">Зураг чимэглэх</p>
        </div>
        <div class="submit_photo_button">
          <input type="submit" class="user_form_submit" id="user_form_submit" style="cursor:pointer;"  value="" />
        </div>
      </div>
      <!------------------------- ☺ Submission Left End ☺ ------------------------->
      <div class="frames">
      <div class="frames_inner" id="frames_inner">
      
        <div class="photo_frame_submission_1">
          <div class="frame_submisstion_photo_frame" id="frame"  style="display:block;">
            <div class="main_image_user"> 
            <img id="photoPreview" class="image_user" src="<?php echo $this->themeUrl;?>/images/submission_photo_bg.png" /> 
            <img id="photoPreview2" class="image_user" src="<?php echo $this->themeUrl;?>/images/submission_photo_bg_3.png" style="display:none;" /> 
            </div>
            <img  class="backend_image" id="framesqureimg" src="<?php echo $this->themeUrl;?>/images/submission_photo_frame.png" width="332" height="336" /> <img class="backend_image" id="frameroundimg" src="<?php echo $this->themeUrl;?>/images/submission_photo_frame_1.png" width="332" height="336" style="display:none;"/> 
            <div class="framefinalsticker"> 
            </div>
            
            </div>
          <div class="frame_submisstion_photo_frame_round" id="frame"  style="display:none;"> </div>
        </div>
        <canvas class="canvsdata" id="canvsdata" width="332" height="336" ></canvas>
        <div class="submission_thumbnails">
          <div class="thumbnail_title"> Зургийн хүрээ сонгох </div>
          <div class="thumbnails_images">
            <ul>
              <li class="first_thumbnail" onclick="showsquareimage();"></li>
              <li class="first_thumbnail1" onclick="showsquareimage();"></li>
              <li class="second_thumbnail" onclick="showroundimage();"></li>
              <li class="second_thumbnail1" onclick="showroundimage();"></li>
            </ul>
          </div>
        </div>
        <div class="photo_frame_submission_2">
          <div class="frame_submisstion_photo_frame_2" style="display:none;"> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/submission_photo_bg_1.png" width="272" height="205" /> </a> </div>
        </div>
        <div class="notrotateandresize"></div>
        <div class="rotate_resize_function_submission">
          <div class="main_heading">
            <p class="resizeheading">Эргүүлэх</p>
            <p class="deleteheading">Delete</p>
            <p class="rotateheading">Хэмжээ</p>
          </div>
          <div class="slidedev">
            <section id="ressel">
              <div id="sliderresize"></div>
              <!-- the Slider --> 
            </section>
          </div>
           <div class="main_deletebuton">
           <a href="javascript:;" onclick="deleteactive();"><img src="<?php echo $this->themeUrl;?>/images/delete_button.png" width="46" height="30" /></a>
           </div>
          <div class="slideresizedev"> 
            <!--slide image rotation-->
            <section id="rotsel">
              <div id="slider"></div>
              <!-- the Slider --> 
            </section>
          </div>
          <!--slide image resize--> 
        </div>
        </div>
        </div>
        <div class="drag_drop_submission">
          <div class="drag_drop_submission_images">
            <div class="drag im1" id="drag1"> <img src="<?php echo $this->themeUrl;?>/images/drag_glasses_1.png" width="76" height="34" onmousedown="checklimit();" />
              <input id="val1" name="val1" class="val" value="drag_glasses_1.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im2" id="drag2"> <img src="<?php echo $this->themeUrl;?>/images/drag_mufral.png" width="69" height="55" onmousedown="checklimit();"/>
              <input id="val1" name="val1" class="val" value="drag_mufral.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im3" id="drag3"> <img src="<?php echo $this->themeUrl;?>/images/drag_fire.png" width="56" height="66" onmousedown="checklimit();" />
              <input id="val1" name="val1" class="val" value="drag_fire.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im4" id="drag4"> <img src="<?php echo $this->themeUrl;?>/images/drag_juice.png" width="56" height="72" onmousedown="checklimit();"/>
              <input id="val1" name="val1" class="val" value="drag_juice.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im5" id="drag5"> <img src="<?php echo $this->themeUrl;?>/images/drag_sun.png" width="60" height="59" onmousedown="checklimit();" />
              <input id="val1" name="val1" class="val" value="drag_sun.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im6" id="drag6"> <img src="<?php echo $this->themeUrl;?>/images/drag_cap_1.png" width="66" height="57" onmousedown="checklimit();"/>
              <input id="val1" name="val1" class="val" value="drag_cap_1.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im7"id="drag7"> <img src="<?php echo $this->themeUrl;?>/images/drag_cap_2.png" width="67" height="48" onmousedown="checklimit();"/>
              <input id="val1" name="val1" class="val" value="drag_cap_2.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im8" id="drag8"> <img src="<?php echo $this->themeUrl;?>/images/drag_munch_1.png" width="72" height="26" onmousedown="checklimit();"/>
              <input id="val1" name="val1" class="val" value="drag_munch_1.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            <div class="drag im9" id="drag9"> <img src="<?php echo $this->themeUrl;?>/images/drag_glasses_3.png" width="68" height="26" onmousedown="checklimit();"/>
              <input id="val1" name="val1" class="val" value="drag_glasses_3.png" type="hidden" />
              <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
          </div>
        </div>
         <div class="drag_drop_frmae_unsubmission" id="drag_drop_frmae_unsubmission">
      </div>
      <!------------------------- ☺ Submission Left End ☺ ------------------------->
      <div class="terms_and_condition_and_private_policy_prelike_submit">
        <div class="terms_pp">
          <ul>
            <li> <a href="javascript:;" onclick="showtermandcondition();"> Нууцлалыг хадгалах журам </a> </li>
            <li class="dot_d"> . </li>
            <li><a href="javascript:;" onclick="showprivacypolicy();"> Уралдааны дүрэм </a> </li>
          </ul>
        </div>
      </div>
      <!------------------------- ☺ Terms and Condition and Private Policy End ☺ ------------------------->
      <div class="kfc_logo_footer_prelike_submit"><a href="index.php?r=kfcmongoliahs/tab/index&signed_request=<?php echo CHtml::encode($_REQUEST['signed_request']);?>"> <img src="<?php echo $this->themeUrl;?>/images/kfc_footer_logo.png" width="181" height="68" /></a> </div>
      <!------------------------- ☺ KFC Logo Footer End ☺ -------------------------> 
    </div>
    <input type="hidden" id="framecountr" name ="framecountr" value=""  />
    <input type="hidden" id="frameactive" name ="frameactive" value="1"  />
    <input type="hidden" id="framemergeactive" name ="framemergeactive" value=""  />
    <input type="hidden" id="framewidthandheight" name ="framewidthandheight" value=""  />
     <input type="hidden" id="finalpopuperror" name ="finalpopuperror" value=""  />
  </form>
  <div class="clear"></div>
</div>
