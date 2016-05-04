<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class get_data extends CI_Model {

	public function validate($username,$password){
		$sql = "SELECT COUNT(LoginID) as cnt FROM  tbl_login";
		$result = $this->db->query($sql);	
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getPersonalInfo($username,$password){
		$sql = "SELECT b.PersonalInfoID,a.Role,a.Username,a.Password  
				FROM  tbl_login as a 
				JOIN tbl_personalinfo as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE (Username='".$username."' && Password='".$password."') ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getPersonalInfoViaID($pid){
		$sql = "SELECT * FROM tbl_login as a
				JOIN tbl_personalinfo as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE a.PersonalInfoID = '".$pid."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDpViaID($pid){
		$sql = "SELECT DisplayPic FROM  tbl_personalinfo
				WHERE PersonalInfoID = '".$pid."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getSettings($settings){
		$sql = "SELECT Value FROM  tbl_settings
				WHERE SettingsName = '".$settings."' ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getResetCount($txtUsername,$txtEmail){
		$sql = "SELECT COUNT(*) as cnt FROM  tbl_personalinfo as a
				JOIN tbl_login as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE (a.EmailAddress = '".$txtEmail."' AND b.Username = '".$txtUsername."') ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getKey($txtUsername,$txtEmail){
		$sql = "SELECT b.Key FROM  tbl_personalinfo as a
				JOIN tbl_login as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE (a.EmailAddress = '".$txtEmail."' AND b.Username = '".$txtUsername."') ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}

	
}