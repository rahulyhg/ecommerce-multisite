<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=TITLE?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=BASE_URL?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo BASE_URL ?>assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=BASE_URL?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=BASE_URL?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="javascript:void(0);"><b>Admin </b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form name="adminlogin" action="<?=BASE_URL?>/admin" method="post">
          <div class="form-group has-feedback">
              <input type="text" name="username" class="form-control" placeholder="Username/Email-id" value="" required="required"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
<!--              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>-->
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->



    <!-- jQuery 2.1.4 -->
    <script src="<?=BASE_URL?>assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=BASE_URL?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=BASE_URL?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>




<?php $this->load->view('include/successmsg.php'); ?>
<script>
    <?php if($this->session->flashdata("sucess")!=''){ ?>
        $('#Sucessmsg').modal('show');
    <?php } ?>

     <?php if($this->session->flashdata("warning")!=''){ ?>
        $('#Warningmsg').modal('show');
    <?php } ?>
</script>


  </body>
</html>
