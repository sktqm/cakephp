<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'firstname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phonenumber' => 'Lorem ip',
                'password' => 'Lorem ipsum dolor sit amet',
                'gender' => 'Lorem ip',
                'user_status' => 'Lorem ipsum dolor sit amet',
                'token' => 'Lorem ip',
                'file' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
