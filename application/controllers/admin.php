<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class admin extends CI_Controller {

	protected $attributes;
	
	public function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		
		$this->attributes = array(
			'dp'             => $this->get_data->getDpViaID(pid()),
			'personal_info'  => $this->get_data->getPersonalInfoViaID(pid())
		);
		
		if(!$role){
			authenticate($role);
		}
	}
	public function index(){
		$data = $this->attributes;
		$data['selected'] = "dashboard";
		$this->load->view('admin/dashboard',$data);
	}
	public function view($module){
		$data = $this->attributes;
		
		//Profile View
		if($module == "profile"){
			$data['selected'] = "profile";
			$this->load->view('admin/profile',$data);
		}
		//Settings View
		else if($module == "settings"){
			$data['selected'] = "settings";
			$data['date_format'] = $this->get_data->getSettings("SystemDate");
			$data['time_format'] = $this->get_data->getSettings("SystemTime");
			$data['forgot_password'] = $this->get_data->getSettings("ForgotPassword");
			$data['site_url'] = $this->get_data->getSettings("UnsecuredSiteAddress");
			$data['system_mailer'] = $this->get_data->getSettings("SystemMailer");
			$data['system_sender'] = $this->get_data->getSettings("SystemSender");
			$this->load->view('admin/settings',$data);
		}
		//Default View
		else{
			redirect(base_url('admin'));
		}
		
	}	
	public function edit($mode,$module){
		$data = $this->attributes;
		$response;
		//$mode = "view" or "process"
		//$module = "save-login","","save-profile","save-settings"
		//Saving engine
		if($mode == "process"){
			extract($_POST);
			
			//Save login info
			if($module == "save-login"){
				$file['allowed'] = array('gif','png' ,'jpg','jpeg');
				$file['file_name'] = $_FILES['fileDP']['name'];
				$file['extension'] = pathinfo($file['file_name'], PATHINFO_EXTENSION);
				$file['path'] = getcwd().'/assets/img/user-uploads/';
				$data['response'] = false;
				$data['upload-response'] = false;
				
				//Check if there is selected image.
				if($_FILES['fileDP']['size'] != 0){
					if(in_array($file['extension'],$file['allowed'])){		
						generateRandomString(40);
						$data['upload-response'] = $this->edit_data->uploadDpViaID(pid(),getRandomString().'.'.$file['extension']);
						
						move_uploaded_file($_FILES['fileDP']['tmp_name'], $file['path'].getRandomString().'.'.$file['extension']);	
						clearRandomString();					
					}					
				}	
				
				$data['response'] = $this->edit_data->updateLoginViaID(pid(),$txtUsername,$txtPassword,$txtEmail);
				
				if($data['response']){
					$response = array(
						'login' => "success"
					);
				}else{
					$response = array(
						'login' => "error"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/profile'));
			}
			
			//Save personal info
			else if($module == "save-profile"){
				$data['response'] = $this->edit_data->updateProfileViaID(pid(),$txtFname,$txtMName,$txtLName,$txtBday,$rdGender);
				if($data['response']){
					$response = array(
						'profile' => "success"
					);
				}else{
					$response = array(
						'profile' => "error"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/profile'));			
			}
			//Save Settings 
			else if($module == "save-settings"){				
				$data['date'] = $this->edit_data->saveSettings($txtDate,"SystemDate");
				$data['time'] = $this->edit_data->saveSettings($txtTime,"SystemTime");
				$data['forgot'] = $this->edit_data->saveSettings($chkForgot,"ForgotPassword");
				$data['site_url'] = $this->edit_data->saveSettings($txtSiteUrl,"UnsecuredSiteAddress");
				$data['system_sender'] = $this->edit_data->saveSettings($txtSystemSender,"SystemSender");
				$data['system_mailer'] = $this->edit_data->saveSettings($txtSystemMailer,"SystemMailer");
				if($data['date']){
					if($data['system_mailer']){
						$response = array(
							'settings' => "success"
						);
					}
				}else{
					$response = array(
						'settings' => "error"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/settings'));
			}
			//No module, default View.
			else{
				redirect(base_url('admin'));
			}
			
		}
		
	}
	public function debug(){
		 generateRandomString(40);
	}
	
}
