<h1>Choose A Page</h1>

<ul>
    
    <?php
    
    foreach($pages['data'] as $page)
    {
	if($page['category'] != 'Application')
	{
	    echo '<li>
	    <a href="index.php?r=admin/options&pageId='.$page['id'].'&pageName='.$page['name'].'&accessToken='.$page['access_token'].'" >
	    '.$page['name'].'
	    </a>
	    </li>';
	}
    }
    
    ?>
    
</ul>