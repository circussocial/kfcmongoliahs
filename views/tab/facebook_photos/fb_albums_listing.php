<?php
 
?>
<style>
#mtl {
    display: none !important;
}
.mtl pam uiBoxRed{
  display: none !important;
 }

</style>
<ul>
    <?php
    foreach($albums['data'] as $album)
    {
	    echo '<li><a href="index.php?r=kfcmongoliahs/FacebookPhotos/listPhotos&albumID='.$album['id'].'&catName='.@$_REQUEST['catName'].'&signed_request='.$_REQUEST['signed_request'].'" onclick=showPhotos("'.$album['id'].'") >'.$album['name'].'</a></li>';
    }
    
    ?>
</ul>
