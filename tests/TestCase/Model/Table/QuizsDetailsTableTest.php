<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuizsDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuizsDetailsTable Test Case
 */
class QuizsDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuizsDetailsTable
     */
    protected $QuizsDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.QuizsDetails',
        'app.Quizs',
        'app.Slots',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QuizsDetails') ? [] : ['className' => QuizsDetailsTable::class];
        $this->QuizsDetails = $this->getTableLocator()->get('QuizsDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->QuizsDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuizsDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QuizsDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
