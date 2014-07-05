<?php $this->view('layouts/header'); ?>

<script type="text/javascript">
  appConfig.formAction = '<?php echo $formAction;?>';
</script>
<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h3 class="sub-header">تسجيل استمارة</h3>

          <ul class="nav nav-tabs">
            <li class="active"><a href="#mainDetails" data-toggle="tab">معلومات العائلة</a></li>
            <li><a href="#familyAddress" data-toggle="tab">عناوين الإقامة</a></li>
            <li><a href="#familyMembers" data-toggle="tab">أفراد الأسرة</a></li>
          </ul>
          <div class="tab-content">
          <!-- Main Details -->
          <div class="tab-pane fade active in" id="mainDetails">
          <?php echo $family_form;?>
          <div class="row">
          <div id="alertHolder" class="col-md-6" style="padding:10px 0;"></div>
          <div class="form-group col-md-12">
            <div class="col-md-4">
              <label class="control-label">رقم استمارة مؤقت</label>
              <?php echo $tmp_ref;?>
            </div>
            <div class="col-md-4">
              <label class="control-label">وضع العائلة</label>
              <?php echo $family_status_dropdown;?>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-4">
              <label class="control-label">نوع الوثيقة</label>
              <?php echo $document_type_dropdown;?>
            </div>
            <div class="col-md-4">
              <label class="control-label">رقم الوثيقة</label>
              <?php echo $document_no;?>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-4">
              <label class="control-label">الجنسية</label>
              <?php echo $nationality;?>
            </div>
            <div class="col-md-4">
              <label class="control-label">رقم و مكان القيد</label>
              <?php echo $nmbr_registration;?>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-8">
              <?php echo $notes;?>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-6">
              <label class="control-label">اسم معيل الأسرة</label>
              <?php echo $breadwinner_name;?>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-3">
              <div class="input-group">
                <?php echo $mobile_1;?>
                <span class="input-group-addon">09</span>
              </div>
              <br>
              <div class="input-group">
                <?php echo $mobile_2;?>
                <span class="input-group-addon">09</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <?php echo $phone;?>
                <span class="input-group-addon">016</span>
              </div>
            </div>
          </div>
          </div>

          <div class="row">
            <h4>مكان الإقامة الأصلي</h4>
            <div class="col-md-12 form-group">
              <div class="col-md-3">
                <?php echo $city_dropdown;?>
              </div>
              <div class="col-md-3"><?php echo $come_zone;?></div>
            </div>
            <div class="col-md-12 form-group">
              <div class="col-md-6"><?php echo $come_address;?></div>
            </div>
            <div class="col-md-12 form-group">
              <div class="col-md-3"><label class="control-label">تاريخ الانتقال</label><?php echo $jump_date;?></div>
            </div>

            <div class="col-md-12 form-group">
              <div class="col-md-6"><button type="button" id="formSubmitbtn" class="btn btn-success">حفظ</button></div>
            </div>
          </div>
          <?php echo form_close();?>
          </div>
          <!-- Main Details -->
            <div class="tab-pane fade" id="familyAddress">
              <div class="row">
            <h4>عناوين الإقامة <small><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addressModel">إضافة عنوان</button></small></h4>
            <div class="col-md-8">
              <table class="table table-hover" id="addressTable">
                <tr>
                  <th>#</th>
                  <th>المحافطة</th>
                  <th>المدينة/القرية</th>
                  <th>العنوان التفصيلي</th>
                  <th></th>
                </tr>
              </table>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="familyMembers">
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#familyModal">إضافة شخص</button>
            <br><br>
              <table class="table table-hover" id="familyMemeberstbl">
                <tr>
                  <th>#</th>
                  <th>الاسم الثلاثي</th>
                  <th>اسم الأم</th>
                  <th>الرقم الوطني</th>
                  <th>تاريخ الميلاد</th>
                  <th>الجنس</th>
                  <th>الصفة في العائلة</th>
                  <th>الوضع العائلي</th>
                  <th>التواجد</th>
                  <th>الحالة الدراسية</th>
                  <th>الحالة الصحية</th>
                </tr>
              </table>
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="modal fade" id="addressModel" role="dialog" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">إدخال عنوان</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <form action="<?php echo site_url('family/insertAddress');?>" method="post" id="addressfrm" role="form">
                <div class="col-md-12" id="alertHolder"></div>
                <div class="col-md-6" style="border-left: 1px solid #ccc;">
                  <div class="form-group"><?php echo $address_city_dropdown;?></div>
                  <div class="form-group"><?php echo $zone;?></div>
                  <div class="form-group"><?php echo $address;?></div>
                  <div class="form-group">
                    <?php echo $housing_desc_dropdown;?>
                  </div>
                  <div class="form-group">
                    <?php echo $proof_of_residence_dropdown;?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"><?php echo $host_name;?></div>
                  <div class="form-group">
                    <div class="input-group">
                      <?php echo $host_mobile;?>
                      <span class="input-group-addon">09</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <?php echo $host_phone;?>
                      <span class="input-group-addon">016</span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            <button type="button" class="btn btn-primary" id="insertAddressbtn">حفظ</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div class="modal fade" id="familyModal" role="dialog" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">إضافة شخص</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <form action="<?php echo site_url('family/insertFamily');?>" method="post" id="addressfrm" role="form">
                <div class="col-md-12" id="alertHolder"></div>
                <div class="col-md-6" style="border-left: 1px solid #ccc;">
                  <div class="form-group"><?php echo $firstname;?></div>
                  <div class="form-group"><?php echo $middlename;?></div>
                  <div class="form-group"><?php echo $lastname;?></div>
                  <div class="form-group"><?php echo $mothername;?></div>
                  <div class="form-group"><?php echo $national_number;?></div>
                  <div class="form-group"><?php echo $birthdate;?></div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"><?php echo $gender_dropdown;?></div>
                  <div class="form-group"><?php echo $level_in_family_dropdown;?></div>
                  <div class="form-group"><?php echo $situation_in_family_dropdown;?></div>
                  <div class="form-group"><?php echo $with_family_dropdown;?></div>
                  <div class="form-group"><?php echo $study_status_dropdown;?></div>
                  <div class="form-group"><?php echo $health_status_dropdown;?></div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            <button type="button" class="btn btn-primary" id="insertFamilybtn">حفظ</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $this->view('layouts/footer');?>
