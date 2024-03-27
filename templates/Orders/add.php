<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Order
      <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($order, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('order_no');
                echo $this->Form->control('customers_id', ['options' => $customers, 'empty' => "Select Customer"]);
                echo $this->Form->control('warehouses_id', ['options' => $warehouses, 'empty' => "Select Warehouse"]);
                echo $this->Form->control('products_id', ['options' => $products, 'empty' => "Select Product"]);
                echo $this->Form->input('Inward', [
                  'type' => 'checkbox',
                  'label' => 'Inward'
                ]);
                echo $this->Form->input('Outward', [
                  'type' => 'checkbox',
                  'label' => 'Outward'
                ]);
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>

