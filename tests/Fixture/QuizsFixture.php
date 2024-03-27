<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuizsFixture
 */
class QuizsFixture extends TestFixture
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
                'quiz_name' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'departments_id' => 1,
            ],
        ];
        parent::init();
    }
}
