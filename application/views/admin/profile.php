<?php get_header('Profile','admin admin-profile'); ?>
        <div class="page-container">
			<?php get_navbar('admin'); ?>			
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Profile'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-user","Profile"); ?>	

					<div class=" grid">                        
                        <div class="unit w-1-3">
                            
                            <form action="<?php echo base_url('admin/edit/process/save-login'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
								<div class="panel panel-default">                                
									<div class="panel-body">
										<?php 
											if($this->session->flashdata('login')=='success'){ 
												echo'<div class="alert alert-success" role="alert">
														<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
														<strong>Success!</strong> Your changes has been saved.
													</div>';
											}else if($this->session->flashdata('login')=='error'){
												echo'<div class="alert alert-danger" role="alert">
														<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
														<strong>Ooops!</strong> Your changes can\'t been saved.
													</div>';
											}
										?>										
										<h3><?php echo $personal_info[0]->FName.' '.$personal_info[0]->LName; ?></h3>
										<p><?php echo $this->session->userdata('role'); ?></p>
										<div class="text-center" id="user_image">
											<img src="<?php echo base_url('assets/img/user-uploads/'.$dp[0]->DisplayPic.''); ?>" class="img-thumbnail">
										</div>                                    
									</div>
									<div class="panel-body form-group-separated">
										
										<div class="display-pic form-group">                                        
											<div class="col-md-12 ">
												<label>Change Photo:</label><input type="file" name="fileDP" id="fileDP"  />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">#ID</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $personal_info[0]->PersonalInfoID;?>" class="form-control" disabled="">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Username</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $personal_info[0]->Username;?>" name="txtUsername" id="txtUsername"  class="form-control">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Password</label>
											<div class="col-md-9 col-xs-7">
												<input type="password" value="<?php echo $personal_info[0]->Password;?>" name="txtPassword" class="form-control">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">E-mail</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $personal_info[0]->EmailAddress;?>" name="txtEmail" class="form-control">
											</div>
										</div>
										
										<div class="form-group">                                        
											<div class="col-md-12 col-xs-12 pull-right">
												<button class="btn btn-success">Save</button>
											</div>
										</div>
										
									</div>
								</div>
                            </form>
                            
                        </div>
                        <div class="unit w-1-3">
                            
                            <form action="<?php echo base_url('admin/edit/process/save-profile'); ?>" method="post" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
								<?php 
									if($this->session->flashdata('profile')=='success'){ 
										echo'<div class="alert alert-success" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<strong>Success!</strong> Your changes has been saved.
											</div>';
									}else if($this->session->flashdata('profile')=='error'){
										echo'<div class="alert alert-danger" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<strong>Ooops!</strong> Your changes can\'t been saved.
											</div>';
									}
								?>	
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>This information is confidential, and can only be accessed when logged in.</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">First Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $personal_info[0]->FName; ?>" name="txtFname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Middle Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $personal_info[0]->MName; ?>" name="txtMName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Last Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $personal_info[0]->LName; ?>" name="txtLName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Birthday</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="date" value="<?php echo $personal_info[0]->Birthday; ?>" name="txtBday" class="form-control">
                                        </div>
                                    </div>      
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Gender</label>
                                        <div class="col-md-9 col-xs-7">
											<label>Male:   </label> <input type="radio" name="rdGender" value="M" <?php if($personal_info[0]->Gender == "M"){ echo "checked"; } ?> />
											<label>Female: </label><input type="radio"  name="rdGender"value="F" <?php if($personal_info[0]->Gender == "F"){ echo "checked"; } ?>/ >
                                        </div>
                                    </div>   									
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-success  pull-right">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            

                        </div>
                        
                        <div class="unit w-1-3">
                            <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> Quick Info</h3>
                                    <p>Some quick info about this user</p>
                                </div>
                                <div class="panel-body form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Date Registered</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><input type="text" value="<?php echo system_date_format	($personal_info[0]->DateRegistered); ?>" name="txtDateRegistered" class="form-control" disabled></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">User Role</label>
                                        <div class="col-md-8 col-xs-7 line-height-30"><input type="text" value="<?php echo $personal_info[0]->Role; ?>" name="txtRole" class="form-control" disabled></div>
                                    </div>
                                </div>
                                
                            </div>
                       
                        
                    </div>
					
                    </div>					
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>