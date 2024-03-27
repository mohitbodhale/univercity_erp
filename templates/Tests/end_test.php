<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <?php 
        //echo ucfirst($test->test_name);//'test_name'
    ?> 
  </h4>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Test Result'); ?></h3>
          <div class="box-tools">
            <!-- <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
              </div>
            </form> -->
          </div>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body table-responsive no-padding">
        <?php
        $count = count(array_filter($comparisons, function ($value) {
            return $value === 1;
        }));
        ?>                
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Test Name</h5>
                    <p class="card-text">
                        <?php
                        echo "Your total Answers : ".count($user_answers); // This will output the count of values equal to 1
                        ?>
                    </p>
                    <p class="card-text">
                        <?php
                        echo "Your total score is : ".$count; // This will output the count of values equal to 1
                        ?>
                    </p>
                </div>
            </div>
        </div>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>  
</section>

