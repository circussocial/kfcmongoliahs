<div class="main_wrapper">
<div id="backcover" class="backcover"></div>
<div class="maintermandcondition">
<?php $this->renderPartial("termandcondition",array("PagesContent"=>$PagesContent)); ?> 
</div>
<div class="mainprivacypolicy">
<?php echo $this->renderPartial("privacypolicy",array("PagesContent"=>$PagesContent)) ?>
</div>

<?php echo $this->renderPartial("prelike") ?> 
  <div class="landing_page">
    <div class="left_landing">
     <div class="landing_text_left_1"></div>
      <div class="submit_button_landing"> <a href="index.php?r=kfcmongoliahs/tab/userPhotoSubmit&signed_request=<?php echo $_REQUEST['signed_request']; ?>"> <img src="<?php echo $this->themeUrl;?>/images/submit_button.png"  /> </a> </div>
    </div>
    <div class="terms_and_condition_and_private_policy_prelike">
      <div class="terms_pp">
        <ul>
          <li> <a href="javascript:;" onclick="showtermandcondition();"> Нууцлалыг хадгалах журам </a> </li>
          <li class="dot_d"> . </li>
          <li> <a href="javascript:;" onclick="showprivacypolicy();"> Уралдааны дүрэм </a> </li>
        </ul>
      </div>
    </div>
    <!------------------------- ☺ Terms and Condition and Private Policy End ☺ ------------------------->
    <div class="kfc_logo_footer_prelike">  <img src="<?php echo $this->themeUrl;?>/images/kfc_footer_logo.png" width="181" height="68" />  </div>
    <!------------------------- ☺ KFC Logo Footer End ☺ -------------------------> 
  </div>
  <div class="clear"></div>
</div>










