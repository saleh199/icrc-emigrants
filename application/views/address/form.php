          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">إدخال عنوان</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <?php echo $addressAction; ?>
                <div class="col-md-12" id="alertHolder"></div>
                <div class="col-md-6" style="border-left: 1px solid #ccc;">
                  <div class="form-group"><?php echo $address_city_dropdown;?></div>
                  <div class="form-group"><?php echo $address_zone_dropdown;?></div>
                  <div class="form-group"><?php echo $address;?></div>
                  <div class="form-group">
                    <?php echo $housing_desc_dropdown;?>
                  </div>
                  <div class="form-group">
                    <?php echo $proof_of_residence_dropdown;?>
                  </div>
                  <div class="form-group">
                    <label>عنوان السكن الحالي : </label>
                    <div class="radio">
                      <label>
                        <?php echo $current_address_yes; ?> نعم
                      </label>
                    </div>

                    <div class="radio">
                      <label>
                        <?php echo $current_address_no; ?> لا
                      </label>
                    </div>
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
              <?php echo form_close(); ?>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button> -->
            <button type="button" class="btn btn-primary" id="addressFromBtn">حفظ</button>
          </div>