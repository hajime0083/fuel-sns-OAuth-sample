<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_index extends Controller_Template
{
        var $menuClass = "";
        var $pageTitle = "";
        
        public function __construct(){
            $this->menuClass = "index";
            $this->pageTitle = "TEST Index";
        }

        /**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;
            $data['word']      = "test/index";
            $this->template->content = View::forge('index/index',$data);
	}
        

}
