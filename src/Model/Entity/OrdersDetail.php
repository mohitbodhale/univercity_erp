<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdersDetail Entity
 *
 * @property int $id
 * @property int|null $type
 * @property int $orders_id
 *
 * @property \App\Model\Entity\Order $order
 */
class OrdersDetail extends Entity
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
        'type' => true,
        'orders_id' => true,
        'order' => true,
    ];
}
