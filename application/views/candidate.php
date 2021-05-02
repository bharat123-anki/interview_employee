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
              <h1 class="m-0 text-dark">Candidate</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)" class="btn btn-primary add_candidate_form">Add Candidate</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Candidate Listings</h3>
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

          <div id="addCandidateModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"> Candidate Info</h5>
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
    getAllCandidateInfo()

    $('.add_candidate_form').click(function() {
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('index.php/CandidateInfo/getCandidateAddModal') ?>',
        success: function(resp) {
          $('#addCandidateModal').find('#modalData').html(resp)
          $('#addCandidateModal').modal('show')
        }
      })
    })


    $('body').on('change', '.candidate_dept_name', function() {
      var dept_id = $(this).val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url('index.php/CandidateInfo/getCandidateSubDeprtmentOnDeptChange') ?>',
        data: {
          dept_id: dept_id
        },
        success: function(resp) {
          $('#addCandidateModal').find('#modalData .candidate_formsub_dept_no').html(resp)
          $('#addCandidateModal').modal('show')
        }
      })
    })

    $('body').on('submit', '#candidate_add_form', function(e) {
      e.preventDefault();
      var formName = '#candidate_add_form';
      $(formName).find('.main_notify').html("");
      $(formName).find(':input').each(function(i, ind) {
        $(this).removeClass('redBorder');
        $(this).closest('div').find('.appErr').remove();
      })
      var formData = new FormData($(this)[0]);
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url('index.php/CandidateInfo/candidateAdd') ?>',
        data: formData,
        processData: false,
        contentType: false,
        success: function(resp) {
          var obj = JSON.parse(resp)
          if (obj.status == 200) {
            $('.main_notify').css({
              'color': 'green'
            })
            $('.main_notify').html(obj.msg)
            $(formName)[0].reset();
            setTimeout(function() {
              $('#addCandidateModal').modal('hide');
            }, 2000)
            getAllCandidateInfo()
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

  $('body').on('click', '.candidateEditdata', function() {
    var id = $(this).closest('td').attr('data-id');
    var formName = '#candidate_add_form';
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url('index.php/CandidateInfo/getCandidateAddModal') ?>',
      data: {
        id: id
      },
      success: function(resp) {
        $('#addCandidateModal').find('#modalData').html(resp)
        $('#addCandidateModal').modal('show')
      }
    })
  })
  $('body').on('click', '.candidateEditdata', function() {
    var id = $(this).closest('td').attr('data-id');
    var formName = '#candidate_add_form';
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url('index.php/CandidateInfo/getCandidateAddModal') ?>',
      data: {
        id: id
      },
      success: function(resp) {
        $('#addCandidateModal').find('#modalData').html(resp)
        $('#addCandidateModal').modal('show')
      }
    })
  })


  $('body').on('click', '.candidatedeletedata', function() {
    var id = $(this).closest('td').attr('data-id');
    var conf = confirm("Are You Sure You Want To Delete This Candidate")
    if (conf) {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url('index.php/CandidateInfo/deleteCandidateData') ?>',
        data: {
          id: id
        },
        success: function(resp) {
          var obj = JSON.parse(resp)
          alert(obj.msg);
          getAllCandidateInfo();
        }
      })
    }
  })

  function getAllCandidateInfo() {
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url('index.php/CandidateInfo/getAllCandidateInfo') ?>',
      success: function(resp) {
        $('#department_data').html(resp)

      }
    })
  }
</script>