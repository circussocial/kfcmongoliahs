<?php



$dashboardMenu = array();


$dashboardMenu['Customize'][] = '<li><a href="index.php?r='.$data->app.'/default/customizeTheme&themeId='.$data->theme_id.'&localAppId='.$data->app_local_id.'"><span class="icos-add"></span>Customize Theme</a></li>';


$dashboardMenu['Settings'][] = '<li><a href="index.php?r='.$data->app.'/default/settings&tab=content&themeId='.$data->theme_id.'&localAppId='.$data->app_local_id.'"><span class="icos-add"></span>Content Setting</a></li>';


$dashboardMenu['Settings'][] = '<li><a href="index.php?r='.$data->app.'/default/publishing&themeId='.$data->theme_id.'&localAppId='.$data->app_local_id.'"><span class="icos-add"></span>Publishing</a></li>';

$dashboardMenu['Settings'][] = '<li><a href="index.php?r='.$data->app.'/default/ManageAppUsers&globalAppId='.$data->app_global_id.'&moduleName='.$data->app.'"><span class="icos-add"></span>Manage Application Users</a></li>';



$dashboardMenu['Reports'][] = '<li><a href="index.php?r='.$data->app.'/default/DownloadUserReport&type=Entries&pageId='.$data->fb_tab_id.'&themeId='.$data->theme_id.'&localAppId='.$data->app_local_id.'"><span class="icos-add"></span>Download User Report</a></li>';

$dashboardMenu['Reports'][] = '<li><a href="index.php?r='.$data->app.'/default/DownloadCSV&type=Entries&pageId='.$data->fb_tab_id.'&themeId='.$data->theme_id.'&localAppId='.$data->app_local_id.'"><span class="icos-add"></span>Download User Entries</a></li>';




$this->renderPartial("//layouts/_dashboard_menu",array("columnName"=>$columnName, "dashboardMenu"=>$dashboardMenu, "data"=>$data));




?>