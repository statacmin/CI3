<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Batch extends MY_Controller {
    function __construct(){
        parent::__construct();
    }
    function process(){
 	$this->load->model('user_model'); 	
 	$users = $this->user_model->gets();
    }
}
?>