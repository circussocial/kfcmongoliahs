<?php

class MyController extends TabController
{

 
        /**
     * Declares class-based actions.
     */
    public function __construct($id, $module = null)
    {
               
	parent::__construct($id, $module);
    }

    
    public function run()
    {
	 echo "i am in mycontroller<br />";
         
         print_r($this->fbUser);
    }
    
    
    public function actionIndex()
    {
        print_r($this->fbUser);
	 echo "i am in index of mycontroller<br />";
    }
    
    
    
    
    
}