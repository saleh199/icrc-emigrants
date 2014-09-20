<?php $this->view('layouts/header'); ?>

<script type="text/javascript">
  <?php if(isset($form_details_id)){ ?>
    appConfig.form_details_id = <?php echo $form_details_id;?>;
  <?php } ?>
</script>

    <div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h3 class="sub-header">معلومات التقييم</h3>

          <ul class="nav nav-tabs">
            <?php foreach($category_data as $index => $tab) { ?>
            <li <?php if($index == 0) { echo 'class="active"'; } ?>><a href="#<?php echo $tab->code;?>" data-toggle="tab"><?php echo $tab->category_name;?></a></li>
            <?php } ?>
          </ul>
          <div class="tab-content">
            
            <?php foreach($category_data as $index => $tab) { ?>
            
            <!-- Start Tab : <?php echo $tab->code;?> -->
            <div class="tab-pane fade <?php if($index == 0) { echo 'active'; } ?> in" id="<?php echo $tab->code;?>" style="padding-top:30px;">
              <div class="row">
                <div class="col-md-10">
                  <?php foreach($tab->form_inputs as $input){  ?>
                  <div class="form-group col-md-12 question_container">
                    <label class="col-md-5 label-control"><?php echo $input["label"]; ?></label>
                    <div class="col-md-7">
                      <?php foreach($input['inputs'] as $form_input) { ?>
                        <?php echo $form_input;?>
                      <?php } ?>
                    </div>
                    <div class="form-group col-md-12 question_attached hidden"></div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!-- End Tab : <?php echo $tab->code;?> -->

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        var html = ' ', beforeClick = 0, answers = {};
        appConfig.question_attached = "<?php echo site_url('assessment/checkAttachedQuestion');?>";

        $(document).delegate('input[type="text"], input[type="textarea"]', 'change', function(){
            question_id = $(this).attr('name');
            answers[question_id] = $(this).val();

            console.log(answers);
        });

        $(document).delegate('input[type="radio"]', 'click', function(){
            html = ' ';
            questionlevel = 0;
            
            answer_id = $(this).val();
            question_id = $(this).attr('name');

            question_attached_container = $(this).parents('.question_container').children('.question_attached');

            $.getJSON(appConfig.question_attached + '?answer_id='+answer_id, function(data, response, xhr){
                json = xhr.responseJSON;

                if(json){
                    if(json.form_inputs.length){
                        questionlevel = json.level;
                        parentAnswer = json.parent_answer;

                        for(g=0;g < json.form_inputs.length; g++){
                            html = html + '<div class="form-group col-md-12">';
                            html = html + '<label class="col-md-5 label-control">'+json.form_inputs[g].label+'</label>';
                            html = html + '<div class="col-md-7">';

                            for(i=0;i < json.form_inputs[g].inputs.length;i++){
                                html = html + json.form_inputs[g].inputs[i];
                            }

                            html = html + '</div>';
                            html = html + '</div>';
                        }
                    }
                }

                currentLevelDiv = question_attached_container.find('div[id^="ql_"]');
                if(currentLevelDiv.length){
                  currentLevel = parseInt(currentLevelDiv.last().data('level'));
                }else{
                  currentLevel = 1;
                }

                console.log("Current Level : " + currentLevel);
                console.log("Question Level : " + questionlevel);

                if(html != ' '){
                  html = '<div class="col-md-12" id="ql_'+questionlevel+'" data-level="'+questionlevel+'" data-parent-answer="'+answer_id+'">' + html + '</div>';
                }

                if(answers.hasOwnProperty(question_id)){
                    question_attached_container.find('div[data-parent-answer="'+answers[question_id]+'"]').next().remove()
                    question_attached_container.find('div[data-parent-answer="'+answers[question_id]+'"]').remove();
                }

                if(currentLevel == 1 && (currentLevel == questionlevel)){
                  question_attached_container.html(html).removeClass('hidden');
                }else{
                  question_attached_container.append(html);
                }

                answers[question_id] = answer_id;
                console.log(answers);
            });
        });
    </script>
    <div class="modal fade" id="modal" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog">
        <div class="modal-content">
          
          
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $this->view('layouts/footer');?>
