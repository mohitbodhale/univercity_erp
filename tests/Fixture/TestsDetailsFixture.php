<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TestsDetailsFixture
 */
class TestsDetailsFixture extends TestFixture
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
                'quetions_id' => 1,
                'tests_id' => 1,
                'available_options_values_id' => 1,
            ],
        ];
        parent::init();
    }
}
