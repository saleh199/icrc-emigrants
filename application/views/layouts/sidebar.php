<div class="col-md-1 sidebar">
  <div class="text-center">
    <img src="<?php echo base_url('assets/image/logo.png');?>" width="74px" width="74px"><br><br>
  </div>
  <ul class="nav nav-sidebar">
    <li class="<?php echo ($this->uri->uri_string()  !== 'family')? '' : 'active' ; ?>"><a href="<?php echo site_url('family');?>">الوافدين</a></li>
    <li class="<?php echo (strpos($this->uri->uri_string(), 'distributionList') === FALSE)? '' : 'active' ; ?>"><a href="<?php echo site_url('family/distributionList');?>">سجلات التوزيع</a></li>
    <li class="<?php echo (strpos($this->uri->uri_string(), 'membersList') === FALSE)? '' : 'active' ; ?>"><a href="<?php echo site_url('family/membersList');?>">أفراد العائلات</a></li>
    <?php if($this->ion_auth->is_admin()){ ?>
    <li class="<?php echo (strpos($this->uri->uri_string(), 'user/admin') === FALSE)? '' : 'active' ; ?>"><a href="<?php echo site_url('user/admin');?>">الإدارة</a></li>
    <?php } ?>
  </ul>
</div>
