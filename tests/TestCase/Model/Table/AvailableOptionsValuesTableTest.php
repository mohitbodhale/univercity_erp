<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvailableOptionsValuesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvailableOptionsValuesTable Test Case
 */
class AvailableOptionsValuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AvailableOptionsValuesTable
     */
    protected $AvailableOptionsValues;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AvailableOptionsValues',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AvailableOptionsValues') ? [] : ['className' => AvailableOptionsValuesTable::class];
        $this->AvailableOptionsValues = $this->getTableLocator()->get('AvailableOptionsValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AvailableOptionsValues);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AvailableOptionsValuesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AvailableOptionsValuesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
