<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuizsDetailsFixture
 */
class QuizsDetailsFixture extends TestFixture
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
                'quizs_id' => 1,
                'slots_id' => 1,
            ],
        ];
        parent::init();
    }
}
