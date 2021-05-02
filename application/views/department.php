<?php $this->load->view('header.php');    ?>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
<?php $this->load->view('navigation.php') ?>
 <?php $this->load->view('sidebar.php');    ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Department</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="btn btn-primary add_department_form">Add Departments</a></li>
                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.container-fluid -->
         </div>

         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Department Listing</h3>
               <div class="card-tools">
                  <!-- Buttons, labels, and many other things can be placed here! -->
                  <!-- Here is a label for example -->

               </div>
               <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
               <div id="department_data"></div>
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

               <div id="departmentAddModal" class="modal fade" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Department Title</h5>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                           <form action="" method="POST" id="dept_form">
                              <span class="dept_name" style="color:red"></span>
                              <span class="sucess_message" style="color:green"></span>
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Department Name</label>
                                 <input type="text" class="form-control" id="dept_name" aria-describedby="emailHelp" name="dept_name" placeholder="Enter department name">
                              </div>
                              <div class="form-group">

                                 <input type="submit" class="btn btn-primary"></input>
                              </div>
                           </form>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
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

<?php $this->load->view('footer.php');    ?>

<script type="text/javascript">
   $(document).ready(function() {
      getAllDepartment()
      $('.add_department_form').click(function() {
         $('#departmentAddModal').modal('show');
      })
      $('#dept_form').on('submit', function(e) {
         $('.dept_name').html("")
         e.preventDefault();
         // var data = ($('#dept_form').serialize());
         // var data = $('#dept_form').se1rialize();
         // console.log(data);
         var dept_name = $('#dept_name').val();
         if (dept_name == "") {
            $('.dept_name').html("Please Enter Department Name")
            $('#dept_name').focus();
         } else {
            $.ajax({
               type: 'POST',
               url: '<?php echo base_url('index.php/Department/addDepartment') ?>',
               data: {
                  department_name: dept_name
               },
               success: function(resp) {
                  // console.log(resp)
                  var obj = JSON.parse(resp)
                  if (obj.status == 200) {
                     $('.sucess_message').html(obj.msg)
                     setTimeout(function() {
                        $('#departmentAddModal').modal('hide');
                     }, 2000)
                     getAllDepartment()
                  }else if(obj.status == 201){
                      $('#departmentAddModal').find('.dept_name').html(obj.status)
                  }else{
                     alert(obj.status)
                  }
               }
            })
         }
      })
   })
   function getAllDepartment() {
        $.ajax({
               type: 'GET',
               url: '<?php echo base_url('index.php/Department/getAllDepartment') ?>',
               success: function(resp) {
               $('#department_data').html(resp)         
         
               }
            })
   }
</script>