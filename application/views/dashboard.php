<?php $this->view('layouts/header'); ?>

<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h3 class="sub-header">الوافدين</h3>
          <p><a href="#" class="btn btn-sm btn-success" role="button">إضافة استمارة</a></p>
          <table class="table table-striped">
            <tr>
              <th style="width:100px">ID</th>
              <th>رب الأسرة</th>
              <th>ربة الأسرة</th>
              <th style="width:60px">الأفراد</th>
              <th>نوع الوثيقة</th>
              <th style="width:130px">رقم الوئيقة</th>
              <th style="width:130px">الهاتف</th>
              <th style="width:120px">تاريخ التسجيل</th>
              <th></th>
            </tr>
            <tr>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td>
                <select class="form-control">
                  <option>دفتر عائلة حديث</option>
                  <option>دفتر عائلة قديم</option>
                  <option>إخراج قيد عائلي</option>
                </select>
              </td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td><input type="text" class="form-control"></td>
              <td class="text-center" id="clear-search">
                <button type="button" class="btn btn-sm btn-link">
                  <span class="text-danger glyphicon glyphicon-remove-circle"></span>
                </button>
              </td>
            </tr>
            <tr>
              <td class="text-center">1234</td>
              <td>فوزي العماطوري</td>
              <td>فيزة القاسم</td>
              <td class="text-center">4</td>
              <td>دفتر عائلة</td>
              <td>8654323</td>
              <td>0933067744</td>
              <td>24-5-2013</td>
              <td><button type="button" class="btn btn-info btn-xs">التفاصيل</button></td>
            </tr>
            <tr>
              <td class="text-center">1234</td>
              <td>فوزي العماطوري</td>
              <td>فيزة القاسم</td>
              <td class="text-center">4</td>
              <td>دفتر عائلة</td>
              <td>8654323</td>
              <td>0933067744</td>
              <td>24-5-2013</td>
              <td><button type="button" class="btn btn-info btn-xs">التفاصيل</button></td>
            </tr>
            <tr>
              <td class="text-center">1234</td>
              <td>فوزي العماطوري</td>
              <td>فيزة القاسم</td>
              <td class="text-center">4</td>
              <td>دفتر عائلة</td>
              <td>8654323</td>
              <td>0933067744</td>
              <td>24-5-2013</td>
              <td><button type="button" class="btn btn-info btn-xs">التفاصيل</button></td>
            </tr>
            <tr>
              <td class="text-center">1234</td>
              <td>فوزي العماطوري</td>
              <td>فيزة القاسم</td>
              <td class="text-center">4</td>
              <td>دفتر عائلة</td>
              <td>8654323</td>
              <td>0933067744</td>
              <td>24-5-2013</td>
              <td><button type="button" class="btn btn-info btn-xs">التفاصيل</button></td>
            </tr>
            <tr>
              <td class="text-center">1234</td>
              <td>فوزي العماطوري</td>
              <td>فيزة القاسم</td>
              <td class="text-center">4</td>
              <td>دفتر عائلة</td>
              <td>8654323</td>
              <td>0933067744</td>
              <td>24-5-2013</td>
              <td><button type="button" class="btn btn-info btn-xs">التفاصيل</button></td>
            </tr>
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
<?php $this->view('layouts/footer');?>
