<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
    <?php 
    echo ucfirst($test->test_name);//'test_name'
    ?> 
    <div class="pull-right">
        <button id="start"  type="button" class="btn btn-primary">Start</button>
        <button id="stop" type="button" class="btn btn-danger">Stop</button>
        <button id="reset"  type="button" class="btn btn-success">Reset</button>
    </div>
  </h4>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>
          <div class="pull-right">
              <div id="timer"></div>
          </div>

          <div class="box-tools">
            <!-- <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                
               
              </div>
            </form> -->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th style="max-width:50px">Sr.No.</th>  
                  <th>Quetion</th>
                  <th></th>
                  <!-- <th scope="col" class="actions text-center" style="min-width:150px"><?= __('Actions') ?></th> -->
              </tr>
            </thead>
            <tbody>
            <?= $this->Form->create(null, ['url' => ['controller' => 'Tests', 'action' => 'end_test',$test->id],'type'=>'POST']); ?>
                  
            <?php 
              //debug(count($test->tests_details));
              $t_cnt = count($test->tests_details);  
              $cnt = 1;
              foreach ($test->tests_details as $test):
                ?>
                <tr class="">
                  <td class="" style="color:white;background-color:#222d32"><?php echo $cnt;?></td>  
                  <td class="col-md-6" colspan="2" style="color:white;background-color:#222d32">
                    <?php 
                        echo $test->quetion->tittle;
                    ?>
                  </td>
                  <?php if($cnt==1){ ?>
                    <td class="col-md-5" rowspan=<?php echo $t_cnt*2; ?> ></td>
                  <?php } ?>  
                </tr>
                <tr>  
                  <td></td>
                  <td class="col-md-6" colspan="2">
                    <?php
                        $available_options_value_desc = array();
                        foreach($test->quetion->quetions_details as $quetions_details_k=>$quetions_details_v){
                          //debug($quetions_details_v->available_options_values_id);
                          $available_options_value_desc[$quetions_details_v->available_options_values_id] = $quetions_details_v->available_options_value->description;
                        }
                        echo $this->Form->radio($quetions_details_v->quetions_id.'['."selected".']', 
                            $available_options_value_desc, 
                          ['legend' => 'Choose an option']
                        );
                    ?>
                  </td>
                  
                  <!-- <td class="actions text-right" style="min-width: 150px;"> -->
                      <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $test->id], ['class'=>'btn btn-info btn-xs']) ?> -->
                      <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $test->id], ['class'=>'btn btn-warning btn-xs']) ?> -->
                      <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete # {0}?', $test->id), 'class'=>'btn btn-danger btn-xs']) ?> -->
                  <!-- </td> -->
                </tr>
              <?php 
              $cnt++;
              endforeach; 
            ?>
            </tbody>
          </table>
          <!-- <button class="btn btn-info btn-flat" type="submit"><?= __('End Test') ?></button> -->
          <?php echo $this->Form->submit(__('End Test')); ?>

          <?php $this->Form->end();?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>  
</section>



<script>
$( function() {
  $( "#accordion" ).accordion({
    collapsible: true
  });
} );
</script>
<script>
        // Initialize timer variables
        let timer;
        let isRunning = false;
        let seconds = 0;
        let minutes = 0;
        let hours = 0;

        // Function to update the timer display
        function updateTimer() {
            seconds++;
            if (seconds >= 60) {
                seconds = 0;
                minutes++;
                if (minutes >= 60) {
                    minutes = 0;
                    hours++;
                }
            }
            const timeString = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
            $("#timer").text(timeString);
        }

        // Function to start the timer
        function startTimer() {
            if (!isRunning) {
                timer = setInterval(updateTimer, 1000);
                isRunning = true;
                $("#start").prop("disabled", true);
                $("#stop").prop("disabled", false);
            }
        }

        // Function to stop the timer
        function stopTimer() {
            clearInterval(timer);
            isRunning = false;
            $("#start").prop("disabled", false);
            $("#stop").prop("disabled", true);
        }

        // Function to reset the timer
        function resetTimer() {
            clearInterval(timer);
            isRunning = false;
            seconds = 0;
            minutes = 0;
            hours = 0;
            $("#timer").text("00:00:00");
            $("#start").prop("disabled", false);
            $("#stop").prop("disabled", true);
        }

        // Function to pad single-digit numbers with leading zeros
        function pad(value) {
            return value < 10 ? "0" + value : value;
        }

        // Add event listeners to buttons
        $("#start").on("click", startTimer);
        $("#stop").on("click", stopTimer);
        $("#reset").on("click", resetTimer);

        // Function to auto-submit the form
    function autoSubmitForm() {
        document.getElementById("myForm").submit();
    }

    // Set a timeout to submit the form after 1 minute (60,000 milliseconds)
    setTimeout(autoSubmitForm, 10000);
    </script>

    