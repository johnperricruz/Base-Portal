<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class logout extends CI_Controller {
	public function destroy(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
