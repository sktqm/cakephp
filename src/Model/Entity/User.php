<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;//
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property int $phonenumber
 * @property string $password
 * @property string $gender
 * @property string|null $user_status
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'phonenumber' => true,
        'password' => true,
        'gender' => true,
        'user_status' => true,
        'token' => true,
        // 'file' => true,
    ];

    // Code from bake.



    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    // Add this method
    // protected function _setPassword(string $password) : ?string
    // {
    //     if (strlen($password) > 0) {
    //         return (new DefaultPasswordHasher())->hash($password);
    //     }
    // }
    
}