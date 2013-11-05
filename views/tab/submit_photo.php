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
	var upload=new Array();
	var imgrotation=new Array();
 var counterdata=1;
jq11(document).ready(function($) {
    jq11("#frame").droppable({
        accept: '.drag',
        drop: function(event, ui) {
            if(counterdata<6){
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
				
				jq11('.inside-droppable'+counterdata).html('<img src="'+image+'" onclick="imageclick('+counterdata+');" class="image"/><input id="val1" name="val1" class="val" value="'+image+'" type="hidden" /><input id="width" name="width" class="width" value="'+imagewidth+'" type="hidden" /><input id="height" name="height" class="height" value="'+imageheight+'" type="hidden" />');
				
                counterdata++;
				image='';
                }
            } else{
				
				jq11('#framecountr').val('1');
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
                    containment: '#frame',
					tolerance: 'fit',
					position: 'relaitve'
                });
		}	
    });
    });

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
function checklimit(){
	var datafrcounter=jq11('#framecountr').val();
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
      for (var i = 0; i < counterdata; i++) 
    { 
     var image='';
	 
	  if(i==0){
		  
		  image=jq11('#UserEntry_user_image').val();
		  
		  image="<?php echo $this->assetsUrl;?>/thumbs_big/"+image;
		  image=image;
		  }else{

			 image = jq11('.inside-droppable'+i+' input.val').val();
			 
			image="https://apps.circussocial.com"+image;
			  
			  }
	  
   if(image != ''){
           var img = image;
		   var imgWidth='';
		   if(i==0){
			   imgWidth = jq11('#photoPreview').css("width"); 
			}else{
          		imgWidth = jq11('.inside-droppable'+i+' img.image').css("width");
		   }
		  // alert(imgWidth);
		   imgWidth = imgWidth.replace("px", "");
           var imgHeight = '';
		   if(i==0){
			   imgHeight = jq11('#photoPreview').css("height"); 
			  // imgHeight ='125px';
			}else{
		   		imgHeight = jq11('.inside-droppable'+i+' img.image').css("height");
			}
		   imgHeight = imgHeight.replace("px", "");
			 if(i==0){
				// var imgWidth = 413;
            	// var imgHeight = 350;
				 }
				 
           var top = 0;
           var left = 0;
		   
		   if(i!=0){
		    var left = jq11('.inside-droppable'+i).css("left");
			//left = left.replace("px", "");
			var top = jq11('.inside-droppable'+i).css("top");
			//top = top.replace("px", "");
		   }else{ 
		   var left =20;
		   // var left = jq11('#photoPreview').css("left");
			var top =53;
			//var top = jq11('#photoPreview').css("top");
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
			}else{
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
  }  // for loop
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
				
 upload=new Array();
 }
  </script>
  
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/image-rotation-resize/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/image-rotation-resize/jquery-ui-1.8.21.custom.min.js"></script>
 
 <script>
    jq12 = jQuery.noConflict(true);
</script>
  <script>
function imageclick(id){
imgrotationdiv='.inside-droppable'+id;
imagesize(imgrotationdiv,id);
imagerotate(imgrotationdiv,id);
}
function imagerotate(id,index){	
	//Store frequently elements in variables
			var slider  = jq12('#slider'),
				tooltip = jq12('.tooltip');
				var imagediv=jq12(id);
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
}
function imagesize(id,index){	
	//Store frequently elements in variables
			var slider  = jq12('#sliderresize'),
				tooltip = jq12('.tooltipresize');
				var imagediv=jq12(id);
				var prev_value=100;
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
				 // jq12(id).css("width",(newwidth*valuewidth)/100);
				 
				  jq12(id+" img.image").css("width",(newwidth*valuewidth)/100);
				
				  var after_resize_img_width=jq12(id+" img.image").css("width");
				  var after_resize_img_height=jq12(id+" img.image").css("height");
			
				  jq12(id).css("width",after_resize_img_width);
				  jq12(id).css("height",after_resize_img_height);
				 
				 // jq12(id).css("width",(newwidth*valuewidth)/100);
				//  imgresize=ui.value;
				  upload[index]=ui.value;
				},
				stop: function(event,ui) {
				    tooltip.fadeOut('fast');
				},
			});
}
</script>  
<div class="main_wrapper">
<form method="post" name="user_entry_form" id="user_entry_form"  action="index.php?r=kfcmongoliahs/tab/userformsubmit&signed_request=<?php echo CHtml::encode($_REQUEST['signed_request']);?>">
<div id="backcover" class="backcover"></div>
<div class="mainsricker_limit_popup">
<?php $this->renderPartial("sricker_limit_popup"); ?> 
</div>
<div class="mainfilesizelimit">
<?php $this->renderPartial("file_size_limit_popup"); ?> 
</div>
<div class="maintermandcondition">
<?php $this->renderPartial("termandcondition"); ?> 
</div>
<div class="mainprivacypolicy">
<?php echo $this->renderPartial("privacypolicy") ?>
</div>
  <div class="third_page_submission_page">
    <div class="submisstion_left_1">
      <div class="submisstion_left_title">
        <p class="yellow_title_left_1">1-р алхам</p>
        <p class="white_title_left_1">Дараах хэсгийг бүрэн дүүрэн бөглөнө үү?</p>
      </div>
      <div class="name_input_submisstion">
        <div class="lable"> Нэр: </div>
        <div class="name_input">
          <input type="text" id="Name" title=""  data-validation-engine="validate[required]"/>
        </div>
      </div>
      <div class="name_input_submisstion">
        <div class="lable"> Цахим хаяг: </div>
        <div class="name_input">
          <input type="text" id="Email" title="" data-validation-engine="validate[required,custom[email]] text-input" />
        </div>
      </div>
      <div class="name_input_submisstion">
        <div class="lable"> Утасны дугаар: </div>
        <div class="name_input">
          <input type="text" id="Phone" title="" data-validation-engine="validate[required,custom[phone],maxSize[8],minSize[8]] text-input"/>
        </div>
      </div>
      <!------------------------- ☺ Submission Left Form End ☺ ------------------------->
      <div class="terms_and_condition_text">
          Эдгээр мэдээллийг бөглөж, зургаа оруулснаар
          <span> <a href="javascript:;" onclick="showtermandcondition();"> Нууцлалыг хадгалах журам </a> </span> ,
          <span> <a href="javascript:;" onclick="showprivacypolicy();"> Уралдааны дүрэм </a> </span>
          -ийг хүлээн зөвшөөрч байна.
      </div>
      <div class="submisstion_left_title_1">
        <p class="yellow_title_left_1">2-р алхам</p>
        <p class="white_title_left_2">Зураг оруулах</p>
      </div>
      <div class="computer_facebook_button">
        <ul>
          <li> <a href="#"><img id="uploaderImg" src="<?php echo $this->themeUrl;?>/images/computer_button.png" width="136" height="29" /> </a>
           <input type="hidden" id="UserEntry_user_image" name ="UserEntry[user_image]" value="" size="17" data-data-validation-engine="validate[required]"/>
          </li>
          <li> <a onclick="show_box('index.php?r=kfcmongoliahs/FacebookPhotos/albums&signed_request=<?php echo $_REQUEST['signed_request']; ?>')"> <img src="<?php echo $this->themeUrl;?>/images/facebook_button.png" width="136" height="29" /> </a> </li>
        </ul>
      </div>
      <div class="p_text">
        <p class="text_white">Файлын дээд хэмжээ: 5МВ Файлын өргөтгөл: jpg, .bmp, .gif </p>
      </div>
      <div class="submisstion_left_title_3">
        <p class="yellow_title_left_3">3-р алхам</p>
        <p class="white_title_left_3">Зураг чимэглэх</p>
      </div>
      <div class="submit_photo_button"> 
      <input type="submit" class="user_form_submit" id="user_form_submit" style="cursor:pointer;"  value="" />
      <!--<a href="javascript:;" onclick="formSub();"> <img src="<?php echo $this->themeUrl;?>/images/submit_photo_button.png" width="267" height="55" /> </a>--> 
      </div>
    </div>
    <!------------------------- ☺ Submission Left End ☺ ------------------------->
    <div class="frames">
        <div class="photo_frame_submission_1">
          <div class="frame_submisstion_photo_frame" id="frame"  style="display:block;">
      <img id="photoPreview" class="image_user" src="<?php echo $this->themeUrl;?>/images/submission_photo_bg.png" width="296" height="205" />
      
       <img  class="backend_image" id="framesqureimg" src="<?php echo $this->themeUrl;?>/images/submission_photo_frame.png" width="332" height="336" />
        
       <img class="backend_image" id="frameroundimg" src="<?php echo $this->themeUrl;?>/images/submission_photo_frame_1.png" width="332" height="336" style="display:none;"/>
     
           </div>
           <div class="frame_submisstion_photo_frame_round" id="frame"  style="display:none;"> 
         </div>
        </div>
        <canvas class="canvsdata" width="332" height="336"></canvas>
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
           <div class="rotate_resize_function_submission">
           <div class="main_heading">
           <p class="resizeheading">Эргүүлэх</p>
           	<p class="rotateheading">Хэмжээ</p>
           </div>
           <div class="slidedev"> 
                <section id="ressel">
                <div id="sliderresize"></div>
                <!-- the Slider --> 
                <span class="tooltipresize"></span> <!-- Tooltip --> 
              </section>
              </div>
              <div class="slideresizedev"> 
            <!--slide image rotation-->
            <section id="rotsel">
            <div id="slider"></div>
            <!-- the Slider --> 
            <span class="tooltip"></span> <!-- Tooltip --> 
          </section>
            </div>
              <!--slide image resize--> 
              
           </div> 
        <div class="drag_drop_submission">
    	<div class="drag_drop_submission_images">
                <div class="drag im1" id="drag1"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_glasses_1.png" width="76" height="34" onclick="checklimit();" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_glasses_1.png" type="hidden" />
   			<input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im2" id="drag2"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_mufral.png" width="69" height="55" onclick="checklimit();"/>
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_mufral.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                 </div>
            <div class="drag im3" id="drag3"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_fire.png" width="56" height="66"onclick="checklimit();" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_fire.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                
                 </div>
            <div class="drag im4" id="drag4"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_juice.png" width="56" height="72" onclick="checklimit();"/>
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_juice.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im5" id="drag5"> 
           	 <img src="<?php echo $this->themeUrl;?>/images/drag_sun.png" width="60" height="59" onclick="checklimit();" />
             <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_sun.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im6" id="drag6"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_cap_1.png" width="66" height="57" onclick="checklimit();"/>
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_cap_1.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                
                 </div>
            <div class="drag im7"id="drag7"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_cap_2.png" width="67" height="48" onclick="checklimit();"/>
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_cap_2.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                 </div>
            <div class="drag im8" id="drag8"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_munch_1.png" width="72" height="26" onclick="checklimit();"/>
                 <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_munch_1.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im9" id="drag9"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_glasses_3.png" width="68" height="26" onclick="checklimit();"/> 
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_glasses_3.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
            </div>
            
        </div>
    </div>
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
    <div class="kfc_logo_footer_prelike_submit"> <a href="javascript:;" onclick=" dataMergeImages();"> <img src="<?php echo $this->themeUrl;?>/images/kfc_footer_logo.png" width="181" height="68" /> </a> </div>
    <!------------------------- ☺ KFC Logo Footer End ☺ -------------------------> 
  </div>
   <input type="hidden" id="framecountr" name ="framecountr" value=""  />
   
    <input type="hidden" id="frameactive" name ="frameactive" value="1"  />
 </form>
  <div class="clear"></div>
</div>