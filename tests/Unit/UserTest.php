<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    public function testCreateUser()
    {
        $user = User::create([
            'name' => 'German Garmendia',
            'email' => 'german@prueba.com',
            'password' => Hash::make('contra123'),
        ]);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('German Garmendia', $user->name);
        $this->assertEquals('german@prueba.com', $user->email);
        $this->assertTrue(Hash::check('contra123', $user->password));
    }

    public function testIsAdminAttribute()
    {
        $userAdmin = User::factory()->create();
        $userAdmin->roles()->attach(1);
        $userRegular = User::factory()->create();
        $this->assertTrue($userAdmin->isAdmin);
        $this->assertFalse($userRegular->isAdmin);
    }
}
