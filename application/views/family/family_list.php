<?php $this->view('layouts/header'); ?>

<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h3 class="sub-header">الوافدين <a href="#" class="btn btn-sm btn-success" role="button" data-toggle="modal" data-target="#familyQueryModal">إضافة استمارة</a></h3>
          <p></p>
          <?php echo $search_form;?>
            <div class="form-group col-md-12" style="margin-bottom: 20px;">
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
              <br><br>
              <div class="col-md-4">
                <label class="col-md-5">نوع الوثيقة</label>
                <?php echo $document_type_dropdown;?>
              </div>
              <div class="col-md-4">
                <label class="col-md-5">رقم الوثيقة</label>
                <?php echo $form_documentno;?>
              </div>
              <div class="col-md-4">
                <label class="col-md-5">رقم الهاتف</label>
                <?php echo $form_phone;?>
              </div>
              <br><br>
              <div class="col-md-4">
                <label class="col-md-5">الموبايل</label>
                <?php echo $form_mobile;?>
              </div>
              <div class="col-md-4">
                <label class="col-md-5">الرقم الوطني</label>
                <?php echo $form_nationalnumber;?>
              </div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-info">بحث</button>
              </div>
            </div> 
          </form>

          <table class="table table-striped" style="margin-top:20px;">
            <tr>
              <!-- <th style="width:100px">ID</th> -->
              <th style="width:100px">رقم الاستمارة</th>
              <th>رب الأسرة</th>
              <th>ربة الأسرة</th>
              <th style="width:60px">الأفراد</th>
              <th>نوع الوثيقة</th>
              <th style="width:130px">رقم الوئيقة</th>
              <th style="width:130px">الهاتف</th>
              <th style="width:120px">تاريخ التسجيل</th>
              <th></th>
            </tr>
            <?php foreach($results as $family_form) { ?>
            <tr>
              <!-- <td class="text-center"><?php echo $family_form->form_details_id; ?></td> -->
              <td class="text-center"><?php echo $family_form->tmp_ref; ?></td>
              <td><?php echo $family_form->father_name; ?></td>
              <td><?php echo $family_form->mother_name; ?></td>
              <td class="text-center"><?php echo count($family_form->family_members); ?></td>
              <td><?php echo $family_form->document_type_name; ?></td>
              <td><?php echo $family_form->document_no; ?></td>
              <td><?php echo $family_form->phone . ', ' . $family_form->mobile_1; ?></td>
              <td><?php echo $family_form->registered_date_full; ?></td>
              <td><button type="button" class="btn btn-info btn-xs">التفاصيل</button></td>
            </tr>
            <?php } ?>
          </table>
          <div>
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
        </div>
      </div>
    </div>
    <div class="modal fade" id="familyQueryModal" role="dialog" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">إضافة استمارة</h4>
          </div>
          <div class="modal-body">
            <form id="familyQueryfrm" role="form">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group"><?php echo $family_status_dropdown;?></div>
                  <div class="form-group"><?php echo $nmbr_registration;?></div>
                  <div class="form-group"><?php echo $document_type_dropdown;?></div>
                  <div class="form-group" id="document_no_container"><?php echo $document_no;?></div>
                </div>
                <div class="col-md-8" style="border-right: 1px solid #ccc;">
                  <div class="col-md-12" style="padding:0;">
                    <div><label class="control-label">اسم الأب</label></div>
                    <div class="form-group col-md-4"><?php echo $father_firstname;?></div>
                    <div class="form-group col-md-4"><?php echo $father_middlename;?></div>
                    <div class="form-group col-md-4"><?php echo $father_lastname;?></div>
                    <div class="form-group col-md-6" id="father_nationalnumber_container"><?php echo $father_nationalnumber;?></div>
                    <div class="form-group col-md-6"><?php echo $father_with_family_dropdown;?></div>
                    <div class="form-group col-md-6"><?php echo $father_situation_in_family_dropdown;?></div>
                    <?php echo $father_level_input;?>
                  </div>
                  <div class="col-md-12" style="padding:0;">
                    <div><label class="control-label">اسم الأم</label></div>
                    <div class="form-group col-md-4"><?php echo $mother_firstname;?></div>
                    <div class="form-group col-md-4"><?php echo $mother_middlename;?></div>
                    <div class="form-group col-md-4"><?php echo $mother_lastname;?></div>
                    <div class="form-group col-md-6" id="mother_nationalnumber_container"><?php echo $mother_nationalnumber;?></div>
                    <div class="form-group col-md-6"><?php echo $mother_with_family_dropdown;?></div>
                    <div class="form-group col-md-6"><?php echo $mother_situation_in_family_dropdown;?></div>
                    <?php echo $mother_level_input;?>
                  </div>
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
