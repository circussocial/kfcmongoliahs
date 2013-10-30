 <?php
$isPreliked = $this->facebook->isPageLiked();
if($isPreliked == false)
{
?>

  <div class="prelike_wrapper">
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
  <?php
}
?>
