<?php get_header('Settings','admin admin-settings'); ?>
        <div class="page-container">
			<?php get_navbar('admin'); ?>			
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Settings'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                     
					<?php page_title("fa-cog","Settings"); ?>	
				<div class="grid">
					<div class="unit w-1-1">
						<form class="form-horizontal" action="<?php echo base_url('admin/edit/process/save-settings');?>" method="POST" >
							<?php 
								if($this->session->flashdata('settings')=='success'){ 
									echo'<div class="alert alert-success" role="alert">
											<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
											<strong>Success!</strong> Your changes has been saved.
										</div>';
								}else if($this->session->flashdata('settings')=='error'){
									echo'<div class="alert alert-danger" role="alert">
											<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
											<strong>Ooops!</strong> Your changes can\'t been saved.
										</div>';
								}
								?>								
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title-box">
										<h3>System Settings</h3>
										<span>Change the system configuration.</span>
									</div>
									<ul class="panel-controls" style="margin-top: 2px;">
										<li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>

										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
											<ul class="dropdown-menu">
												<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
												<li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
											</ul>                                        
										</li>                                        
									</ul>
								</div>
								<div class="panel-body form-group-separated">
									
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">System Date Format:</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $date_format[0]->Value; ?>" name="txtDate" class="form-control">
											</div>
										</div>
										
										 <div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">System Time Format:</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $time_format[0]->Value; ?>" name="txtTime" class="form-control">
											</div>	
										</div>
										
										 <div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Site Url</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $site_url[0]->Value; ?>" name="txtSiteUrl" class="form-control">
											</div>	
										</div>	
										
										 <div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">System Sender</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $system_sender[0]->Value; ?>" name="txtSystemSender" class="form-control">
											</div>	
										</div>	

										 <div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">System Mailer</label>
											<div class="col-md-9 col-xs-7">
												<input type="text" value="<?php echo $system_mailer[0]->Value; ?>" name="txtSystemMailer" class="form-control">
											</div>	
										</div>	
										
										 <div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Forgot Password Option:</label>
											<div class="col-md-9 col-xs-7">
												<label class="switch">
                                                    <input onclick="return changeSwitchValue(this.id)" id="chkForgot" name="chkForgot" type="checkbox" class="switch" value="<?php echo $forgot_password[0]->Value; ?>" <?php if($forgot_password[0]->Value == 1){ echo "checked";}?> >
                                                    <span></span>
                                                </label>
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
				</div>					
                </div>

                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>