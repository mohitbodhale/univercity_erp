<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuetionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuetionsTable Test Case
 */
class QuetionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuetionsTable
     */
    protected $Quetions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Quetions') ? [] : ['className' => QuetionsTable::class];
        $this->Quetions = $this->getTableLocator()->get('Quetions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Quetions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuetionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
