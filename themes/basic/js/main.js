/*----------------------term and condition / privacy policy start-------------------------------*/
function showtermandcondition(){
	$(".backcover").css("display","block");
	$(".maintermandcondition").css("display","block");
}
function closetermandcondition(){
		$(".backcover").css("display","none");
		$(".maintermandcondition").css("display","none");
}
function showprivacypolicy(){
	$(".backcover").css("display","block");
	$(".mainprivacypolicy").css("display","block");
}
function closeprivacypolicy(){
		$(".backcover").css("display","none");
		$(".mainprivacypolicy").css("display","none");
}
function closesrickerlimitpopup(){
		$(".backcover").css("display","none");
		$(".mainsricker_limit_popup").css("display","none");
}
function closemainfilesizelimit(){
		$(".backcover").css("display","none");
		$(".mainfilesizelimit").css("display","none");
}

/*----------------------term and condition / privacy policy end----------------------------------*/
/*----------------------square and round image div show-----------------------------------------*/
function showsquareimage(){
	$("#framesqureimg").css("display","block");
	$("#frameroundimg").css("display","none");
	$('.first_thumbnail1').css("display","none");
	$('.first_thumbnail').css("display","block");
	$('.second_thumbnail1').css("display","none");
	$('.second_thumbnail').css("display","block");
	
}
function showroundimage(){
	$("#frameroundimg").css("display","block");
	$("#framesqureimg").css("display","none");
	$('.first_thumbnail1').css("display","block");
	$('.first_thumbnail').css("display","none");
	$('.second_thumbnail1').css("display","block");
	$('.second_thumbnail').css("display","none");
}



var jslidernoconft = jQuery.noConflict();
    jslidernoconft(function(){

      jslidernoconft('.inner_detailtext').slimscroll({
        height: '288px',
		width: '636px',
		scrollBy: '50px'
      });
      

    });

/*----------------------square and round image div end-----------------------------------------*/

function show_box(url) {
	box=window.open(url,'name','height=500,width=700,scrollbars=yes');
	if (window.focus) {box.focus()}
	return false;
}

 /*------------other data----------------------------*/
function getS(number)
{
    if(number == 1){return '';}
    return 's';
}

function secondsToTime(secs)
{
    
    if(secs > 3600)
    {
        hours = Math.round(secs / 3600);
        return hours+' hour'+getS(hours);
    }
    
    if(secs > 60)
    {
        minutes = Math.round(secs / 60);
        return minutes+' minute'+getS(minutes);
    }
    return secs+' second'+getS(secs);
    
}


function showVoteBtn()
{
    $.ajax({
        url: "index.php?r=site/showVoteBtn&videoId="+$("#now_video_id").val(),
        context: document.body,
        async: true,
        success: function(out)
        {
            var outObj = jQuery.parseJSON(out);
            if(outObj.msg=='show')
            {
                $("#voteBtn").show();
            }
            if(outObj.msg=='rating_too_early')
            {
                $("#voteAgainMsg").show();
                $("#voteAgainMsg").html("Thanks! you can vote again in "+secondsToTime(outObj.time_left)+"!");
            }

        }
    });
    
    
}




