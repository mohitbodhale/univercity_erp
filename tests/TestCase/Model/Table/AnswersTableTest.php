<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnswersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswersTable Test Case
 */
class AnswersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnswersTable
     */
    protected $Answers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Answers') ? [] : ['className' => AnswersTable::class];
        $this->Answers = $this->getTableLocator()->get('Answers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Answers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AnswersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
