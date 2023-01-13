<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    protected $Users;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = $this->getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getdata method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::getdata()
     */
    public function testGetdata(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test login method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::login()
     */
    public function testLogin(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test checkEmailExist method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::checkEmailExist()
     */
    public function testCheckEmailExist(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test resetPassword method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::resetPassword()
     */
    public function testResetPassword(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test checktokenexist method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::checktokenexist()
     */
    public function testChecktokenexist(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test insertToken method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::insertToken()
     */
    public function testInsertToken(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
