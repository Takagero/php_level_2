<?php
Class Controller_Index Extends Controller_Base {


        function index() {
        	
//        	$this->registry['model']->get();'
        	$this->registry['template']->show('index');
        	
        	
        }
}


?>