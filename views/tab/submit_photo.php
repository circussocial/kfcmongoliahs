<script type="text/javascript" language="javascript">
		var jvalidnoconft = jQuery.noConflict();
		jvalidnoconft(document).ready(function(){
			// binds form submission and fields to the validation engine
			jvalidnoconft("#user_entry_form").validationEngine();
		});
</script>
<!--image drag and drop-->

<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/jquery-1.3.2.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/ui.core.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/ui.draggable.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/ui.droppable.js"></script>

<script>
    jq11 = jQuery.noConflict(true);
  </script>
  <!-- image rotation-->
  <script type="text/javascript">
var upload=new Array();
var imgrotationdiv='';
var imgrotationangle='';
var imgresize=100;
upload[0] = new Array('windows.jpg',0,0,0,0);
    jq11(document).ready(function(){
        //Counter
        counter = 0;
        //Make element draggable
        jq11(".drag").draggable({
            helper:'clone',
            containment: 'frame',
            //When first dragged
            stop:function(ev, ui) {
              var pos=jq11(ui.helper).offset();
              objName = "#clonediv"+counter
              jq11(objName).css({"left":pos.left,"top":pos.top});
              jq11(objName).removeClass("drag");
			 var id=jq11(objName+' .val').val();

                jq11(objName).draggable({
                  containment: 'parent',
                    stop:function(ev, ui) {
                     var pos=jq11(ui.helper).offset();
				//image rotate	 
					 var clonedivid=jq11(this).attr("id");
					 var imgtop = jq11('#'+clonedivid).css("top");
					  var imgleft = jq11('#'+clonedivid).css("left");
					   imgtop = imgtop.replace("px", "");
            		   imgleft = imgleft.replace("px", "");
					   objName = jq11(this).attr("id");
					  imgrotationdiv='#'+objName;
					  imagedrag(imgrotationdiv,counter);
					 imagesize(imgrotationdiv,counter);
				var idimage=jq11('#'+jq11(this).attr("id")+' .val').val();
	//	makeing array-----------------------
				upload[counter] = new Array(idimage,imgleft,imgtop,imgrotationangle,imgresize);
					//console.log(upload[counter]);
		            }
                });
            }
        });
        //Make element droppable
        jq11("#frame ").droppable({
      drop: function(ev, ui) {
        if (ui.helper.attr('id').search(/drag[0-9]/) != -1){
          counter++;
if(counter<=5){
          var element=jq11(ui.draggable).clone();
          element.addClass("tempclass");
          jq11(this).append(element);
          jq11(".tempclass").attr("id","clonediv"+counter);
          jq11("#clonediv"+counter).removeClass("tempclass");
          //Get the dynamically item id
          draggedNumber = ui.helper.attr('id').search(/drag([0-9])/)
          itemDragged = "dragged" + RegExp.$1
         console.log(itemDragged)
			var pos=jq11(ui.helper).offset();
			objName = "#clonediv"+counter
			 imgrotationdiv=objName;
			  //var left=pos.left-620;
	  		 // var top=pos.top-54;
			
			 var idimage=jq11(objName+' input.val').val();
			// jq11(objName).append('<div id="'+objName+'" class="ui-draggable '+itemDragged+'" style="left: '+left+'px; top: '+top+'px;"></div>');
			
			 jq11(objName).html('<img class="image" onclick="imageclick('+counter+')"  src="'+idimage+'">');
			 jq11(objName).append('<input id="val'+counter+'" name="val'+counter+'" class="val" value="'+idimage+'" type="hidden" />');
					   imagedrag(imgrotationdiv,counter);
					 imagesize(imgrotationdiv,counter);
			var idimage=jq11(objName+' input.val').val();
			//		console.log(counter)
					
							
      //	makeing array-----------------------
	  imgresize=100;	
	  // var left=pos.left-620;
	  // var top=pos.top-54;
	  	
					upload[counter] = new Array(idimage,pos.left,pos.top,0,100);
					//console.log(upload[counter]);
				
			//	console.log(pos.left);
			//	console.log(left);
            //    console.log(pos.top);
			//	console.log(top);
				
          jq11("#clonediv"+counter).addClass(itemDragged);
		  // jq11(objName).css("left",left);
		  //  jq11(objName).css("top",top);
			
}else{ alert("only 5 images are allow");}
        }
          }
        });
    });
</script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/jquery-ui-1.8.21.custom.min.js"></script>
 
