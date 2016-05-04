<?php
function authenticate($role){
	if($role == 'admin'){
		redirect(base_url('admin'));
	}else if($role == 'user'){
		redirect(base_url('user'));
	}else{
		redirect(base_url('login'));
	}
}
function get_header($title,$class){
	$data['class'] = $class;
	$data['title'] = $title;
	$helper = &get_instance();
	$helper->load->view('includes/header',$data);
}
function get_navbar($role){
	$helper = &get_instance();
	$helper->load->view('includes/admin-nav');
}
function get_footer(){
	$helper = &get_instance();
	$helper->load->view('includes/footer');
}
function test(){
	return "Hello World";
}
function get_breadcrumbs($current){
	$helper = &get_instance();
	$data['current'] = $current;
	return $helper->load->view('includes/breadcrumbs',$data);
}
function get_topbar(){
	$helper = &get_instance();
	return $helper->load->view('includes/topbar');
}
function page_title($icon,$title){
	$helper = &get_instance();
	$data['icon'] = $icon;
	$data['title'] = $title;
	return $helper->load->view('includes/page-title',$data);
}
function pid(){
	$helper = &get_instance();
	return $helper->session->userdata('user_id');
}
function generateRandomString($limit){
	clearRandomString();
	$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
					 .'0123456789_'); // and any other characters
	shuffle($seed); // probably optional since array_is randomized; this may be redundant
	$rand = '';
	foreach (array_rand($seed, $limit) as $k){
		$rand .= $seed[$k];	
	}
	
	$helper = &get_instance();
	$holder = array(
			'char_holder' => $rand
	);
	$helper->session->set_userdata($holder);
}
function getRandomString(){
	$helper = &get_instance();
	return $helper->session->userdata('char_holder');
}
function clearRandomString(){
	$helper = &get_instance();
	return $helper->session->unset_userdata('char_holder');
}
function system_date_format($date){
	$helper = &get_instance();	
	$format = $helper->get_data->getSettings('SystemDate');
	return date(''.$format[0]->Value.'',strtotime($date));
}
function system_time_format($time){
	$helper = &get_instance();	
	$format = $helper->get_data->getSettings('SystemTime');
	return date(''.$format[0]->Value.'',strtotime($time));
}