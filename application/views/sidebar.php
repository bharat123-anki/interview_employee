<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
         </div>
      </div>
      <?php
      $currentUrl = $this->uri->segment(1);
      $department_active = $sub_department_active =  $candidate_info = '';
      switch ($currentUrl) {
         case 'Department':
            $department_active = 'active';
            break;
         case 'SubDepartment':
            $sub_department_active = 'active';
            break;
         case 'CandidateInfo':
            $candidate_info = 'active';
            break;

         default:
            # code...
            break;
      }
      ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('index.php/Department') ?>" class="nav-link <?php echo $department_active; ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Department
                     <i class="right "></i>
                  </p>
               </a>
               <a href="<?php echo base_url('index.php/SubDepartment') ?>" class="nav-link <?php echo $sub_department_active; ?>">
                  <i class="nav-icon fas "></i>
                  <p>
                     Add Sub Department
                     <i class="right "></i>
                  </p>
               </a>
               <a href="<?php echo base_url('index.php/CandidateInfo') ?>" class="nav-link <?php echo $candidate_info; ?>">
                  <i class="nav-icon fas "></i>
                  <p>
                     Candidate Info
                     <i class="right "></i>
                  </p>
               </a>
               <a href="<?php echo base_url('index.php/Welcome/logout') ?>" class="nav-link ">
                  <i class="nav-icon fas "></i>
                  <p>
                     Logout
                     <i class="right "></i>
                  </p>
               </a>
            </li>

         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>