<script>
    jq12 = jQuery.noConflict(true);
</script>
  <script>
function imageclick(id){
			var a=jq11('#frame .ui-draggable .rot').val();
imgrotationdiv='#clonediv'+id;
imagedrag(imgrotationdiv,id);
imagesize(imgrotationdiv,id);
}
function imagedrag(id,rotation_index){	
	//Store frequently elements in variables
			var slider  = jq12('#slider'),
				tooltip = jq12('.tooltip');
				var imagediv=jq12(id);
				var prev_value=0;
				
				if(upload[rotation_index]== undefined || upload[rotation_index]['3']== null ||  upload[rotation_index]['3']==''){
					prev_value=0;
					}else{prev_value=upload[rotation_index]['3'];}
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
				 upload[rotation_index]['3']=ui.value;
				},
				stop: function(event,ui) {
				    tooltip.fadeOut('fast');
				},
			});
}
function imagesize(id,rotation_index){	
	//Store frequently elements in variables
			var slider  = jq12('#sliderresize'),
				tooltip = jq12('.tooltipresize');
				var imagediv=jq12(id);
				var prev_value=100;
				if(upload[rotation_index]== undefined || upload[rotation_index]['4']== null ||  upload[rotation_index]['4']==''){
					prev_value=100;
					}else{prev_value=upload[rotation_index]['4'];}
			//Hide the Tooltip at first
			tooltip.hide();
			//Call the Slider
			slider.slider({
				//Config
				range: "min",
				min: 1,
			max:200,
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
				  jq12(imagediv).css("width",ui.value);
				  jq12(id+" .image").css("width",ui.value);
                  jq12(imagediv).css("height",ui.value);
				  jq12(id+" .image").css("height",ui.value);
				  imgresize=ui.value;
				  upload[rotation_index]['4']=ui.value;
				},
				stop: function(event,ui) {
				    tooltip.fadeOut('fast');
				},
			});
}
</script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/protected/modules/kfcmongoliahs/themes/basic/js/draganddrop/jcanvas.js"></script>
 <script>
    jq13 = jQuery.noConflict(true);
</script>
  <script type="text/javascript">
  // function add layers
function dataMergeImages()
 {
      for (var i = 0; i < upload.length; i++) 
    { 
      var image = upload[i][0];
   if(image != ''){
           var img = upload[i][0];
           var imgWidth = upload[i][4];
           var imgHeight = upload[i][4];
			 if(i==0){
				 var imgWidth = 413;
            	 var imgHeight = 350;
				 }
           var top = 0;
           var left = 0;
		   
		   if(i!=0){
		    var left = upload[i][1]-8;
			var top = upload[i][2]-7;
		   }else{ 
		    var left = upload[i][1]+0.12;
			var top = upload[i][2]+0.12;
			}
			var angle = upload[i][3];
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
            left = parseInt(left);
            top = parseInt(top);
            top = top;
            left = left;
   jq13("canvas").addLayer({
				method: "drawImage",
                source: image,
                x: left, y: top,
                sx: left, sy: top,
                cropFromCenter: false,
             //   sWidth: imgWidth, 
			//	sHeight: imgHeight,
			width: imgWidth, 
			height: imgHeight,
				 rotate: angle,
                draggable: false,
                fromCenter: false
            })
   } // if empty check
  }  // for loop
  jq13("canvas").addLayer({
            method: "drawRect",
           
            width: 0,
            height: 0,
            opacity: 0,
            fromCenter: false
        })
                .drawLayers();
 upload=new Array();
 }
  </script>
