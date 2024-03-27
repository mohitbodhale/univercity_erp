<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuetionsDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuetionsDetailsTable Test Case
 */
class QuetionsDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuetionsDetailsTable
     */
    protected $QuetionsDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.QuetionsDetails',
        'app.Quetions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QuetionsDetails') ? [] : ['className' => QuetionsDetailsTable::class];
        $this->QuetionsDetails = $this->getTableLocator()->get('QuetionsDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->QuetionsDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuetionsDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QuetionsDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
