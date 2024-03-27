<section class="content-header">
  <h1>
    Test
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Test Name') ?></dt>
            <dd><?= h($test->test_name) ?></dd>
            <dt scope="row"><?= __('Slot') ?></dt>
            <dd><?= $test->has('slot') ? $this->Html->link($test->slot->id, ['controller' => 'Slots', 'action' => 'view', $test->slot->id]) : '' ?></dd>
            <dt scope="row"><?= __('Quizs Detail') ?></dt>
            <dd><?= $test->has('quizs_detail') ? $this->Html->link($test->quizs_detail->id, ['controller' => 'QuizsDetails', 'action' => 'view', $test->quizs_detail->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($test->id) ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= $this->Number->format($test->status) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
