<?php $this->view('layouts/header'); ?>

<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h3 class="sub-header">تسجيل استمارة</h3>

          <ul class="nav nav-tabs">
            <li class="active"><a href="#mainDetails" data-toggle="tab">معلومات العائلة</a></li>
            <li><a href="#familyMembers" data-toggle="tab">أفراد الأسرة</a></li>
          </ul>
          <div class="tab-content">
          <!-- Main Details -->
          <div class="tab-pane fade active in" id="mainDetails">
          <div class="row">
          <div class="form-group col-md-12">
            <div class="col-md-6">
              <label class="control-label">وضع العائلة</label>
              <label class="radio-inline"><input type="radio" name="family_status" value="a"> نازحة </label>
              <label class="radio-inline"><input type="radio" name="family_status" value="b"> متضررة </label>
              <label class="radio-inline"><input type="radio" name="family_status" value="c"> فقيرة </label>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-4"><input type="text" class="form-control" name="nationality" placeholder="الجنسية"></div>
            <div class="col-md-4"><input type="text" class="form-control" name="nmbr_registration" placeholder="رقم و مكان القيد"></div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-4">
              <select class="form-control" name="document_type">
                <option value="a">نوع الوثيقة العائلية</option>
                <option value="b">دفتر عائلة حديث</option>
                <option value="c">دفتر عائلة قديم</option>
                <option value="d">إخراج قيد عائلي</option>
                <option value="e">لا يوجد حالياً</option>
              </select>
            </div>
            <div class="col-md-4"><input type="text" class="form-control" name="document_no" placeholder="رقم الوثيقة العائلية"></div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-8">
              <textarea class="form-control" name="notes" rows="4" placeholder="ملاحظات"></textarea>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-6">
              <input type="text" class="form-control" name="breadwinner_name" placeholder="اسم معيل الأسرة الثلاثي">
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="col-md-3">
              <div class="input-group">
                <input type="text" class="form-control" name="mobile_1" placeholder="الموبايل" dir="ltr">
                <span class="input-group-addon">09</span>
              </div>
              <br>
              <div class="input-group">
                <input type="text" class="form-control" name="mobile_2" placeholder="الموبايل" dir="ltr">
                <span class="input-group-addon">09</span>
              </div>…
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <input type="text" class="form-control" name="phone" placeholder="الهاتف" dir="ltr">
                <span class="input-group-addon">016</span>
              </div>
            </div>
          </div>
          </div>
          <div class="row">
            <h4>عناوين الإقامة <small><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addressModel">إضافة عنوان</button></small></h4>
            <div class="col-md-8">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>المحافطة</th>
                  <th>المدينة/القرية</th>
                  <th>العنوان التفصيلي</th>
                  <th></th>
                </tr>
                <tr class="success">
                  <th>2</th>
                  <td>السويداء</td>
                  <td>قنوات</td>
                  <td>بجانب دوار السبع على اليمين أول بناي الطابق الرابع</td>
                  <td><button type="button" class="btn btn-link">تعديل</button>  <button type="button" class="btn btn-link">عرض</button></td>
                </tr>
                <tr>
                  <th>1</th>
                  <td>السويداء</td>
                  <td>قنوات</td>
                  <td>بجانب دوار السبع على اليمين أول بناي الطابق الرابع</td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row">
            <h4>مكان الإقامة الأصلي</h4>
            <div class="col-md-12 form-group">
              <div class="col-md-3"><input type="text" class="form-control" placeholder="المحافظة"></div>
              <div class="col-md-3"><input type="text" class="form-control" placeholder="المنطقة"></div>
            </div>
            <div class="col-md-12 form-group">
              <div class="col-md-6"><textarea class="form-control" placeholder="تفاصيل" rows="3"></textarea></div>
            </div>
            <div class="col-md-12 form-group">
              <div class="col-md-3"><label class="control-label">تاريخ الانتقال</label><input type="date" class="form-control"></div>
            </div>
          </div>
          </div>
          <!-- Main Details -->

            <div class="tab-pane fade" id="familyMembers">
            <br>
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>الاسم الثلاثي</th>
                  <th>اسم الأم</th>
                  <th>الرقم الوطني</th>
                  <th>تاريخ الميلاد</th>
                  <th>الجنس</th>
                  <th>الصفة في العائلة</th>
                  <th>الوضع العائلي</th>
                  <th>العمل</th>
                  <th>الحالة الدراسية</th>
                  <th>الحالة الصحية</th>
                </tr>
                <tr>
                  <td>#</td>
                  <td>الاسم الثلاثي</td>
                  <td>اسم الأم</td>
                  <td>الرقم الوطني</td>
                  <td>تاريخ الميلاد</td>
                  <td>الجنس</td>
                  <td>الصفة في العائلة</td>
                  <td>الوضع العائلي</td>
                  <td>العمل</td>
                  <td>الحالة الدراسية</td>
                  <td>الحالة الصحية</td>
                </tr>
                <tr>
                  <td>#</td>
                  <td>الاسم الثلاثي</td>
                  <td>اسم الأم</td>
                  <td>الرقم الوطني</td>
                  <td>تاريخ الميلاد</td>
                  <td>الجنس</td>
                  <td>الصفة في العائلة</td>
                  <td>الوضع العائلي</td>
                  <td>العمل</td>
                  <td>الحالة الدراسية</td>
                  <td>الحالة الصحية</td>
                </tr>
                <tr>
                  <td>#</td>
                  <td>الاسم الثلاثي</td>
                  <td>اسم الأم</td>
                  <td>الرقم الوطني</td>
                  <td>تاريخ الميلاد</td>
                  <td>الجنس</td>
                  <td>الصفة في العائلة</td>
                  <td>الوضع العائلي</td>
                  <td>العمل</td>
                  <td>الحالة الدراسية</td>
                  <td>الحالة الصحية</td>
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
            <form role="form">
              <div class="row">
                <div class="col-md-6" style="border-left: 1px solid #ccc;">
                  <div class="form-group"><input type="text" class="form-control" placeholder="المحافظة"></div>
                  <div class="form-group"><input type="text" class="form-control" placeholder="المنطقة"></div>
                  <div class="form-group"><textarea class="form-control" rows="3" placeholder="العنوان التفصيلي"></textarea></div>
                  <div class="form-group">
                    <select class="form-control">
                      <option>توصيف السكن</option>
                      <option>ملك</option>
                      <option>إيجار</option>
                      <option>هبة</option>
                      <option>ملك عام</option>
                      <option>استضافة لدى عائلة نازحة</option>
                      <option>استضافة لدى عائلة مقيمة</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control">
                      <option>ثبوتيات السكن</option>
                      <option>عقد إيجار</option>
                      <option>سند ملكية</option>
                      <option>لا يوجد</option>
                      <option>سند إقامة</option>
                      <option>أخرى</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"><input type="text" class="form-control" placeholder="اسم المضيف"></div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="موبايل المضيف" dir="ltr">
                      <span class="input-group-addon">09</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="هاتف المضيف" dir="ltr">
                      <span class="input-group-addon">016</span>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            <button type="button" class="btn btn-primary">حفظ</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $this->view('layouts/footer');?>
