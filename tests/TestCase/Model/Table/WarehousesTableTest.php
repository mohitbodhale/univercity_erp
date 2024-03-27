<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WarehousesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WarehousesTable Test Case
 */
class WarehousesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WarehousesTable
     */
    protected $Warehouses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Warehouses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Warehouses') ? [] : ['className' => WarehousesTable::class];
        $this->Warehouses = $this->getTableLocator()->get('Warehouses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Warehouses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WarehousesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
