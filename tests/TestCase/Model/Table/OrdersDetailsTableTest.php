<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersDetailsTable Test Case
 */
class OrdersDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersDetailsTable
     */
    protected $OrdersDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.OrdersDetails',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OrdersDetails') ? [] : ['className' => OrdersDetailsTable::class];
        $this->OrdersDetails = $this->getTableLocator()->get('OrdersDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->OrdersDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OrdersDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OrdersDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
