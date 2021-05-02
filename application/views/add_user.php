<?php $this->load->view('login_header.php');    ?>
<div class="card">
   <div class="card-body login-card-body">

      <p class="login-box-msg">User Entry Form</p>
      <form action="" id="userRegistration" method="POST">
         <div style="text-align: left; color:red" class="main_notify"></div>
         <label>Name</label>
         <div class="form-group ">
            <input type="text" name="name" class="form-control" placeholder="name">
         </div>
         <label>Email</label>
         <div class="form-group ">
            <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $this->session->tempdata('user_email'); ?>" readonly>
         </div>

         <label>Password</label>
         <div class="form-group">
            <input type="text" name="password" class="form-control" placeholder="password">
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
   $('body').on('submit', '#userRegistration', function(e) {
      e.preventDefault();
      var formName = '#userRegistration';
      $(formName).find('.main_notify').html("");
      $(formName).find(':input').each(function(i, ind) {
         $(this).removeClass('redBorder');
         $(this).closest('div').find('.appErr').remove();
      })

      var formdata = $(formName).serialize();
      $.ajax({
         type: 'POST',
         url: '<?php echo base_url() ?>index.php/User/add',
         data: formdata,
         success: function(resp) {
            // console.log(resp)

            var obj = JSON.parse(resp)
            if (obj.status == 200) {
               $('.main_notify').html(obj.msg)
               $(formName)[0].reset();
               setTimeout(function() {
                  window.location.href = '<?php echo base_url('index.php/') ?>';
               }, 1500);
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
</script>