<div class="main_wrapper">
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
          <input type="text" id="Name" title="" />
        </div>
      </div>
      <div class="name_input_submisstion">
        <div class="lable"> Цахим хаяг: </div>
        <div class="name_input">
          <input type="text" id="Email" title="" />
        </div>
      </div>
      <div class="name_input_submisstion">
        <div class="lable"> Утасны дугаар: </div>
        <div class="name_input">
          <input type="text" id="Phone" title="" />
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
          <li> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/computer_button.png" width="136" height="29" /> </a>
          </li>
          <li> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/facebook_button.png" width="136" height="29" /> </a> </li>
        </ul>
      </div>
      <div class="p_text">
        <p class="text_white">Файлын дээд хэмжээ: 5МВ Файлын өргөтгөл: jpg, .bmp, .gif </p>
      </div>
      <div class="submisstion_left_title_3">
        <p class="yellow_title_left_3">3-р алхам</p>
        <p class="white_title_left_3">Зураг чимэглэх</p>
      </div>
      <div class="submit_photo_button"> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/submit_photo_button.png" width="267" height="55" /> </a> </div>
    </div>
    <!------------------------- ☺ Submission Left End ☺ ------------------------->
    <div class="frames">
        <div class="photo_frame_submission_1">
          <div class="frame_submisstion_photo_frame"> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/submission_photo_bg.png" width="298" height="191" /> </a> </div>
        </div>
        <div class="submission_thumbnails">
          <div class="thumbnail_title"> Зургийн хүрээ сонгох </div>
          <div class="thumbnails_images">
            <ul>
              <li class="first_thumbnail"></li>
              <li class="second_thumbnail"></li>
            </ul>
          </div>
        </div>
        <div class="photo_frame_submission_2">
          <div class="frame_submisstion_photo_frame_2" style="display:none;"> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/submission_photo_bg_1.png" width="272" height="205" /> </a> </div>
          <div class="rotate_resize_function_submission">
            <div class="resize_submission">
              <ul>
                <li>RESIZE</li>
                <li><img src="<?php echo $this->themeUrl;?>/images/resize.png" width="160" height="24" /></li>
              </ul>
            </div>
            <div class="rotate_submission">
              <ul>
                <li>ROTATE</li>
                <li><img src="<?php echo $this->themeUrl;?>/images/resize.png" width="160" height="24" /></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="drag_drop_submission">
    	<div class="drag_drop_submission_images">
        	<ul>
              <li class="glasses_1"> <img src="<?php echo $this->themeUrl;?>/images/drag_glasses_1.png" width="76" height="34" /> </li>
              <li class="mufral"> <img src="<?php echo $this->themeUrl;?>/images/drag_mufral.png" width="69" height="55" /> </li>
              <li class="fire"> <img src="<?php echo $this->themeUrl;?>/images/drag_fire.png" width="51" height="60" /> </li>
              <li class="juice"> <img src="<?php echo $this->themeUrl;?>/images/drag_juice.png" width="56" height="72" /> </li>
              <li class="sun"> <img src="<?php echo $this->themeUrl;?>/images/drag_sun.png" width="60" height="59" /> </li>
              <li class="cap_1"> <img src="<?php echo $this->themeUrl;?>/images/drag_cap_1.png" width="62" height="52" /> </li>
              <li class="cap_2"> <img src="<?php echo $this->themeUrl;?>/images/drag_cap_2.png" width="62" height="43" /> </li>
              <li class="glasses_3"> <img src="<?php echo $this->themeUrl;?>/images/drag_glasses_3.png" width="68" height="24" /> </li>
              <li class="munch_2"> <img src="<?php echo $this->themeUrl;?>/images/drag_munch_1.png" width="71" height="21" /> </li>
            </ul>
        </div>
    </div>
    </div>
    
    
    <!------------------------- ☺ Submission Left End ☺ ------------------------->
    <div class="terms_and_condition_and_private_policy_prelike">
      <div class="terms_pp">
        <ul>
          <li> <a href="javascript:;" onclick="showtermandcondition();"> Нууцлалыг хадгалах журам </a> </li>
          <li class="dot_d"> . </li>
          <li><a href="javascript:;" onclick="showprivacypolicy();"> Уралдааны дүрэм </a> </li>
        </ul>
      </div>
    </div>
    <!------------------------- ☺ Terms and Condition and Private Policy End ☺ ------------------------->
    <div class="kfc_logo_footer_prelike"> <a href="#"> <img src="<?php echo $this->themeUrl;?>/images/kfc_footer_logo.png" width="181" height="68" /> </a> </div>
    <!------------------------- ☺ KFC Logo Footer End ☺ -------------------------> 
  </div>
  <div class="clear"></div>
</div>