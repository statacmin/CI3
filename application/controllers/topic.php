<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Topic extends MY_Controller {

	   function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model("topic_model");
	   }	
	    
	    function index(){  	
	    	$this->_head();
	    	$this->_sidebar();
		$this->load->view('main');
		$this->_footer();
	    }

	    function get($id){	
		$this->_head();	
		$this->_sidebar();
		$topic = $this->topic_model->get($id);
		$this->load->helper(array('url', 'HTML', 'korean'));
		$this->load->view("get",array('topic'=>$topic));
		$this->_footer();
	    }

	    function add(){
	    	
	    	#로그인 필요
	    	if(!$this->session->userdata('is_login')){
		    	$this->load->helper('url');
		    	
		    	redirect('/auth/login?returnURL='.rawurlencode(site_url('/topic/add')));
		}

	    	$this->_head();
	    	$this->_sidebar();
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('title','제목','required');
	    	$this->form_validation->set_rules('description','본문','required');

	    	if ($this->form_validation->run() == FALSE){
			$this->load->view('add');
             }
             else{
			$topic_id = $this->topic_model->add($this->input->post('title'),$this->input->post('description'));
			
			#이메일 전송
			$this->load->model('user_model');
			$users = $this->user_model->gets();
			$this->load->library('email');
			$this->email->initialize(array('mailtype'=>'html'));

			foreach ($users as $user) {
				$this->email->from('statacmin@naver.com', '김용민');
				$this->email->to($user->email);
				$this->email->subject('새로운 글이 등록되었습니다.');
				$this->email->message('<a href="'.site_url().'index.php/topic/get/'.$topic_id.'">'.$this->input->post('title').'</a>');
				$this->email->send();
			}

			redirect('/topic/get/'.$topic_id);
             }
	    	
		$this->_footer();
		#echo $this->input->post('title');
	    	#echo$this->input->post('description');
	    }

	    function upload_receive(){
		// 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
		$config['upload_path'] = './static/user';
		// git,jpg,png 파일만 업로드를 허용한다.
		$config['allowed_types'] = 'gif|jpg|png';
		// 허용되는 파일의 최대 사이즈
		$config['max_size'] = '100';
		// 이미지인 경우 허용되는 최대 폭
		$config['max_width']  = '1024';
		// 이미지인 경우 허용되는 최대 높이
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('upload')){
			echo "<script>alert('업로드에 실패했습니다. ".$this->upload->display_errors('','')."')</script>";
		}	
		else{
			
			$CKEditorFuncNum = $this->input->get('CKEditorFuncNum');
			$data = $this->upload->data();
			$filename = $data['file_name'];
			$url = '/ci3/static/user/'.$filename;

			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('".$CKEditorFuncNum."', '".$url."', '전송에 성공 했습니다')</script>";
		}
	    }

	    function upload_form(){
	    	$this->_head();
	    	$this->_sidebar();
	    	$this->load->view('upload_form');
	    	$this->_footer();
	    }

	}
?>
