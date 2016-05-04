		  <?php $name = $personal_info[0]->FName.' '.$personal_info[0]->LName; ?>
		  <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">ATLANT</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo base_url('assets/img/user-uploads/'.$dp[0]->DisplayPic.''); ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" />
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url('assets/img/user-uploads/'.$dp[0]->DisplayPic.''); ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" />
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $name; ?></div>
                                <div class="profile-data-title"><?php echo $this->session->userdata('role');?></div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
						<li <?php if($selected=='dashboard'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('admin'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
						</li>       
						<li <?php if($selected=='profile'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('admin/view/profile'); ?>"><span class="fa fa-user"></span> <span class="xn-text">Profile</span></a>                        
						</li> 			
						<li <?php if($selected=='settings'){ echo 'class="active"';} ?>>
							<a href="<?php echo base_url('admin/view/settings'); ?>"><span class="fa fa-cog"></span> <span class="xn-text">Settings</span></a>                        
						</li> 							
						<li>
							<a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> <span class="xn-text">Sign-out</span></a>                        
						</li> 	
                  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->