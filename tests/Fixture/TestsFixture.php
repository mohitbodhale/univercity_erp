<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TestsFixture
 */
class TestsFixture extends TestFixture
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
                'test_name' => 'Lorem ipsum dolor sit amet',
                'slots_id' => 1,
                'status' => 1,
                'quizs_id' => 1,
            ],
        ];
        parent::init();
    }
}
