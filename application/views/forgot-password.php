<?php get_header("Forgot Password","forgot-password"); ?>
<div class="forgot-container">            
            <div class="forgot-box animated fadeInDown">

                <div class="forgot-body">
                    <div class="forgot-title"><strong>Reset</strong> Password</div>
                    <div class="forgot-subtitle">Please provide Username and Email to reset your password.</div><br/>
                    <form action="<?php echo base_url('login/module/process/send-password'); ?>" class="form-horizontal" method="POST">
					<?php
						if($this->session->flashdata('ret')=='error'){ 
							echo'<div class="alert alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<strong>Oh snap!</strong> There was no records in our database that matches your Username and Email. 
								</div>';
							}else if($this->session->flashdata('ret')=='success'){
								echo'<div class="alert alert-success" role="alert">
										<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<strong>Success!</strong> Please check your Email. 
									</div>';							
							}
					?>                    
						<div class="form-group">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Username" name="txtUsername" >
							</div>
						</div>
					
						<div class="form-group">
							<div class="col-md-12">
								<input type="email" class="form-control" placeholder="Email Address" name="txtEmail" >
							</div>
						</div>                                             
						
						<div class="form-group push-up-30">
							<div class="col-md-6">
								<a href="<?php echo base_url('login');?>" class="btn btn-link btn-block">Already have account?</a>
							</div>
							<div class="col-md-6">
								<button class="btn btn-success btn-block"><i class="fa fa-rotate-right"></i> Send Reset Link</button>
							</div>
						</div>
					
                    </form>
                </div>
            </div>
            
        </div>
<?php get_footer(); ?>