<section class="content-header">
  <h1>
    Quetions Detail
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
            <dd><?= $quetionsDetail->has('quetion') ? $this->Html->link($quetionsDetail->quetion->id, ['controller' => 'Quetions', 'action' => 'view', $quetionsDetail->quetion->id]) : '' ?></dd>
            <dt scope="row"><?= __('Answers Options Key') ?></dt>
            <dd><?= h($quetionsDetail->answers_options_key) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($quetionsDetail->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($quetionsDetail->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($quetionsDetail->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title"><?= __('Answers Options Value') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Text->autoParagraph($quetionsDetail->answers_options_value); ?>
        </div>
      </div>
    </div>
  </div>
</section>
