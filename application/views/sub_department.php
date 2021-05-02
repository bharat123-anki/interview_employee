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
                     <h1 class="m-0 text-dark">Sub Department</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="btn btn-primary add_sub_department_form">Add Sub Departments</a></li>
                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.container-fluid -->
         </div>

         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Sub Department Listing</h3>
               <div class="card-tools">
                  <!-- Buttons, labels, and many other things can be placed here! -->
                  <!-- Here is a label for example -->

               </div>
               <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

               <div id="sub_department_data"></div>
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

               <div id="addSubdepartmentModal" class="modal fade" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title"> Sub Department Title</h5>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                           <div id="modalData"></div>
                        </div>
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
      getAllSubDepartment()
      $('.add_sub_department_form').click(function() {
         $.ajax({
            type: 'GET',
            url: '<?php echo base_url('index.php/SubDepartment/getSubDepartmentModal') ?>',
            success: function(resp) {
               $('#addSubdepartmentModal').find('#modalData').html(resp)
               $('#addSubdepartmentModal').modal('show')
            }
         })
      })
      $('body').on('submit', '#sub_dept_form', function(e) {
         e.preventDefault();
         var formName = '#sub_dept_form';
         $(formName).find('.main_notify').html("");
         $(formName).find(':input').each(function(i, ind) {
            $(this).removeClass('redBorder');
            $(this).closest('div').find('.appErr').remove();
         })
         $.ajax({
            type: 'POST',
            url: '<?php echo base_url('index.php/SubDepartment/addSubDepartment') ?>',
            data: $('#sub_dept_form').serialize(),
            success: function(resp) {
               // console.log(resp)

               var obj = JSON.parse(resp)
               if (obj.status == 200) {
                  $('.sucess_message').html(obj.msg)
                  $(formName)[0].reset();
                  setTimeout(function() {
                     $('#addSubdepartmentModal').modal('hide');
                  }, 2000)
                  getAllSubDepartment()
               } else if (obj.status == 201) {
                  $(formName).find(':input[name=' + obj.field + ']').addClass('redBorder');
                  $(formName).find(":input[name='" + obj.field + "']").last().after("<span class='appErr'>" + obj.msg + "</span>");
                  $(formName).find(":input[name='" + obj.field + "']").focus();

               } else if (obj.status == 203) {
                  $('.main_notify').css({
                     'color': 'red'
                  })
                  $('.main_notify').html(obj.msg)
               } else {
                  alert(obj.msg)
               }
            }
         })

      })
   })
   $('body').on('click', '.sub_department_edit', function() {
      var id = $(this).closest('td').attr('data-id');
      $.ajax({
         type: 'POST',
         url: '<?php echo base_url('index.php/SubDepartment/getSubDepartmentModal') ?>',
         data: {
            id: id
         },
         success: function(resp) {
            $('#addSubdepartmentModal').find('#modalData').html(resp)
            $('#addSubdepartmentModal').modal('show')
         }
      })
   })
   $('body').on('click', '.sub_department_delete', function() {
      var id = $(this).closest('td').attr('data-id');
      var conf = confirm("Are You Sure You Want To Delete This Department")
      if (conf) {

         $.ajax({
            type: 'POST',
            url: '<?php echo base_url('index.php/SubDepartment/deleteSubDepatmentData') ?>',
            data: {
               id: id
            },
            success: function(resp) {
               var obj = JSON.parse(resp)
               alert(obj.msg);
               getAllSubDepartment();
            }
         })
      }
   })



   function getAllSubDepartment() {
      $.ajax({
         type: 'GET',
         url: '<?php echo base_url('index.php/SubDepartment/getAllSubDepartment') ?>',
         success: function(resp) {
            $('#sub_department_data').html(resp)

         }
      })
   }
</script>