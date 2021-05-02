<?php $this->load->view('login_header.php');    ?>
<div class="card">
  <div class="card-body login-card-body">
    <span>
      <p style="text-align: right;"><a href="<?php echo base_url() ?>">Back</a></p>
    </span>
    <p class="login-box-msg">Sign in to start your session</p>
    <!-- <form action="<?php echo base_url() ?>index.php/Welcome/checkEmailPassword" method="post"> -->
      <p> Email: <?php echo $this->session->tempdata('user_email'); ?> </p>
    <form action="" id="passwordCheck" method="POST">
      <div style="text-align: left; color:red" class="main_notify"></div>
      <label>Password</label>
      <div class="input-group mb-3">

        <input type="password" name="password" class="form-control" placeholder="password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>

      <!-- /.col -->
      <div class="col-4">
        <input type="submit" class="btn btn-primary btn-block">
      </div>
      <!-- /.col -->
  </div>
  </form>

  <!-- /.login-card-body -->
</div>
</div>
<?php $this->load->view('login_footer.php');    ?>

<script type="text/javascript">
  $('body').on('submit', '#passwordCheck', function(e) {
    e.preventDefault();
    var formName = '#passwordCheck';
    $(formName).find('.main_notify').html("");

    var formdata = $(formName).serialize();
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url() ?>index.php/Welcome/checkEmailPassword',
      data: formdata,
      success: function(resp) {
        var obj = JSON.parse(resp)
        if (obj.status == 200) {
          $('.main_notify').html(obj.msg);
          setTimeout(function() {
            window.location.href = '<?php echo base_url('index.php/Dashboard/index') ?>';
          }, 1500);
        } else if (obj.status == 201) {
          $('.main_notify').html(obj.msg);
        } else if (obj.status == 404) {
          $('.main_notify').html(obj.msg);
          setTimeout(function() {
            window.location.href = '<?php echo base_url('index.php/') ?>';
          }, 1500);
        } else if (obj.status == 203) {
          $('.main_notify').html(obj.msg);
        } else {
          alert(obj.msg);
        }
      }
    })

  })
</script>