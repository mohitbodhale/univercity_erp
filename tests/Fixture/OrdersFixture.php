<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'order_no' => 'Lorem ipsum dolor sit amet',
                'customers_id' => 1,
                'warehouses_id' => 1,
                'products_id' => 1,
            ],
        ];
        parent::init();
    }
}
