

<?php
$this->pageTitle = "Customize Theme";

$this->breadcrumbs[] = '<li><a href="index.php?r=site/index">Dashboard</a></li>';
$this->breadcrumbs[] = '<li><a href="index.php?r=' . $this->moduleName . '/default">'.CHtml::decode($this->nowModule->name).'</a></li>';
$this->breadcrumbs[] = '<li><a href="index.php?r=' . $this->moduleName . '/default">Design</a></li>';
$this->breadcrumbs[] = '<li class="current"><a href="#">Customize</a></li>';
?>
 
 
<form action="" class="main" id="customizeForm" method="post">
            <fieldset>
                <div class="widget fluid">
                    <div class="whead"><h6>Customize</h6></div>
                      
                    <div class="formRow">
                        <div class="grid3"><label for="appTitle">Enter App Name:</label></div>
                        <div class="grid4"><input type="text" name="labelfor" id="appTitle" value="<?php echo @$localApp->title; ?>"></div>
                    </div>
                     
                </div>
            </fieldset>


</form>

<br />

<a href="javascript:;" onclick="saveApp('1');" class="buttonM bGreen"><span class="icon-arrow-right-3"></span><span>Next</span></a>


<input type="hidden" id="pageHtml" value="N/A">
<input type="hidden" id="localAppId" value="">
<input type="hidden" id="pageBgColor" value="">
<input type="hidden" id="pageBgImage" value="">


<script>
    
$("#customizeForm").submit(function(){
    
    saveApp('1');
    return false;
});
    
function saveApp(gotoNext)
    {
	
	if($("#appTitle").val() == "")
	{
	    alert("Please enter app name.")
	    return false;
	}
 
	
	var appData = {};
	appData.pageHtml = $("#pageHtml").val();
	appData.themeId = <?php echo $_REQUEST['themeId']; ?>;
	appData.appTitle = $("#appTitle").val();
	appData.localAppId = $("#localAppId").val();
    
	appData.pageBgColor = $("#pageBgColor").val();
	appData.pageBgImage = $("#pageBgImage").val();
      
	$("#progressImg").show();

	$.ajax({
	    type: "GET",
	    url: "index.php?r=<?php echo $this->moduleName; ?>/default/saveApp",
	    data: appData
	}).done(function( out ) {
	    
	    //alert(out);
	  
	    out = out.toString();

            var outObj = jQuery.parseJSON(out);	   
	  
	    if(outObj.msg == "added" || outObj.msg == "updated")
	    {		
		document.location = "index.php?r=<?php echo $this->moduleName; ?>/default/settings&tab=basic&themeId=<?php echo $_REQUEST['themeId']; ?>&localAppId="+outObj.localAppId;
	    }

      
	});

   
    }    
</script>    