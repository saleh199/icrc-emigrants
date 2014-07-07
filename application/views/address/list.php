      <table class="table table-hover" id="addressTable">
        <tr>
          <th>#</th>
          <th>المحافطة</th>
          <th>المدينة/القرية</th>
          <th>العنوان التفصيلي</th>
          <th></th>
        </tr>
        <?php foreach ($results as $item) { ?>
        <tr <?php echo ($item->current_address  == 1) ? 'class="success"' : '';?>>
          <td><?php echo $item->form_address_id; ?></td>
          <td><?php echo $item->city; ?></td>
          <td><?php echo $item->zone; ?></td>
          <td><?php echo $item->address; ?></td>
          <td><button id="addressEditBtn" type="button" class="btn btn-link" data-addressid="<?php echo $item->form_address_id; ?>">تعديل</button></td>
        </tr>
        <?php } ?>
      </table>