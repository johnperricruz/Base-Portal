<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		if($role){
			authenticate($role);
		}
	}
	public function check_rules(){
		extract($_POST);
		$this->form_validation->set_rules('txtUsername','Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txtPassword','Password', 'trim|required|xss_clean');
		if(!$this->form_validation->run()){
			redirect(base_url('login'));
		}else{
			 $this->validate($txtUsername,$txtPassword);
		}
	}
	public function validate($username,$password){
		$data['result'] = $this->get_data->getPersonalInfo($username,$password);
		if(count($data['result'])!=0){
			$session = array(
				'role' => $data['result'][0]->Role,
				'user_id' => $data['result'][0]->PersonalInfoID
			);
			if($data['result'][0]->Role == 'admin'){
				$this->session->set_userdata($session);
				redirect(base_url('admin'));
			}else if($data['result'][0]->Role == 'user' ){
				$this->session->set_userdata($session);
				redirect(base_url('agents'));
			}else{
				redirect(base_url('login'));
			}
		}else{
				$response =  array(
					'resp' => 'error',
					'msg' => 'Authentication Failed!'
				);
			$this->session->set_flashdata($response);
			redirect(base_url('login'));
		}
	}
	public function module($mode,$module){
		//$mode = proccess , view
		//$module = forgot-password, send-password
		
		if($mode == "view"){
			//forgot-password view
			if($module == "forgot-password"){
				$this->load->view('forgot-password');
			}else{
				redirect(base_url('login'));
			}			
		}
		
		else if($mode == "process"){
			extract($_POST);
			//Send Password
			if($module == "send-password"){
				$data['response'] = $this->get_data->getResetCount($txtUsername,$txtEmail);
				if($data['response'][0]->cnt!=0){
					$data['key'] = $this->get_data->getKey($txtUsername,$txtEmail);
					$data['system_email'] = $this->get_data->getSettings("SystemMailer");
					$data['system_sender'] = $this->get_data->getSettings("SystemSender");
					$data['unsecured'] = $this->get_data->getSettings("UnsecuredSiteAddress");
					
					$system_email = $data['system_email'][0]->Value;
					$system_sender = $data['system_sender'][0]->Value;
					$unsecured = $data['unsecured'][0]->Value;
					$key =  $data['key'][0]->Key;
					
					/*SEND EMAIL*/
					
					/*EMAIL SETTINGS*/
						$this->load->library('email');
						$config = array(
						  'mailtype' => 'html'
						);
						$this->email->initialize($config);
					/*END EMAIL SETTINGS*/		
					$content = '
						<html> 
							<head></head>
							<body>
								<h6>You are about to reset your password, to proceed, please click the link below: </h6>
								<a href='.$unsecured.'"login/reset/'.$key.'">Click here to reset your password</a>
								--<br/><br/>
								This is system generated, do not reply.
							</body>
						</html>';
					
					$this->email->from(''.$system_email.'', ''.$system_sender.'');
					$this->email->to($txtEmail); 
					$this->email->subject('Password Reset');
					$this->email->message($content);						
					/*SEND EMAIL*/
					$this->email->send();
					if($this->email->send()){
						$response = array(
							'ret' => 'success'
						);
					}else{
						show_error($this->email->print_debugger());
					}
				}else{
					$response = array(
						'ret' => 'error'
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('/login/module/view/forgot-password'));
			}
			//Reset Password
			else if($module == "reset-password"){			
				if($txtPassword == $txtConfirm){
					$data['response'] = $this->edit_data->resetPassword($hdKey,$txtPassword);
					if($data['response']){
						$response = array(
							'ret' => 'success'
						);	
					}
				}else{
					//Not same Password
					$response = array(
						'ret' => 'failed'
					);						
				}
				$this->session->set_flashdata($response);
				redirect(base_url('/login/reset/'.$hdKey.''));
			}
			else{
				redirect(base_url('login'));
			}				
		}
		
		else{
			redirect(base_url('login'));
		}	

	}
	public function reset($key){
		$data['key'] = $key;
		if($key!=null){
			$this->load->view('reset-password-fields',$data);
		}else{
			redirect(base_url('login'));
		}
		
	}
	public function index(){
		$data['forgot_password'] = $this->get_data->getSettings("ForgotPassword");
		$this->load->view('login',$data);
	}
}
