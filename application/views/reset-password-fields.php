<?php get_header("Forgot Password","forgot-password"); ?>
<div class="forgot-container">            
            <div class="forgot-box animated fadeInDown">

                <div class="forgot-body">
                    <div class="forgot-title"><strong>New</strong> Password</div>
                    <div class="forgot-subtitle">Please provide your new password.</div><br/>
                    <form id="reset-password-form" action="<?php echo base_url('login/module/process/reset-password'); ?>" class="form-horizontal" method="POST">
					<div class="flash-message">
						<?php
							if($this->session->flashdata('ret')=='failed'){ 
								echo'<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<strong>Oh snap!</strong> The Password did not match! 
									</div>';
								}else if($this->session->flashdata('ret')=='success'){
									echo'<div class="alert alert-success" role="alert">
											<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
											<strong>Success!</strong> Your password has been reset. 
										</div>';							
								}
						?>   
					</div>
						<div class="form-group">
							<div class="col-md-12">
								<input type="password" class="form-control" placeholder="New Password" id="txtPassword" name="txtPassword" >
								<input type="hidden" name="hdKey" value="<?php echo $key; ?>">
							</div>
						</div>
					
						<div class="form-group">
							<div class="col-md-12">
								<input type="password" class="form-control" placeholder="Confirm New Password" id="txtConfirm" name="txtConfirm" >
							</div> 
						</div>                                             
						
						<div class="form-group push-up-30">
							<div class="col-md-6">
								<a href="<?php echo base_url('login');?>" class="btn btn-link btn-block">Already have account?</a>
							</div>
							<div class="col-md-6">
								<button  id="btnResetPasswordSubmit" type="button" class="btn btn-success btn-block"><i class="fa fa-rotate-right"></i> Reset Password</button>
							</div>
						</div>
					
                    </form>
                </div>
            </div>
            
        </div>
<?php get_footer(); ?>