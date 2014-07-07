<?php $this->view('layouts/header'); ?>
<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="sub-header"><?php echo $msg; ?></h3>
        </div>
<?php $this->view('layouts/footer');?>
