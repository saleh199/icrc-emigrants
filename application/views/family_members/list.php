              <table class="table table-hover" id="familyMemeberstbl">
                <tr>
                  <th></th>
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
                <?php foreach($results as $item) { ?>
                <tr>
                  <td><a id="familymembersDelBtn" type="button" class="btn btn-link btn-sm" data-familyid="<?php echo $item->form_family_id; ?>"><span class="glyphicon glyphicon-remove-circle"></span></a></td>
                  <td><?php echo $item->form_family_id; ?></td>
                  <td><?php echo $item->fullname; ?></td>
                  <td><?php echo $item->mothername; ?></td>
                  <td><?php echo $item->national_number; ?></td>
                  <td><?php echo $item->birthdate; ?></td>
                  <td><?php echo $item->gender_text; ?></td>
                  <td><?php echo $item->level_in_family_text; ?></td>
                  <td><?php echo $item->situation_in_family_text; ?></td>
                  <td><?php echo $item->with_family_text; ?></td>
                  <td><?php echo $item->study_status_text; ?></td>
                  <td><?php echo $item->health_status_text; ?></td>
                  <td>
                    <button id="familymembersEditBtn" type="button" class="btn btn-link" data-familyid="<?php echo $item->form_family_id; ?>">تفاصيل</button>
                  </td>
                </tr>
                <?php } ?>
              </table>