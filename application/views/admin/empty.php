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
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
			
        </div>
<?php get_footer(); ?>