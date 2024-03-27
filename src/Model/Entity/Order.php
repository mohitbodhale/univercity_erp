<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $order_no
 * @property int|null $customers_id
 * @property int $warehouses_id
 * @property int $products_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\Product $product
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'order_no' => true,
        'customers_id' => true,
        'warehouses_id' => true,
        'products_id' => true,
        'type' => true,

        'customer' => true,
        'warehouse' => true,
        'product' => true,
    ];
}
