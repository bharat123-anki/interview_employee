<?php $this->load->view('login_header.php');    ?>

<div class="card">
  <div class="card-body login-card-body">
    <p style="color: red"><?php echo $this->session->flashdata('email'); ?></p>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" id="emailSubmit" method="post">
      <div class="main_notify"></div>
      <label>Email</label>
      <div class="form-group ">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
          
        </div>
      </div>

      <!-- /.col -->
      <div class="col-4">
        <input type="submit" class="btn btn-primary btn-block"></input>
      </div>
      <!-- /.col -->
  </form>
  </div>

  <!-- /.login-card-body -->
</div>
</div>
<?php $this->load->view('login_footer.php');    ?>

<script type="text/javascript">
  $('body').on('submit', '#emailSubmit', function(e) {
    e.preventDefault();
    var id = $(this).closest('td').attr('data-id');
    var formName = '#emailSubmit';
    $(formName).find('.main_notify').html("");
      $(formName).find(':input').each(function(i, ind) {
        $(this).removeClass('redBorder');
        $(this).closest('div').find('.appErr').remove();
      })
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url('index.php/Welcome/checkEmailUser') ?>',
      data: $(formName).serialize(),
      success: function(resp) {
                  var obj = JSON.parse(resp)
          if (obj.status == 200) {
            $('.main_notify').css({
              'color': 'green'
            })
            $('.main_notify').html(obj.msg)
            $(formName)[0].reset();
            setTimeout(function() {
            window.location.href = '<?php echo base_url('index.php/Welcome/getPasswordPage') ?>';              
            }, 2000)
           } else if (obj.status == 201) {
            $(formName).find(':input[name=' + obj.field + ']').addClass('redBorder');
            $(formName).find(":input[name='" + obj.field + "']").last().after("<span class='appErr'>" + obj.msg + "</span>");
            $(formName).find(":input[name='" + obj.field + "']").focus();

          } else if (obj.status == 203 || obj.status == 202) {
            $('.main_notify').css({
              'color': 'red'
            })
            $('.main_notify').html(obj.msg)
          setTimeout(function() {
            window.location.href = '<?php echo base_url('index.php/User/index') ?>';
          }, 2500);
          } else {
            alert(obj.msg)
          }

      }
    })
  })
</script>