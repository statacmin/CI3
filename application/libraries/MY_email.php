<?php
	defined('BASEPATH') OR exit('No direct script access allowed');


class MY_email extends CI_Email{
	public function to($to){
		$this->ci = &get_instance();
		$_to = $this->ci->config->item('dev_receive_email');
		$to = !$_to ? $to : $_to;
		return parent::to($to);
	}
}