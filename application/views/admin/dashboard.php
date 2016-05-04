<?php get_header('Dashboard','admin dashboard'); ?>
        <div class="page-container">
			<?php get_navbar('admin'); ?>			
			<!-- PAGE CONTENT -->
            <div class="page-content">        
                <!-- START X-NAVIGATION VERTICAL -->
				<?php get_topbar(); ?>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <!-- START BREADCRUMB -->
                <?php get_breadcrumbs('Dashboard'); ?>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    

                                     
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>