<section class="content-header">
  <h1>
    Tests Detail
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
            <dt scope="row"><?= __('Quetion') ?></dt>
            <dd><?= $testsDetail->has('quetion') ? $this->Html->link($testsDetail->quetion->id, ['controller' => 'Quetions', 'action' => 'view', $testsDetail->quetion->id]) : '' ?></dd>
            <dt scope="row"><?= __('Test') ?></dt>
            <dd><?= $testsDetail->has('test') ? $this->Html->link($testsDetail->test->id, ['controller' => 'Tests', 'action' => 'view', $testsDetail->test->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($testsDetail->id) ?></dd>
            <dt scope="row"><?= __('Available Options Values Id') ?></dt>
            <dd><?= $this->Number->format($testsDetail->available_options_values_id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
