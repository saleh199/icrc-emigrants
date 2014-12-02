<?php $this->view('layouts/header'); ?>

<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-md-11 col-md-offset-1 main">
          <div class="row">
            <h3 class="sub-header">الإدارة </h3>
          </div>
          <div class="row">
            <?php if($message){ ?>
            <div class="col-md-7">
              <div class="alert alert-warning"><?php echo $message; ?></div>
            </div>
            <?php } ?>
            <?php echo $form_action;?>
            <div class="col-md-6">
              <header class="clearfix">
                <h4>معلومات الحساب</h4>
              </header>
              <section class="clearfix">
                <div class="form-group">
                  <label>الاسم الاول</label>
                  <?php echo $input_first_name;?>
                </div>

                <div class="form-group">
                  <label>الكنية</label>
                  <?php echo $input_last_name;?>
                </div>

                <div class="form-group">
                  <label>البريد الإلكتروني</label>
                  <?php echo $input_email;?>
                </div>

                <div class="form-group">
                  <label>رقم الهاتف</label>
                  <?php echo $input_phone;?>
                </div>
              </section>
            </div>

            <div class="col-md-6">
              <header class="clearfix">
                <h4>كلمة المرور</h4>
              </header>
              <section class="clearfix">
                <div class="form-group">
                  <label>كلمة المرور</label>
                  <?php echo $input_password;?>
                </div>

                <div class="form-group">
                  <label>تأكيد كلمة المرور</label>
                  <?php echo $input_password_confirm;?>
                </div>

                <div class="form-group">
                  <label>الصلاحية</label>
                  <?php foreach($tmp_group as $group){ ?>
                  <label class="radio-inline">  <?php echo $group;?>  </label>
                  <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary">حفظ</button>
              </section>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
<?php $this->view('layouts/footer');?>
