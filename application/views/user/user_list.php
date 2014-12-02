<?php $this->view('layouts/header'); ?>

<div class="container-fluid">
      <div class="row">
        <?php echo $this->view('layouts/sidebar'); ?>
        <div class="col-md-11 col-md-offset-1 main">
          <div class="row">
            <h3 class="sub-header">الإدارة </h3>
          </div>
          <div class="row">
            <?php if($message){ ?>
            <div class="col-md-6">
              <div class="alert alert-warning"><?php echo $message; ?></div>
            </div>
            <?php } ?>

            <div class="col-md-12">
              <header class="clearfix">
                <div class="pull-left">
                  <a href="<?php echo $insert_btn;?>" class="btn btn-primary pull-left">
                    <i class="fa fa-plus-circle fa-lg"></i> إضافة مدير جديد
                  </a>
                </div>
              </header>
              <section class="clearfix">
                <table class="table">
                    <thead>
                      <tr>
                        <th width="10%">#</th>
                        <th >الاسم الكامل</th>
                        <th>اسم المستخدم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>رقم الهاتف</th>
                        <th width="15%"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($results as $item) { ?>
                      <tr>
                        <td><?php echo $item->id;?></td>
                        <td><?php echo $item->first_name . ' ' . $item->last_name;?></td>
                                        <td><?php echo $item->username ;?></td>
                                        <td><a href="mailto:<?php echo $item->email ;?>?from=admin@syrian-estate.com"><?php echo $item->email ;?></a></td>
                                        <td><?php echo $item->phone ;?></td>
                        <td>
                          <a href="<?php echo $update_btn . '/'.$item->id;?>" class="table-link">
                            <span class="fa-stack">
                              <i class="fa fa-square fa-stack-2x"></i>
                              <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
<!--
                          <a href="<?php echo $delete_btn.'?id='.$item->id;?>" class="table-link danger">
                            <span class="fa-stack">
                              <i class="fa fa-square fa-stack-2x"></i>
                              <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
-->
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $this->view('layouts/footer');?>
