<?php $this->view('layouts/header'); ?>

<script type="text/javascript">
  <?php if(isset($form_details_id)){ ?>
    appConfig.form_details_id = <?php echo $form_details_id;?>;
  <?php } ?>
</script>
<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-md-11 col-md-offset-1 main">

          <h3 class="sub-header">تسجيل استمارة</h3>

          <ul class="nav nav-tabs">
            <li class="active"><a href="#mainDetails" data-toggle="tab">معلومات العائلة</a></li>
            <li><a href="#familyAddress" data-toggle="tab">عناوين الإقامة</a></li>
            <li><a href="#familyMembers" data-toggle="tab">أفراد الأسرة</a></li>
            <li><a href="#familyDist" data-toggle="tab">التوزيع</a></li>
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
            <div class="col-md-5">
              <label class="control-label col-md-12">رقم الوثيقة</label>
              <?php echo $document_letter;?>
              <?php echo $document_no;?>
            </div>
          </div>
          
          <div class="form-group col-md-7">
              <label class="control-label col-md-12">مكان الختم</label>
              <?php echo $stamppage;?>
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
            <!-- <div class="col-md-12 form-group">
              <div class="col-md-3"><label class="control-label">تاريخ الانتقال</label><?php //echo $jump_date;?></div>
            </div> -->

            
          </div>

          <div class="row">
            <h4>الاستحقاق</h4>
            <div class="col-md-12 form-group">
              <div class="col-md-6"><?php echo $wfp_worth;?></div>
            </div>
            <div class="col-md-12 form-group">
              <div class="col-md-6"><?php echo $worth_note;?></div>
            </div>
            <div class="col-md-12 form-group">
              <div class="col-md-6"><button type="button" id="formSubmitbtn" class="btn btn-success">حفظ</button></div>
            </div>
          </div>
          <?php echo form_close();?>
          </div>
          <!-- Main Details -->
            <div class="tab-pane fade" id="familyAddress">
            <br>
            <button id="addAddressBtn" type="button" class="btn btn-primary">إضافة عنوان</button>
            <br><br>
            <div class="col-md-8">
            <div id="addresseslist">
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
            <button id="addFamilyMemberBtn" type="button" class="btn btn-primary">إضافة شخص</button>
            <br><br>
              <div id="familymemberslist">
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
                  <th></th>
                </tr>
              </table>
              <div>
            </div>
          </div>


        </div>

        <div class="tab-pane fade in" id="familyDist">
          <div class="row">
            <br>
            <div class="col-md-12">
              <div class="form-group"><button class="btn btn-info" type="button" id="addMonthDist">إضافة توزيعة شهر تشرين الثاني 11-2014</button></div>
            </div>
            <div class="col-md-12">
              <?php echo $formDist;?>
                <div class="form-group">
                  <?php echo $dist_donors_dropdown;?>
                </div>
                <div class="form-group material_container">
                  <?php echo $dist_material_dropdown;?>
                </div>
                <div class="form-group">
                  <?php echo $dist_quantity; ?>
                </div>
                <div class="form-group">
                  <?php echo $dist_date_distribution;?>
                </div>
                <button class="btn btn-success" id="saveDistBtn"> حفظ </button>
              <?php form_close(); ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-10 distribution_list_container">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>#</th>
                  <th>المادة الموزعة</th>
                  <th>العدد</th>
                  <th>الجهة المانحة</th>
                  <th>التاريخ</th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog">
        <div class="modal-content">
          
          
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
          function refresh_list(){
        $.ajax({
          url : appConfig.distribution_list + '?form_details_id='+appConfig.form_details_id,
          dataType : 'JSON',
          success : function(data){
            $('.distribution_list_container').html(data.output);
          }
        });
      }
    $(function(){
      if(appConfig.form_details_id > 0){
        $("#familymemberslist").load(appConfig.familyMembersListURL + '?form_details_id=' + appConfig.form_details_id);
        $("#addresseslist").load(appConfig.addressesListURL + '?form_details_id=' + appConfig.form_details_id);
      }

      $('#familyfrm select[name="document_type"]').change(function(){
        $('#familyfrm input[name="document_letter"]').val(' ');
        if($(this).val() == 'b'){
          $('#familyfrm #document_letter_container').removeClass('hidden');
        }else{
          $('#familyfrm #document_letter_container').addClass('hidden');
        }
      });

      if($('#familyfrm select[name="document_type"]').val() == 'b'){
        $('#familyfrm #document_letter_container').removeClass('hidden');
      }

      $('#familyDist').find('select[name="donor_id"]').change(function(){
        donor_id = $(this).val();
        $select = $('#familyDist').find('select[name="material_id"]');
        $.ajax({
          url : appConfig.materials_list + '?donor_id='+donor_id,
          dataType : 'json',
          success : function(data){
            $select.html(' ');
            var html = '';
            $.each(data.materials, function(i, item){
              //console.log(i);
              html = html + '<option value="'+i+'">'+item+'</option>';
            });
            $select.append(html);
          }
        });
      });



      $("#distFrm").submit(function( event ){
        $.ajax({
          url : $("#distFrm").attr('action'),
          dataType : '',
          data : $("#distFrm").serialize() ,
          type : 'POST',
          success : function(data){
            if(data.result == 'success'){
              alert('تم إضافة السجل');
              //$("#distFrm").reset();
              refresh_list();
            }else{
              alert("الرجاء التأكد من المعلومات المدخلة");
            }
          }
        });
        event.preventDefault();
      });

      $('#addMonthDist').click(function(){
        $(this).attr('disabled', 'disabled');
        $.ajax({
          url : '<?php echo $dist_add_month_action;?>',
          dataType : '',
          data : 'form_details_id='+appConfig.form_details_id ,
          type : 'POST',
          success : function(data){
            if(data.result == 'success'){
              alert('تم إضافة السجل');
              //$("#distFrm").reset();
              refresh_list();
            }else{
              alert("الرجاء التأكد من المعلومات المدخلة");
              $(this).removeAttr('disabled');
            }
          }
        });
      });

      refresh_list();

    });
    </script>
<?php $this->view('layouts/footer');?>
