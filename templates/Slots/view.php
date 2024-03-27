<section class="content-header">
  <h1>
    Slot
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
            <dt scope="row"><?= __('Slots Name') ?></dt>
            <dd><?= h($slot->slots_name) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($slot->id) ?></dd>
            <dt scope="row"><?= __('Start Time') ?></dt>
            <dd><?= h($slot->start_time) ?></dd>
            <dt scope="row"><?= __('End Time') ?></dt>
            <dd><?= h($slot->end_time) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