function voteUp(postID,postUser,pic)
{
    
    $("#voteBtn"+postID).hide();
    $(".voteBtnAreaProgressImg"+postID).show();

    
    $.ajax({
        url: "index.php?r=site/DoVoteUp&videoId="+postID,
        context: document.body,
        async: true,
        success: function(out)
        {
            $(".voteBtnAreaProgressImg"+postID).hide();
            
            out = out.toString();

            var outObj = jQuery.parseJSON(out);
            
            alert(outObj.msg);
            
            if(outObj.msg=='rate_limit_exceeded')
            {              
                 //$(".voteBtnArea"+postID).html("<div class='errorMsg' >You are not allowed to give more than "+outObj.total_videos+" votes on this post</div>");
                    
                    alert("Sorry! You are not allowed to add more ratings");
                    
                  //$.prompt('<span style="color:red" >Sorry! You are not allowed to give more than '+outObj.total_videos+' votes on this entry.</span>');
                  
                  
                  
                  
                return false;
            }
            if(outObj.msg=='rating_too_early')
            {             
                //$(".voteBtnArea"+postID).html("<div class='errorMsg' >You are not allowed to vote before "+secondsToTime(outObj.time_left)+" on this post</div>");

                
                //$.prompt('<span style="color:red" >Sorry! You are not allowed to vote before '+secondsToTime(outObj.time_left)+' on this entry.</span>');
                
                alert("Sorry! Ratings too early");
   
                //$.prompt('<span style="color:red" >Sorry, you can only vote for each entry once a day. Please vote again after 24 hours!</span>');
                
                
                
                
                
                return false;
            }
             
            
            if(outObj.msg=='added')
            {
                
                //$(".voteBtnArea"+postID).show();
                //$(".voteBtnArea"+postID).html("<div class='successMsg' >Voted successfully</div>");
                
                
                
                $("#nowVotes"+postID).val((($("#nowVotes"+postID).val()*1)+(1*1)));
                
                s = "";
                if($("#nowVotes"+postID).val() != 1)
                {
                    s = "s";
                }
                
                 //$("#nowVotesTD"+postID).html($("#nowVotes"+postID).val()+" Vote"+s);
                 
                 $("#nowVotesTD"+postID).html($("#nowVotes"+postID).val());
                 
                 //$(".nowVotesTDSingle"+postID).html($("#nowVotes"+postID).val()+" Like"+s);
                
                $(".nowVotesTDSingle"+postID).html($("#nowVotes"+postID).val());
                
                 //parseInt
              
                 $.prompt('Thank you! You may vote again tomorrow.');
               
                //auto publishing on user's wall
                //publish_stream($("#nowUserName").val()+' just placed a vote in the Naughtiest Kids Photo Contest. Are your kids even naughtier? Well then, join the fun and stand a chance to bag amazing prizes!',$("#appName").val(),'Do you have kids? Are they sometimes naughty? Amazing prizes are waiting for you. All it takes is a funny photo. Enter now and join the fun with your children!',pic)
                
                
                //showMsg("Voted Successfully",'success');
            }
        }
    });
}



function showMsg(msg,type)
{
    if(type=='success')
    {
        $(".msg_div").show();
        $(".flash-success").html(msg);
        $(".flash-success").animate({
            opacity: 1.0
        }, 3000).fadeOut("slow");
    }
}

function fbSharePopup()
{
    pic='http://img.youtube.com/vi/'+$("#nowVideoCode").val()+'/default.jpg';
    publish_stream_pop($("#nowVideoTitle").val(),$("#nowVideoDetails").val(),$("#tabUrl").val(),pic);
}

function validateForm()
{
    $("#err_msg").hide();
    if($("#photo").val() == '' && $("#fb_photo").val() == '' )
    {
        $("#err_msg").fadeIn();
        $("#err_msg").html("Please choose photo")
        return false;
    }

    if($("#details").val()=='' || $("#details").val()=='Some words to describe your kids')
    {
        $("#err_msg").fadeIn();
        $("#err_msg").html("Please enter post details");
        $("#details").focus();
        return false;
    }   
    
    if($("#details").val().length > 250)
    {  
        $("#err_msg").fadeIn();
        $("#err_msg").html("Description should be less than 250 characters");
        $("#details").focus();
        return false;
    }
    
    
    if($("#first_name").val()=='' || $("#first_name").val()=='First Name')
    {
        $("#err_msg").fadeIn();
        $("#err_msg").html("Please enter your first name");
        $("#first_name").focus();
        return false;
    }   
    
    
    if($("#last_name").val()=='' || $("#last_name").val()=='Last Name')
    {
        $("#err_msg").fadeIn();
        $("#err_msg").html("Please enter your last name");
        $("#last_name").focus();
        return false;
    }   
    
    

    
    if($("#email").val()=='')
    {
        $("#err_msg").fadeIn();
        $("#err_msg").html("Please enter your email address");
        $("#email").focus();
        return false;
    }
    
    
    if($("#location").val()=='' || $("#location").val()=='Location')
    {
        $("#err_msg").fadeIn();
        $("#err_msg").html("Please enter your location name");
        $("#location").focus();
        return false;
    }    
    
    $("#submit_btn").hide();
    $("#progess_img").show();
    
}


