<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class edit_data extends CI_Model {
	public function updateLoginViaID($pid,$txtUsername,$txtPassword,$txtEmail){
		$sql = "UPDATE tbl_login as a 
				JOIN tbl_personalinfo as b 
				ON a.PersonalInfoID = b.PersonalInfoID				
				SET a.Username = '".$txtUsername."',a.Password = '".$txtPassword."',b.EmailAddress = '".$txtEmail."' 
				WHERE a.PersonalInfoID = '".$pid."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function updateProfileViaID($pid,$txtFname,$txtMName,$txtLName,$txtBday,$rdGender){
		$sql = "UPDATE tbl_personalinfo		
				SET FName = '".$txtFname."',MName = '".$txtMName."',LName = '".$txtLName."', Gender = '".$rdGender."'
				WHERE PersonalInfoID = '".$pid."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function uploadDpViaID($pid,$filename){
		$sql = "UPDATE tbl_personalinfo 
				SET DisplayPic = '".$filename."' 
				WHERE PersonalInfoID = '".$pid."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function saveSettings($value,$settingsName){
		$sql = "UPDATE tbl_settings 
				SET Value = '".$value."' 
				WHERE SettingsName = '".$settingsName."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function resetPassword($hdKey,$txtPassword){
		$sql = "UPDATE tbl_login
				SET Password = '".$txtPassword."' 
				WHERE `Key` = '".$hdKey."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
}