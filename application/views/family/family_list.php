<?php $this->view('layouts/header'); ?>

<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-md-11 col-md-offset-1 main">

          <h3 class="sub-header">الوافدين <a href="#" class="btn btn-sm btn-success" role="button" data-toggle="modal" data-target="#familyQueryModal">إضافة استمارة</a></h3>
          <p></p>
          <div class="row">
          <?php echo $search_form;?>
          
            <div class="col-md-12" style="margin-bottom: 20px;">
              <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-4">
                  <label class="col-md-5">رقم الاستمارة</label>
                  <?php echo $form_id;?>
                </div>
                <div class="col-md-4">
                  <label class="col-md-5">رب الأسرة</label>
                  <?php echo $form_fathername;?>
                </div>
                <div class="col-md-4">
                  <label class="col-md-5">ربة الأسرة</label>
                  <?php echo $form_mothername;?>
                </div>
              </div>
              <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-4">
                  <label class="col-md-5">رقم الوثيقة</label>
                  <?php echo $form_documentno;?>
                </div>
                <div class="col-md-4">
                  <label class="col-md-5">رقم الهاتف</label>
                  <div class="input-group">
                    <?php echo $form_phone;?>
                    <span class="input-group-addon">016</span>
                  </div>
                </div>
              
                <div class="col-md-4">
                  <label class="col-md-5">رقم الموبايل</label>
                  <div class="input-group ">
                    <?php echo $form_mobile;?>
                    <span class="input-group-addon">09</span>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-4">
                  <label class="col-md-5">الرقم الوطني</label>
                  <?php echo $form_nationalnumber;?>
                </div>

                <div class="col-md-4">
                  <button type="submit" class="btn btn-info">بحث</button>
                </div>
              </div>
            </div> 
          </form>
          </div>
          <table class="table table-striped" style="margin-top:20px;">
            <tr>
              <!-- <th style="width:100px">ID</th> -->
              <th style="width:100px">رقم الاستمارة</th>
              <th>رب الأسرة</th>
              <th>ربة الأسرة</th>
              <th style="width:60px">الأفراد</th>
              <th style="width:130px">رقم الوئيقة</th>
              <th style="width:130px">الهاتف</th>
              <th style="width:120px">الاستحقاق</th>
              <th style="width:120px">تاريخ التسجيل</th>
              <!-- <th></th> -->
            </tr>
            <?php foreach($results as $family_form) { ?>
            <tr>
              <!-- <td class="text-center"><?php echo $family_form->form_details_id; ?></td> -->
              <td class="text-center"><a href="<?php echo $family_form->family_details_href;?>"><?php echo $family_form->tmp_ref; ?></a></td>
              <td><?php echo $family_form->father_name; ?></td>
              <td><?php echo $family_form->mother_name; ?></td>
              <td class="text-center"><?php echo count($family_form->family_members); ?></td>
              <td><?php echo $family_form->document_no; ?></td>
              <td><?php echo $family_form->phone . ', 09' . $family_form->mobile_1; ?></td>
              <td><?php echo $family_form->wfp_worth; ?></td>
              <td><?php echo $family_form->registered_date_full; ?></td>
              <!-- <td>
                <a class="btn btn-success btn-xs" href="<?php echo site_url('assessment').'?family_details_id='.$family_form->form_details_id;?>">تقييم</a>
              </td> -->
            </tr>
            <?php } ?>
          </table>
          <!-- <div>
            <ul class="pagination">
              <li class="disabled"><a href="#">&laquo;</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div>
          -->
        </div>
      </div>
    </div>
    <div class="modal fade" id="familyQueryModal" role="dialog" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">إضافة استمارة</h4>
          </div>
          <div class="modal-body">
            <form id="familyQueryfrm" role="form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group"><?php echo $add_family_status_dropdown;?></div>
                  <!-- <div class="form-group"><?php echo $add_nmbr_registration;?></div> -->
                  <div class="form-group"><?php echo $add_document_type_dropdown;?></div>
                  <div class="form-group col-md-4 hidden" id="document_letter_container"><?php echo $add_document_letter;?></div>
                  <div class="form-group" id="document_no_container"><?php echo $add_document_no;?></div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            <button type="button" id="familyQuerybtn" class="btn btn-primary">حفظ</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $this->view('layouts/footer');?>