function sendFriendInvite(title,message,id)
{

    FB.ui({
        method: 'apprequests', 
        message: message, 
        title: title,
        data: id
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


function inviteFriends(postID, title, details)
{
    sendFriendInvite(title,details,postID);
}


function deleteEntry(id, order, signed_request)
{
    var conf = confirm("Are you sure  to delete the entry?");
    
    if(conf){
        document.location = "index.php?r=site/list&order="+order+"&signed_request="+signed_request+"&delID="+id;
    }
}

function deleteEntryPrompt(id, order, signed_request)
{
    $("#delLink"+id).hide();
    
    $("#delArea"+id).show();
}


function hideDelArea(id)
{
    $("#delLink"+id).show();
    
    $("#delArea"+id).hide();
}

function changeFrame(i,leftPadding,topPadding)
{
   
   
   $("#imageFrame").attr("src", "images/Frame"+i+"_small.png");
   
   $("#photoPreview").css("margin-left", leftPadding+"px");
   $("#photoPreview").css("margin-top", topPadding+"px");
   
   $("#nowFrame").val(i);
   
   return false;
   
    $(".colorChooserBox").css("border-color","#f6f6f6");
    $("#colorChooserBox"+id).css("border-color","#ff2da0");
    
    //$("#thumbPreviewBox").css("background-color","#"+id);
   

   
    //$("#thumbPreviewBox").css("background","url(images/frameMedium"+i+".png)no-repeat");
    
    $("#thumbPreviewImg").attr("src", "images/frameMedium"+i+".png");
   
    $("#Videos_theme").val(i);  
    
    //$("#thumbPreviewBox").css("border-color","#"+borderColor);
}

function changeLogo()
{
    badge = $("#Videos_values_field").val();
        
    $("#logo").attr("src", "images/logo_"+badge+".png");
    
}

	
        
//hover image        
$(document).ready(function() {
$("img.rollover").hover(
function() { this.src = this.src.replace("_off", "_on");
},
function() { this.src = this.src.replace("_on", "_off");
});
});

function loadNext(nowI)
{

    //nowI = $("#nowI").val();

    nextI = (1*nowI) + (1*1);

    $("#nowI").val(nextI);

    if(nextI == 5)
    {
        $("#nextBtn").hide();	    
    }	
    viewEntry(nextI);
}

    
function loadBack(nowI)
{

    //nowI = $("#nowI").val();

    backI = nowI - 1;

    $("#nowI").val(backI);

    if(backI == 1)
    {
        $("#backBtn").hide();	    
    }	
    viewEntry(backI);
}

    
function getVeryFirstImage()
{
    totalImg = $('.recordPic').length; 
    
    if(totalImg == 0)
    {
        $("#veryFirstImage").val('');
        return false;
    }
    
    veryFirstImagePath = $('.recordPic:first').attr("src");  
    veryFirstImageArr = veryFirstImagePath.split("/");    
    $("#veryFirstImage").val(veryFirstImageArr[2]);
}

function getFirstImage(cat)
{
    
    totalImg = $('.recordPic_'+cat).length;    
    
    
    if(totalImg == 0)
    {
        $("#"+cat+"_image").val('');
        return false;
    }
    
    firstImagePath = $('.recordPic_'+cat+':first').attr("src"); 
    firstImageArr = firstImagePath.split("/");    
    $("#"+cat+"_image").val(firstImageArr[2]);
}

function addRow(url,catName,type)
{
    
    
     
    
    $.ajax({
        url: "index.php?r=site/addRow&url="+url+"&catName="+catName+"&type="+type+"&nowLocation="+$("#nowLocation").val(),
        context: document.body,
        async: true,
        success: function(out)
        {
            var outObj = jQuery.parseJSON(out);
       
            
            //set first image of every cat
            if($("#"+catName+"_image").val() == "")
            {
                //$("#"+catName+"_image").val(outObj.imageName);
            }
            
            
            if(outObj.msg=='added')
            {
                loadRows(catName);   
                
                getFirstImage(catName);
            }   

        }
    });
    
    
}




function loadRows(catName)
{        
        
        $.ajax({
        url: "index.php?r=site/loadRows&catName="+catName,
        context: document.body,
        async: true,
        success: function(out)
        {            
            $("#"+catName+"_progressImg").hide();
            
            $("#cat_"+catName+"_area").html(out);
            
            
            
            getFirstImage(catName);
            getVeryFirstImage();

        }
    });
}





function updateDetails(id,catName)
{
        
        $("#"+catName+"_progressImg").show();
        
        $.ajax({
        url: "index.php?r=site/updateDetails&id="+id+"&details="+$("#detailsBox"+id).val(),
        context: document.body,
        async: true,
        success: function(out)
        {
            //$("#cat_"+catName+"_area").html(out);
            
            $("#"+catName+"_progressImg").hide();

        }
    });
}

function deleteRow(id,catName)
{
        $("#"+catName+"_progressImg").show();
        
        $("#recordImgArea"+id).html("");
        
        
        $.ajax({
        url: "index.php?r=site/deleteRow&id="+id,
        context: document.body,
        async: true,
        success: function(out)
        {
            $("#"+catName+"_progressImg").hide();
            
            $("#recordTable"+id).fadeOut();            

            $("#recordImgArea"+id).html("");

            getVeryFirstImage();
            
            getFirstImage(catName);

        }
    });
}

function addYoutubeVideoRow(catName)
{   
    addRow('',catName,'youtubeVideo');
}


function updateVideoUrl(id,catName)
{
    
    if($("#youtubeVideoUrl"+id).val() == ""){
        return false;
    }
    
    $("#"+catName+"_progressImg").show();
    
     $.ajax({
        url: "index.php?r=site/updateVideoUrl&id="+id+"&url="+$("#youtubeVideoUrl"+id).val(),
        context: document.body,
        async: true,
        success: function(out)
        {                                  
            $("#"+catName+"_progressImg").hide();
            
            $("#recordImg"+id).attr("src","photos/thumbs/"+out);
            
            getVeryFirstImage();
            
            getFirstImage(catName);
        }
    });
}




function showSuccessStories()
{
    $('#previewModalStories').slideDown();
    
    $('#previewModalStories').html( loadingMsg );
    
    
    //$("#previewModalStories").css("height",$(document).height());
    
    $.ajax({
        url: "index.php?r=site/SuccessPreview",
        context: document.body,
        async: true,
        success: function(out)
        {            
            $("#previewModalStories").html(out);
            
            $("#previewModalStories").css("height",$(document).height());
            
            FB.Canvas.scrollTo(0,0);
            
        }
    });
    
}
window.fbAsyncInit = function() {
    FB.Canvas.setSize({ width: 810, height: 960 });
	}







function customFbShare(title,details,url,img){

    var popupUrl = "https://www.facebook.com/sharer.php?s=100&p[url]="+url+"&p[images][0]="+img+"&p[title]="+title+"&p[summary]="+details;

    newwindow=window.open(popupUrl,'Facebook','height=320,width=650');
        if (window.focus) {newwindow.focus()}
        return false;
}
/*
        function facebook_send_message() {
        var imageUrl = "http://apps.circussocial.com/protected/modules/guinessarthursday/themes/basic/images/acts_of_image.png";
        var link ='http://apps.facebook.com/guinessarthursday';
        FB.ui({
            method: 'send',
            name: 'Arthurs Day 2013',
            link: link,
            picture: imageUrl,
            description:'The Do Good initiative encourages Singaporeans to perform simple acts of good deeds and to share the joy of giving with their family and friends. To pledge a good deed, read stories on kindness and generosity, or learn more about our campaign, please visit www.dogood.sg'

        });
    }*/
	
	function facebook_send_message(to) {
    FB.ui({
        app_id:'440958892676429',
        method: 'send',
        name: "sdfds jj jjjsdj j j ",
        link: 'https://apps.facebook.com/xxxxxxxaxsa',
        to:to,
        description:'sdf sdf sfddsfdd s d  fsf s '

    });
}