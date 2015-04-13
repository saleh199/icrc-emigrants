<?php $this->view('layouts/header'); ?>

<div class="container">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-md-11 col-md-offset-1 main">
          <p>
            اختر المنطقة ثم اضغط على زر تصدير :
          </p>
          <?php echo $export_form;?>
          <div class="row">
            <div class="col-md-4">
              <?php echo $zone_dropdown;?>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-info">تصدير</button>
            </div>
          </div>
          <?php form_close() ;?>
        </div>
      </div>
    </div>
<?php $this->view('layouts/footer');?>
