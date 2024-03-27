<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WarehousesFixture
 */
class WarehousesFixture extends TestFixture
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
                'warehouse_name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
