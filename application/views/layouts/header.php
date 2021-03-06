<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>برنامج تسجيل الوافدين</title>

    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>" type="text/JavaScript" language="javascript"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <!-- <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet"> -->
    <link href="<?php echo base_url('assets/css/bootstrap-rtl.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/js/jquery-ui-1.11.2/jquery-ui.min.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/main.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet">
    <script type="text/javascript">
    var appConfig = {};
    appConfig.form_details_id = 0;
    
    appConfig.familyQueryURL = '<?php echo site_url("family/familyQuery");?>';
    appConfig.successQuery = '<?php echo site_url("family/insert");?>';
    appConfig.insertAddressURL = "<?php echo site_url('address/insert');?>";
    appConfig.addressModalURL = "<?php echo site_url('address/addressFrom');?>"
    appConfig.familyMembersModalURL = "<?php echo site_url('familymembers/familymembersFrom');?>"
    appConfig.familyMembersListURL = "<?php echo site_url('familymembers/family_list');?>";
    appConfig.deleteFamilyMembersURL = "<?php echo site_url('familymembers/delete');?>";
    appConfig.addressesListURL = "<?php echo site_url('address/address_list');?>";
    appConfig.updateFormURL = "<?php echo site_url('family/update');?>";
    appConfig.materials_list = "<?php echo site_url('distribution/materials_list');?>";
    appConfig.distribution_list = "<?php echo site_url('distribution/distribution_list');?>";
    </script>
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">سجل الوافدين</a>
        </div>
        <div class="collapse navbar-collapse">
            <a href="<?php echo site_url('common/logout');?>" class="btn btn-danger navbar-btn navbar-left btn-xs">تسجيل الخروج</a>
            <p class="navbar-text navbar-left">
                تم تسجيل الدخول <?php echo $this->ion_auth->user()->row()->first_name . " " . $this->ion_auth->user()->row()->last_name; ?> |
            </p>
        </div>
      </div>
    </div>