<?php $this->view('layouts/header'); ?>

<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-md-11 col-md-offset-1 main">
          <div class="row">
            <div class="col-md-6">
              <h3 class="sub-header">التسجيل</h3>
            </div>
            <div class="col-md-6">
              <h3 class="sub-header">التوزيع</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $this->view('layouts/footer');?>
