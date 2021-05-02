<?php $this->load->view('header.php');    ?>


<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="#" class="nav-link">Contact</a>
            </li>
         </ul>

         <!-- SEARCH FORM -->
         <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
               <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
               <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                     <i class="fas fa-search"></i>
                  </button>
               </div>
            </div>
         </form>

         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                     <!-- Message Start -->
                     <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                           <h3 class="dropdown-item-title">
                              Brad Diesel
                              <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                           </h3>
                           <p class="text-sm">Call me whenever you can...</p>
                           <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                     </div>
                     <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <!-- Message Start -->
                     <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                           <h3 class="dropdown-item-title">
                              John Pierce
                              <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                           </h3>
                           <p class="text-sm">I got your message bro</p>
                           <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                     </div>
                     <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <!-- Message Start -->
                     <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                           <h3 class="dropdown-item-title">
                              Nora Silvester
                              <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                           </h3>
                           <p class="text-sm">The subject goes here</p>
                           <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                     </div>
                     <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
               </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <i class="fas fa-envelope mr-2"></i> 4 new messages
                     <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <i class="fas fa-users mr-2"></i> 8 friend requests
                     <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                     <i class="fas fa-file mr-2"></i> 3 new reports
                     <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                  <i class="fas fa-th-large"></i>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php $this->load->view('sidebar.php');    ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="btn btn-primary add_employees_form">Add Employee</a></li>
                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.container-fluid -->
         </div>

         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Employee History</h3>
               <div class="card-tools">
                  <!-- Buttons, labels, and many other things can be placed here! -->
                  <!-- Here is a label for example -->

               </div>
               <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table class="table employeeDatatable">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Hire Date</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($emp_data as $key => $employee) {   ?>
                        <tr>
                           <th scope="row"><?php echo $i; ?></th>
                           <td><?php echo $employee['first_name'] ?></td>
                           <td><?php echo $employee['last_name'] ?></td>
                           <td><?php echo $employee['gender'] ?></td>
                           <td><?php echo date("d/m/Y", strtotime($employee['birth_date']));  ?></td>
                           <td><?php echo date("d/m/Y", strtotime($employee['hire_date']));  ?></td>
                           <td><a href="javascript:void(0)"><i class="fa fa-edit" id="edit_employee" aria-hidden="true" data-id="<?php echo $employee['emp_no'] ?>"></i></a>|<a href="javascript:void(0)"><i class="fa fa-trash" id="delete_employee" aria-hidden="true" data-id="<?php echo $employee['emp_no'] ?>"></i></a></td>
                        </tr>
                        <?php $i++; ?>
                     <?php } ?>

                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer -->
         </div>
         <!-- /.card -->
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <!-- Small boxes (Stat box) -->

               <!-- /.row -->
               <!-- Main row -->
               <div class="row">

                  <!-- /.Left col -->
                  <!-- right col (We are only adding the ID to make the widgets sortable)-->
                  <section class="col-lg-5 connectedSortable">
                     <!-- Map card -->
                     <div class="bs-example">
                        <!-- Button HTML (to Trigger Modal) -->

                        <!-- Modal HTML -->
                        <div id="myModal" class="modal fade" tabindex="-1">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title">Modal Title</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                    <div id="modaldata"> </div>

                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>



                     <div id="myModalEditEmployee" class="modal fade" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Modal Title</h5>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <div id="modaldataEditEmployee"> </div>

                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               <!-- /.card -->
         </section>
         <!-- right col -->
      </div>
      <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

</body>

</html>
<?php $this->load->view('footer.php');    ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
      $('.employeeDatatable').DataTable({});
      $(".btn").click(function() {
         $("#myModal").modal('show');
      });
      $('.add_employees_form').click(function() {
         $.ajax({
            type: 'GET',
            url: '<?php echo base_url('index.php/Welcome/get_employee_form') ?>',
            success: function(resp) {
               console.log(resp)
               $('#modaldata').html(resp);
               $('#myModal').modal('show');
            }
         })
      })
      $('body').on('click', '#edit_employee', function() {
         data = $(this).attr('data-id')
         $.ajax({
            type: 'POST',
            url: '<?php echo base_url('index.php/Welcome/edit_employee_form') ?>',
            data: {
               id: data
            },
            success: function(resp) {
               console.log(resp)
               $('#modaldataEditEmployee').html(resp);
               $('#myModalEditEmployee').modal('show');
            }
         })
      })

      $('body').on('click', '#delete_employee', function() {
         var confirmbox = confirm("Are You sure You want To Delete This Employee")
         if (confirmbox) {
            data = $(this).attr('data-id')
            $.ajax({
               type: 'POST',
               url: '<?php echo base_url('index.php/Welcome/delete_employee') ?>',
               data: {
                  id: data
               },
               success: function(resp) {
                  // console.log(resp)
                  location.reload();
               }
            })
         }



      })
   })
</script>