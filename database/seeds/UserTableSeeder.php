<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(CodeCommerce\User::class,15)->create();

        $user_admin = CodeCommerce\User::find(1);
        $user_admin->is_admin = true;
        $user_admin->save();

    }

}