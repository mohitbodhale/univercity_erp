<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <?php 
        //echo ucfirst($test->test_name);//'test_name'
    ?> 
  </h4>
</section>
<style>
.table>tbody>tr>th,td,tr,th,table{border:1px solid }
</style>
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
          <div class="col-md-12">                  
          <div class="container">
            <table class="table table-responssive" >
                <tbody>
                    <tr>
                      <th colspan="2" background='https://picsum.photos/200/300?alejandroescamilla-book.jpg' style="background-size: cover;background-attachment: fixed;">
                        <center>
                        <p class="h4 text-light"><b><?php echo ucwords($test['quiz']['quiz_name'])." : ".ucwords($test['test_name']); ?></b></p>
                        </center>
                      </th>
                    </tr>
                    <tr>
                        <th scope="col">Total Questions</th>
                        <td><?php echo count($user_answers); ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Total Attempted</th>
                        <td><?php echo $comparisons['countAttempt']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Total Not Attempted</th>
                        <td><?php echo $comparisons['countNotAttempt']; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Total Score</th>
                        <td><?php echo $count; ?></td>
                    </tr>
                </tbody>
            </table>
          </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>  
</section>