<div class="main_wrapper">
<form method="post" name="user_entry_form" id="user_entry_form"  action="index.php?r=kfcmongoliahs/tab/userformsubmit&signed_request=<?php echo CHtml::encode($_REQUEST['signed_request']);?>">
<div id="backcover" class="backcover"></div>
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
          <?php /*?> <img  class="backend_image" src="<?php echo $this->themeUrl;?>/images/submission_photo_frame.png" width="332" height="336" /> 
          <img id="photoPreview" class="image_user" src="<?php echo $this->themeUrl;?>/images/submission_photo_bg.png" width="298" height="205" /><?php */?>
           </div>
           <div class="frame_submisstion_photo_frame_round" style="display:none;"> 
       <?php /*?> <img class="backend_image" src="<?php echo $this->themeUrl;?>/images/submission_photo_frame_1.png" width="332" height="336" /> 
        <img id="photoPreview" class="image_user_round" src="<?php echo $this->themeUrl;?>/images/submission_photo_bg_1.png" width="298" height="205" /> <?php */?>
        
         </div>
        </div>
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
     <?php /*?>    <div class="rotate_resize_function_submission">
        
           <div class="resize_submission">
              <ul>
                <li>Хэмжээ</li>
                <li><img src="<?php echo $this->themeUrl;?>/images/resize.png" width="160" height="24" /></li>
              </ul>
            </div>
            <div class="rotate_submission">
              <ul>
                <li>Эргүүлэх</li>
                <li><img src="<?php echo $this->themeUrl;?>/images/resize.png" width="160" height="24" /></li>
              </ul>
            </div>
          </div><?php */?>
           <div class="rotate_resize_function_submission">
              <div class="slidedev"> 
            <!--slide image rotation-->
            <section id="rotsel">
            <div id="slider"></div>
            <!-- the Slider --> 
            <span class="tooltip"></span> <!-- Tooltip --> 
          </section>
            </div>
              <!--slide image resize--> 
              <div class="slideresizedev"> 
                <section id="ressel">
                <div id="sliderresize"></div>
                <!-- the Slider --> 
                <span class="tooltipresize"></span> <!-- Tooltip --> 
              </section>
              </div>
           </div> 
        <div class="drag_drop_submission">
    	<div class="drag_drop_submission_images">
        	<?php /*?><ul>
            <div class="glasses_1"> <img src="<?php echo $this->themeUrl;?>/images/drag_glasses_1.png" width="76" height="34" /> </div>
            <div class="mufral"> <img src="<?php echo $this->themeUrl;?>/images/drag_mufral.png" width="69" height="55" /> </div>
            <div class="fire"> <img src="<?php echo $this->themeUrl;?>/images/drag_fire.png" width="51" height="60" /> </div>
            <div class="juice"> <img src="<?php echo $this->themeUrl;?>/images/drag_juice.png" width="56" height="72" /> </div>
            <div class="sun"> <img src="<?php echo $this->themeUrl;?>/images/drag_sun.png" width="60" height="59" /> </div>
            <div class="cap_1"> <img src="<?php echo $this->themeUrl;?>/images/drag_cap_1.png" width="62" height="52" /> </div>
            <div class="cap_2"> <img src="<?php echo $this->themeUrl;?>/images/drag_cap_2.png" width="62" height="43" /> </div>
            <div class="glasses_3"> <img src="<?php echo $this->themeUrl;?>/images/drag_glasses_3.png" width="68" height="24" /> </div>
            <div class="munch_2"> <img src="<?php echo $this->themeUrl;?>/images/drag_munch_1.png" width="71" height="21" /> </div>
            </ul><?php */?>
            
                <div class="drag im1" id="drag1"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_glasses_1.png" width="76" height="34" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_glasses_1.png" type="hidden" />
   			<input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im2" id="drag2"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_mufral.png" width="69" height="55" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_mufral.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                 </div>
            <div class="drag im3" id="drag3"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_fire.png" width="51" height="60" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_fire.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                
                 </div>
            <div class="drag im4" id="drag4"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_juice.png" width="56" height="72" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_juice.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im5" id="drag5"> 
           	 <img src="<?php echo $this->themeUrl;?>/images/drag_sun.png" width="60" height="59" />
             <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_sun.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im6" id="drag6"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_cap_1.png" width="62" height="52" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_cap_1.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                
                 </div>
            <div class="drag im7"id="drag7"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_cap_2.png" width="62" height="43" />
                <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_cap_2.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
                 </div>
            <div class="drag im8" id="drag8"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_munch_1.png" width="68" height="26" />
                 <input id="val1" name="val1" class="val" value="<?php echo $this->themeUrl;?>/images/drag_munch_1.png" type="hidden" />
            <input id="rot1" name="rot1" class="rot" value="" type="hidden" />
             </div>
            <div class="drag im9" id="drag9"> 
            	<img src="<?php echo $this->themeUrl;?>/images/drag_glasses_3.png" width="72" height="26" /> 
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
    <div class="kfc_logo_footer_prelike_submit"> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/kfc_footer_logo.png" width="181" height="68" /> </a> </div>
    <!------------------------- ☺ KFC Logo Footer End ☺ -------------------------> 
  </div>
   </form>
  <div class="clear"></div>
</div>