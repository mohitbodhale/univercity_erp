<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LibraryFixture
 */
class LibraryFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'library';
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
                'departments_id' => 1,
            ],
        ];
        parent::init();
    }
}
