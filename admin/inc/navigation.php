</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary bg-navy elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-primary text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="width: 1.7rem;height: 1.7rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    
                    
                     
                      <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=clients" class="nav-link nav-clients">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                        Client Details
                        </p>
                      </a>
                    </li>
                    
                    <?php if($_settings->userdata('type') ==  1): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link  " href="#"><i class="nav-icon fas fa-receipt"></i><p>Purchase Orders Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">


			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders" href="<?php echo base_url ?>admin/?page=purchase_orders"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>FC Purchase Orders Details </p></a></li>

			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_tnm" href="<?php echo base_url ?>admin/?page=purchase_orders_tnm"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>TNM Purchase Orders Details  </p></a></li>

                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_mixed" href="<?php echo base_url ?>admin/?page=purchase_orders_mixed"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>Mixed Purchase Orders Details  </p></a></li>

                            <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_poc" href="<?php echo base_url ?>admin/?page=purchase_orders_poc"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>POC Purchase Orders Details  </p></a></li> -->


		                      </ul>
	                      </li>
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') ==  2): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-receipt"></i><p>Purchase Orders Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders" href="<?php echo base_url ?>admin/?page=purchase_orders"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>FC Purchase Orders Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_tnm" href="<?php echo base_url ?>admin/?page=purchase_orders_tnm"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>TNM Purchase Orders Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_mixed" href="<?php echo base_url ?>admin/?page=purchase_orders_mixed"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>Mixed Purchase Orders Details  </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_poc" href="<?php echo base_url ?>admin/?page=purchase_orders_poc"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>POC Purchase Orders Details  </p></a></li> -->

		                      </ul>
	                      </li>
                        <?php endif; ?>
                    
                        <?php if($_settings->userdata('type') ==  3): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-receipt"></i><p>Purchase Orders Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders" href="<?php echo base_url ?>admin/?page=purchase_orders"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>FC Purchase Orders Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_tnm" href="<?php echo base_url ?>admin/?page=purchase_orders_tnm"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>TNM Purchase Orders Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_mixed" href="<?php echo base_url ?>admin/?page=purchase_orders_mixed"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>Mixed Purchase Orders Details  </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_poc" href="<?php echo base_url ?>admin/?page=purchase_orders_poc"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>POC Purchase Orders Details  </p></a></li> -->

		                      </ul>
	                      </li>
                        <?php endif; ?>
                    
                        <?php if($_settings->userdata('type') ==  4): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link" href="#"><i class="nav-icon fas fa-receipt"></i><p>Purchase Orders Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders" href="<?php echo base_url ?>admin/?page=purchase_orders"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>FC Purchase Orders Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_tnm" href="<?php echo base_url ?>admin/?page=purchase_orders_tnm"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>TNM Purchase Orders Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_mixed" href="<?php echo base_url ?>admin/?page=purchase_orders_mixed"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>Mixed Purchase Orders Details  </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_poc" href="<?php echo base_url ?>admin/?page=purchase_orders_poc"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>POC Purchase Orders Details  </p></a></li> -->

		                      </ul>
	                      </li>
                        <?php endif; ?>
                    
                        <?php if($_settings->userdata('type') ==  5): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-receipt"></i><p>Purchase Orders Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders" href="<?php echo base_url ?>admin/?page=purchase_orders"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>FC Purchase Orders Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_tnm" href="<?php echo base_url ?>admin/?page=purchase_orders_tnm"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>TNM Purchase Orders Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_mixed" href="<?php echo base_url ?>admin/?page=purchase_orders_mixed"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>Mixed Purchase Orders Details  </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-purchase_orders_poc" href="<?php echo base_url ?>admin/?page=purchase_orders_poc"><i class="nav-icon fas fa-file-invoice-dollar ml-3"></i><p>POC Purchase Orders Details  </p></a></li> -->

		                      </ul>
	                      </li>
                        <?php endif; ?>
                    
                        <?php if($_settings->userdata('type') ==  1): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-project-diagram"></i><p>Project Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects" href="<?php echo base_url ?>admin/?page=projects"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>FC Project Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects_tnm" href="<?php echo base_url ?>admin/?page=projects_tnm"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>TNM Project Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-projects_mixed" href="<?php echo base_url ?>admin/?page=projects_mixed"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>Mixed Project Details </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-projects_poc" href="<?php echo base_url ?>admin/?page=projects_poc"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>POC Project Details </p></a></li> -->
		                      </ul>
	                      </li>
                    
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') ==  2): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-project-diagram"></i><p>Project Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects" href="<?php echo base_url ?>admin/?page=projects"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>FC Project Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects_tnm" href="<?php echo base_url ?>admin/?page=projects_tnm"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>TNM Project Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-projects_mixed" href="<?php echo base_url ?>admin/?page=projects_mixed"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>Mixed Project Details </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-projects_poc" href="<?php echo base_url ?>admin/?page=projects_poc"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>POC Project Details </p></a></li> -->
		                      </ul>
	                      </li>
                    
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') ==  3): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-project-diagram"></i><p>Project Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects" href="<?php echo base_url ?>admin/?page=projects"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>FC Project Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects_tnm" href="<?php echo base_url ?>admin/?page=projects_tnm"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>TNM Project Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-projects_mixed" href="<?php echo base_url ?>admin/?page=projects_mixed"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>Mixed Project Details </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-projects_poc" href="<?php echo base_url ?>admin/?page=projects_poc"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>POC Project Details </p></a></li> -->
		                      </ul>
	                      </li>
                    
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') ==  7): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-project-diagram"></i><p>Project Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects" href="<?php echo base_url ?>admin/?page=projects"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>FC Project Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects_tnm" href="<?php echo base_url ?>admin/?page=projects_tnm"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>TNM Project Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-projects_mixed" href="<?php echo base_url ?>admin/?page=projects_mixed"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>Mixed Project Details </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-projects_poc" href="<?php echo base_url ?>admin/?page=projects_poc"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>POC Project Details </p></a></li> -->
		                      </ul>
	                      </li>
                    
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') ==  8): ?>
	                      <li class="nav-item has-submenu ">
                        <a class="nav-link " href="#"><i class="nav-icon fas fa-project-diagram"></i><p>Project Details <i class='fas fa-angle-down'></i></p> </a>
                          <ul class=" submenu collapse nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects" href="<?php echo base_url ?>admin/?page=projects"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>FC Project Details </p></a></li>
			                      <li class="nav-item has-submenu "><a class="nav-link nav-projects_tnm" href="<?php echo base_url ?>admin/?page=projects_tnm"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>TNM Project Details </p></a></li>
                            <!-- <li class="nav-item has-submenu "><a class="nav-link nav-projects_mixed" href="<?php echo base_url ?>admin/?page=projects_mixed"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>Mixed Project Details </p></a></li>
                            <li class="nav-item has-submenu "><a class="nav-link nav-projects_poc" href="<?php echo base_url ?>admin/?page=projects_poc"><i class="nav-icon fas fa-file-invoice ml-3"></i><p>POC Project Details </p></a></li> -->
		                      </ul>
	                      </li>
                    
                        <?php endif; ?>

                    

                    <?php if($_settings->userdata('type') ==  1): ?>
                    <li class="nav-header">Maintenance</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                          User List
                        </p>
                      </a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=employee_details" class="nav-link nav-employee_details">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                          Employee Details
                        </p>
                      </a>
                    </li> -->
                    <!-- <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=historical_info" class="nav-link nav-historical_info">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                          Historical
                       </p>
                      </a>
                    </li> -->
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        
                     
                        <p>
                          Settings
                        </p>
                      </a>
                    </li>
                   
                    <?php endif; ?>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>

        //dropdown script demo start

        //dropdown script demo end


    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.split('/');
      page = page[0];
      if(s!='')
        page = page+'_'+s;

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
     
    })






    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
// DOMContentLoaded  end


  </script>