<?php

namespace Tests;

use ActivismeBE\Role;
use ActivismeBE\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create an administrator in the testing system.
     *
     * @return mixed
     */
    public function createAdmin()
    {
        $role = Role::create(['name' => 'admin']);
        $user = factory(User::class)->create();

        User::find($user->id)->assignRole($role->name);
        return $user;
    }

    /**
     * Create a nprmal user in the system.
     *
     * @return mixed
     */
    public function createUser()
    {
        $role = Role::create(['name' => 'user']);
        $user = factory(User::class)->create();

        User::find($user->id)->assignRole($role->name);
        return $user;
    }

    /**
     * Create a blocked user in the system.
     *
     * @return mixed
     */
    public function createBlockedUser()
    {
        $user = factory(User::class)->create();
        User::find($user->id)->ban();

        return $user;

    }
}
