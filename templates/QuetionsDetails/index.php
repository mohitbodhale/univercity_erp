<?php
use PhpParser\Node\Stmt\Label;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Quetions Details

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
        <?php echo $this->Form->create(); ?>
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('quetions_id') ?></th>
                  <th scope="col" colspan="4"><?= $this->Paginator->sort('available_options_for_answers') ?></th>
                  <th scope="col" style="display:none"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col" style="display:none"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" style="display:" class="actions col-md-1 text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $row = 0;
              foreach ($quetion as $quetion): //debug($quetion);?>
              	<tr>
              		<td>
              		<?= h($quetion->id); 
              		    //echo $this->Form->hidden('quetions_details['.$row.'][quetions_id]',['value'=>$quetion->id]);	
              		?>
              		</td>
              		
              		<td><?= h($quetion->tittle) ?></td>
              		
              		<?php $ans_col = ['a','b','c','d']; ?>
              			<?php
              		        for($ans_col_key=0;$ans_col_key<4;$ans_col_key++){ 
              		    	   echo "<td class='col-md-1'>";
              		    	   echo $this->Form->hidden('quetions_details['.$row.']['.$ans_col[$ans_col_key].'][answers_options_key]',['value'=> $ans_col[$ans_col_key]]);
              		    	   //debug($ans_col[$ans_col_key]);
              		    	   if(!empty($quetion->quetions_details)){
              		    	       foreach ($quetion->quetions_details as $quetion->quetions_details_k=>$quetion->quetions_details_v){
              		    	           if($quetion->quetions_details_v->answers_options_key == $ans_col[$ans_col_key]){
              		    	               $answers_options_val_match = $quetion->quetions_details_v->available_options_values_id ; 
              		    	               $answers_options_key_match = true;
              		    	               //debug($quetion->quetions_details_v->id);
              		    	               echo $this->Form->hidden('quetions_details['.$row.']['.$ans_col[$ans_col_key].'][id]',['value'=>$quetion->quetions_details_v->id]);
              		    	               echo $this->Form->hidden('quetions_details['.$row.']['.$ans_col[$ans_col_key].'][quetions_id]',['label'=>false,'value'=>$quetion->quetions_details_v->quetions_id ]);
              		    	               break;
              		    	           }else{
              		    	               $answers_options_key_match = false;
              		    	           }
              		    	       }
              		    	   }
              		    	   if($answers_options_key_match){
              		    	       //debug($available_options_list[$answers_options_val_match]);
              		    	       echo $this->Form->input('quetions_details['.$row.']['.$ans_col[$ans_col_key].'][available_options_values_id]',['label'=>false,'options'=>$available_options_list,'value'=>$answers_options_val_match   ]);
              		    	   }
              		    	   else{
              		    	       echo $this->Form->hidden('quetions_details['.$row.']['.$ans_col[$ans_col_key].'][quetions_id]',['label'=>false,'value'=>$quetion->id ]);
              		    	       echo $this->Form->input('quetions_details['.$row.']['.$ans_col[$ans_col_key].'][available_options_values_id]',['label'=>false,'options'=>$available_options_list ]);}
              		    	   echo "</td>";
              		    	   
              		        }
              		    ?>
              		
              		<td class="actions col-md-1">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $quetion->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?php //= $this->Html->link(__('Edit'), ['action' => 'edit', $quetion->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quetion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quetion->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  	</td>
              	</tr>
              	<?php $row++ ;?>	
              <?php endforeach; ?>	
              
              
              <?php /*foreach ($quetionsDetails as $quetionsDetail): ?>
                <tr>
                  <td><?= $this->Number->format($quetionsDetail->id) ?></td>
                  <td><?= $this->Number->format($quetionsDetail->quetions_id) ?></td>
                  <td><?= h($quetionsDetail->answers_options_key) ?></td>
                  <td><?= h($quetionsDetail->created) ?></td>
                  <td><?= h($quetionsDetail->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $quetionsDetail->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quetionsDetail->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quetionsDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quetionsDetail->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; */?>
            </tbody>
          </table>
          <?php echo $this->Form->submit(__('Submit')); ?>
          <?php echo $this->Form->end(); ?>
        </div>
        
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>