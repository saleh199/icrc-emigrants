<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>برنامج تسجيل الوافدين</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-rtl.css');?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/signin.css');?>" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <?php echo $form_open;?>
        <div class="text-center">
          <img src="<?php echo base_url('assets/image/logo.png');?>" width="150px" width="150px">
          <h2>برنامج تسجيل الوافدين</h2><br>
        </div>
        <?php if(validation_errors()) { ?>
         <div class="alert alert-info"><?php echo validation_errors('<li>', '</li>'); ?></div>
        <?php } ?>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="اسم المستخدم"  required autofocus>
        <br>
        <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
        <button class="btn btn-lg btn-danger btn-block" type="submit">تسجيل الدخول</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>