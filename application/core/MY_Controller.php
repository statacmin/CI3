<?php
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->driver('cache', array('adapter' => 'file'));
	}	

	function _footer(){
		$this->load->view('footer');
	}


	function _head(){
		$this->load->view('head');
	}

	function _sidebar(){
		if ( ! $topics = $this->cache->get('topics')){
			$topics = $this->topic_model->gets();  
			$this->cache->save('topics', $topics, 300);
		}
		 
		$this->load->view('topic_list', array('topics'=>$topics)); 
	}
}
?>