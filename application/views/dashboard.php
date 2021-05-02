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
                     <h1 class="m-0 text-dark">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">

                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.container-fluid -->
         </div>


         <!-- /.card -->
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">

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