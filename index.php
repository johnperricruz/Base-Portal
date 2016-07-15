<?php
/*
 *---------------------------------------------------------------
 * INTEGRATED INSTALLER
 *---------------------------------------------------------------
*/
class Installer{
	public function __construct(){
		if(isset($_POST['btnInstall'])){
			//rename("index.php","installed.php");
			//rename("index_temp.php","index.php");
			
			//Write to config.php
			$this->write("config");
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
													<label class="col-md-3 col-xs-5 control-label">Website Title</label>
													<div class="col-md-9 col-xs-7">
														<input  type="text"  name="txtSiteName" class="form-control" required />
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Database name</label>
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
														<input type="password"  name="txtPassword" class="form-control">
													</div>
												</div>      
												<div class="form-group" style="border-bottom: 1px dashed #D5D5D5;">
													<label class="col-md-3 col-xs-5 control-label">Confirm Password</label>
													<div class="col-md-9 col-xs-7">
														<input type="password"  name="txtPassword" class="form-control">
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
													<label class="col-md-3 col-xs-5 control-label">Email Address</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="txtAdminEmail" class="form-control">
													</div>
												</div> 	
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Admin Password</label>
													<div class="col-md-9 col-xs-7">
														<input type="text" name="txtAdminPW" class="form-control">
													</div>
												</div> 		
												<div class="form-group">
													<label class="col-md-3 col-xs-5 control-label">Confirm Password</label>
													<div class="col-md-9 col-xs-7">
														<input type="text"  name="txtConfirmPW" class="form-control">
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
			</html>';
			echo $return;
	}
	public function write($file){
		if($file == "config"){
			$filename = getcwd() . "\application\config\config.php";
			$line_i_am_looking_for = 16;
			$lines = file( $filename , FILE_IGNORE_NEW_LINES );
			$lines[$line_i_am_looking_for] = "$"."config"."['base_url'] = '".$this->get_url()."/';";
			file_put_contents( $filename , implode( "\n", $lines ));
		}
		elseif($file == "database"){
		
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
