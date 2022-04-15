<?php

namespace App\Tests;

use App\Entity\Admin;
use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testisTrue()
    {
        $admin = new Admin();

        $admin->setEmail('true@test.fr');
        // $admin->setRoles(['ADMIN']);
        $admin->setPassword('testtest');

        $this->assertTrue($admin->getEmail() === 'true@test.fr');
        // $this->assertTrue($admin->getRoles() === 'ADMIN');
        $this->assertTrue($admin->getPassword() === 'testtest');

    }

    public function testisFalse()
    {
        $admin = new Admin();

        $admin->setEmail('true@test.fr');
        $admin->setRoles(['ADMIN']);
        $admin->setPassword('testtest');

        $this->assertFalse($admin->getEmail() === 'false@test.fr');
        $this->assertFalse($admin->getRoles() === ['false']);
        $this->assertFalse($admin->getPassword() === 'false');

    }

    // public function testisEmpty()
    // {
    //     $admin = new Admin();

    //     $this->assertEmpty($admin->getEmail());
    //     // $this->assertEmpty($admin->getRoles());
    //     $this->assertEmpty($admin->getPassword());

    // }
}
