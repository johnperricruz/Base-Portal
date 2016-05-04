        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Sign <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to Sign Out?</p>                    
                        <p>Press <b>No</b> if you want to continue work. Press <b>Yes</b> to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo base_url('logout/destroy'); ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX--> 
	   <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url('assets/audio/alert.mp3'); ?>" preload="auto"></audio>
        <audio id="audio-fail" src="assets/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap/bootstrap.min.js'); ?>"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/icheck/icheck.min.js'); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/scrolltotop/scrolltopcontrol.js'); ?>"></script>         
            
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap/bootstrap-datepicker.js'); ?>"></script>                
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/owl/owl.carousel.min.js'); ?>"></script>                 
       
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
       
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/js/actions.js'); ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/script.js'); ?>"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>



