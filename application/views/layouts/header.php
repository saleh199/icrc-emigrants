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
    <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-rtl.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/main.css');?>" rel="stylesheet">
    <script type="text/javascript">
    var appConfig = {};
    appConfig.form_details_id = 0;
    
    appConfig.familyQueryURL = '<?php echo site_url("family/familyQuery");?>';
    appConfig.successQuery = '<?php echo site_url("family/insert");?>';
    appConfig.insertAddressURL = "<?php echo site_url('address/insert');?>";
    appConfig.addressModalURL = "<?php echo site_url('address/addressFrom');?>"
    appConfig.familyMembersModalURL = "<?php echo site_url('familymembers/familymembersFrom');?>"
    appConfig.familyMembersListURL = "<?php echo site_url('familymembers/family_list');?>";
    appConfig.addressesListURL = "<?php echo site_url('address/address_list');?>";
    appConfig.updateFormURL = "<?php echo site_url('family/update');?>";
    </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">سجل الوافدين</a>
        </div>
      </div>
    </div>