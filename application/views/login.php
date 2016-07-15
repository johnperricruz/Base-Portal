<?php get_header('Login','login'); ?>
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-body">
                    <div class="login-title"><strong>System</strong> Authentication</div>
                    <form action="<?php echo base_url('login/check_rules')?>" class="form-horizontal" method="post">
					<?php 
						if($this->session->flashdata('resp')=='error'){ 
						echo'<div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <strong>Oh snap!</strong> Change a few things up and try submitting again.
                            </div>';
						}
					?>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="txtUsername" class="form-control" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="txtPassword" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="login-button-container form-group">
						<?php if($forgot_password[0]->Value == 1){ ?>
							<div class="col-md-6">
								<a href="<?php echo base_url('login/module/view/forgot-password'); ?>" class="btn btn-link btn-block">Forgot your password?</a>
							</div>
						<?php } ?>
                        <div class="<?php if($forgot_password[0]->Value == 0){ echo "pull-right"; } ?> col-md-6">
                            <button class="btn btn-success btn-block"><i class="fa fa-lock"></i> Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?php echo date('Y'); ?> John Perri Cruz
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>