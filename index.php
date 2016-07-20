<?php
/*
 *---------------------------------------------------------------
 * INTEGRATED INSTALLER
 *---------------------------------------------------------------
*/
class Installer{
	
	protected $db;

	public function __construct(){
		
		if(isset($_POST['btnInstall'])){
			
			extract($_POST);
			
			$this->db = $this->db_connect($host,$txtUser,$txtPassword,$txtDB);

			//Write to config.php
			$data['config'] = $this->write("config");
			
			//Write to database.php
			$data['database'] = $this->write("database");
		
			
			//Populate Database		
			$data['login_info'] = $this->populate_database('login');
			$data['personalinfo'] = $this->populate_database('personalinfo');
			$data['settings'] = $this->populate_database('settings');
			$data['settings_contents'] = $this->populate_database('settings_contents');

			//Insert Admin infos
			$data['admin'] = $this->adminInfo($txtAdminFName,$txtAdminMName,$txtAdminLName,$txtAdminEmail);
			$data['login'] = $this->loginInfo($textAdminUsername,$txtAdminPW,$txtAdminEmail);
	
			//Rename files and system init
			if($data){
				rename("index.php","installed.php");
				rename("index_temp.php","index.php");
			}
			header("location:index.php?msg=success");
		}
	}
	public function populate_database($table){
		$sql = "";
		if($table == "login"){
			$sql = "
				CREATE TABLE IF NOT EXISTS `tbl_login` (
				 `LoginID` int(10) NOT NULL AUTO_INCREMENT,
				 `PersonalInfoID` int(10) NOT NULL,
				 `Username` varchar(40) NOT NULL,
				 `Password` varchar(40) NOT NULL,
				 `Key` varchar(255) NOT NULL,
				 `Role` varchar(40) NOT NULL,
				 `Status` int(1) NOT NULL DEFAULT '1',
				 PRIMARY KEY (`LoginID`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1
			";
		}
		elseif($table == "personalinfo"){
			$sql = "
				CREATE TABLE `tbl_personalinfo` (
				 `PersonalInfoID` int(10) NOT NULL AUTO_INCREMENT,
				 `FName` varchar(40) NOT NULL,
				 `MName` varchar(40) NOT NULL,
				 `LName` varchar(40) NOT NULL,
				 `EmailAddress` varchar(60) NOT NULL,
				 `Gender` varchar(1) NOT NULL,
				 `Birthday` date NOT NULL,
				 `DateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				 `DisplayPic` varchar(255) NOT NULL,
				 PRIMARY KEY (`PersonalInfoID`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1
			";
		}
		elseif($table == "settings"){
			$sql = "
				CREATE TABLE `tbl_settings` (
				 `SettingsID` int(10) NOT NULL AUTO_INCREMENT,
				 `SettingsName` varchar(50) NOT NULL,
				 `Value` varchar(50) NOT NULL,
				 PRIMARY KEY (`SettingsID`)
				) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1
			";
		}
		elseif($table == "settings_contents"){
			$sql = "
				INSERT INTO `tbl_settings` (`SettingsName`, `Value`) VALUES
				('SystemDate', 'M d, Y'),
				('RememberMe', '0'),
				('SystemTime', 'H: i s'),
				('ForgotPassword', '1'),
				('SystemMailer', 'no-reply@johnperricruz.com'),
				('SystemSender', 'Owner')
			";
		}
		$result = $this->db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function run(){
			$return =  '
			<!DOCTYPE html>
			<html lang="en" class="body-full-height">
				<head>        
					<!-- META SECTION -->
					<title>Installer</title>            
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<meta http-equiv="X-UA-Compatible" content="IE=edge" />
					<meta name="viewport" content="width=device-width, initial-scale=1" />       
					<link rel="icon" href="favicon.ico" type="image/x-icon" />
					<!-- END META SECTION -->
					
					<!-- CSS INCLUDE -->        
					<link rel="stylesheet" type="text/css" id="theme" href="assets/css/theme-default.css"/>      
					<link rel="stylesheet" type="text/css" id="theme" href="assets/css/grid.css"/> 		
					<link rel="stylesheet" type="text/css" id="theme" href="assets/css/overlap.css"/> 		
				</head>
				<body>
					<div class="portal-installer">
						<div class="wrap grid">
							<div class="unit w-1-1">
								<form action="'.$this->submit_url().'" method="post" class="form-horizontal">
										<div class="panel panel-default">
											<div class="panel-body">
												
												<h3><span class="fa fa-gear"></span> System Installer</h3>
												<p>Fill out the fields to run the installer.</p>
											</div>
											<div class="panel-body form-group-separated">									
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Database Host</label>
													<div class="col-md-9 col-xs-7">
														<input  type="text"  name="host" class="form-control" required />
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">
														Database name<br/>
														<span style="color:#ccc; font-weight:lighter;"><i>Note : Don\'t forget to create database.</i></span>
													</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="txtDB" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Database User</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="txtUser" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Database Password</label>
													<div class="col-md-9 col-xs-7">
														<input type="password"  name="txtPassword" id="txtPassword" class="form-control">
													</div>
												</div>      
												<div class="form-group" style="border-bottom: 1px dashed #D5D5D5;">
													<label class="col-md-3 col-xs-5 control-label">Confirm Password</label>
													<div class="col-md-9 col-xs-7">
														<input type="password"  id="txtConfirmPassword" name="txtConfirmPassword" class="form-control">
													</div>
												</div>    									
											</div>
											<div class="panel-body">
												<h3><span class="fa fa-pencil"></span> Site admin</h3>
												<p>Administrative user for this system.</p>
											</div>	
											 <div class="panel-body form-group-separated">
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">First Name</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="txtAdminFName" class="form-control">
													</div>
												</div> 	
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Middle Name</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="txtAdminMName" class="form-control">
													</div>
												</div> 	
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Last Name</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="txtAdminLName" class="form-control">
													</div>
												</div> 	
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Username</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="textAdminUsername" class="form-control">
													</div>
												</div> 													
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Email Address</label>
													<div class="col-md-9 col-xs-7">
														<input type="email"  name="txtAdminEmail" class="form-control">
													</div>
												</div> 	
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Admin Password</label>
													<div class="col-md-9 col-xs-7">
														<input type="password" name="txtAdminPW" class="form-control">
													</div>
												</div> 		
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Confirm Password</label>
													<div class="col-md-9 col-xs-7">
														<input type="password"  name="txtConfirmPW" class="form-control">
													</div>
												</div> 										
												<div class="form-group">
													<div class="col-md-12 col-xs-5">
														<button name="btnInstall" class="btn btn-success  pull-right">Install</button>
													</div>
												</div>	
											</div>	
											<br/>								
										</div>
								</form>
							</div>
						</div>
					</div>
				</body>
				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript" ></script>
				<script>
					$(function(){
						comparePassword("#txtPassword","#txtConfirmPassword");
						comparePassword("input[name=txtAdminPW]","input[name=txtConfirmPW]");
						
					});
					function comparePassword(pass,conf){					
						$(conf).keyup(function(){
							if($(this).val()!="" && $(pass).val()!=""){
								if($(this).val() != $(pass).val()){
									$(conf).next("span").remove();
									$(pass).next("span").remove();
									
									$(conf).after("<span style=color:red>Password did not matched!</span>");
									$(pass).after("<span style=color:red>Password did not matched!</span>");
									
									$(conf).attr({style:"border:1px solid red;"});
									$(pass).attr({style:"border:1px solid red;"});
								
									$("button[name=btnInstall]").attr({disabled:true});
								}else{
									$(conf).next("span").remove();
									$(pass).next("span").remove();
									
									$(conf).attr({style:"border:1px solid green;"});
									$(pass).attr({style:"border:1px solid green;"});
									
									$("button[name=btnInstall]").attr({disabled:false});
								}
							}
						});
					}
				</script>
			</html>';
			echo $return;
	}
	public function db_connect($host,$txtUser,$txtPassword,$txtDB){
			$db = new mysqli($host,$txtUser,$txtPassword,$txtDB);
			if($db){
				return $db;
			}else{
				return false;
			}
	}
	public function adminInfo($fname,$mname,$lname,$email){
		$sql = "INSERT INTO tbl_personalinfo(FName,MName,LName,EmailAddress) VALUES ('".$fname."','".$mname."','".$lname."','".$email."')";
		$result = $this->db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function loginInfo($username,$password,$email){
	
		$admin_key = "nSsu6582V4j767fpdvP9TFH995W82q2T2x43g62X";
		
		$sql = "INSERT INTO tbl_login (PersonalInfoID,Username,Password,`Key`,Role) VALUES (1,'".$username."','".$password."','".$admin_key."','admin');";
		$result = $this->db->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function write($file){
		extract($_POST);
		if($file == "config"){
			$filename = getcwd() . "\application\config\config.php";
			$line_i_am_looking_for = 16;
			$lines = file( $filename , FILE_IGNORE_NEW_LINES );
			$lines[$line_i_am_looking_for] = "$"."config"."['base_url'] = '".$this->get_url()."/';";
			file_put_contents( $filename , implode( "\n", $lines ));
		}
		elseif($file == "database"){
			$filename = getcwd() . "\application\config\database.php";
			$line_i_am_looking_for = 51;
			$lines = file( $filename , FILE_IGNORE_NEW_LINES );
			$lines[$line_i_am_looking_for]  = "$"."db"."['default']['hostname'] = '".$host."';\n";
			$lines[$line_i_am_looking_for] .= "$"."db"."['default']['username'] = '".$txtUser."';\n";
			$lines[$line_i_am_looking_for] .= "$"."db"."['default']['password'] = '".$txtPassword."';\n";
			$lines[$line_i_am_looking_for] .= "$"."db"."['default']['database'] = '".$txtDB."';";
			file_put_contents( $filename , implode( "\n", $lines ));		
		}
	}
	public function rename($file){
	
	}
	public function database_install(){
		
	}
	public function get_url(){
		$url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
		$url .= $_SERVER['SERVER_NAME'];
		$url .= $_SERVER['REQUEST_URI'];
		return dirname($url);		
	}
	public function submit_url(){
		return "index.php";
	}
	public function debug(){

	}
}

//Initialize Form
$installer = new Installer();

//Run
$installer->run();
?>
