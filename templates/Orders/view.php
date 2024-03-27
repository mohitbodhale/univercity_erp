<section class="content-header">
  <h1>
    Order
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
            <dt scope="row"><?= __('Order No') ?></dt>
            <dd><?= h($order->order_no) ?></dd>
            <dt scope="row"><?= __('Customer') ?></dt>
            <dd><?= $order->has('customer') ? $this->Html->link($order->customer->id, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></dd>
            <dt scope="row"><?= __('Warehouse') ?></dt>
            <dd><?= $order->has('warehouse') ? $this->Html->link($order->warehouse->id, ['controller' => 'Warehouses', 'action' => 'view', $order->warehouse->id]) : '' ?></dd>
            <dt scope="row"><?= __('Product') ?></dt>
            <dd><?= $order->has('product') ? $this->Html->link($order->product->id, ['controller' => 'Products', 'action' => 'view', $order->product->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($order->id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
