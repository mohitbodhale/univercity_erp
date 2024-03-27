<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SlotsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SlotsTable Test Case
 */
class SlotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SlotsTable
     */
    protected $Slots;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Slots') ? [] : ['className' => SlotsTable::class];
        $this->Slots = $this->getTableLocator()->get('Slots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Slots);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SlotsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
