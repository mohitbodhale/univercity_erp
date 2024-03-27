<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SlotsFixture
 */
class SlotsFixture extends TestFixture
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
                'slots_name' => 'Lorem ipsum dolor sit amet',
                'start_time' => '2023-10-19 13:29:50',
                'end_time' => '2023-10-19 13:29:50',
            ],
        ];
        parent::init();
    }
}
