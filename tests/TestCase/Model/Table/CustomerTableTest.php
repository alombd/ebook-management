<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerTable Test Case
 */
class CustomerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomerTable
     */
    public $CustomerTable;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Customer') ? [] : ['className' => 'App\Model\Table\CustomerTable'];
        $this->CustomerTable = TableRegistry::get('Customer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerTable);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
