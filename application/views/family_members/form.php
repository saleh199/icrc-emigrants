          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">إضافة شخص</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <?php echo $familymembersAction; ?>
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
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>-->
            <button type="button" class="btn btn-primary" id="familymembersFormBtn">حفظ</button>
          </div>