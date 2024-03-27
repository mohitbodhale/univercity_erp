<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestsDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestsDetailsTable Test Case
 */
class TestsDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TestsDetailsTable
     */
    protected $TestsDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TestsDetails',
        'app.Quetions',
        'app.Tests',
        'app.Answers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TestsDetails') ? [] : ['className' => TestsDetailsTable::class];
        $this->TestsDetails = $this->getTableLocator()->get('TestsDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TestsDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TestsDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TestsDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
