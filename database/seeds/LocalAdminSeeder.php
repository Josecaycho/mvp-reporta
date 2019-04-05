<?php

use Illuminate\Database\Seeder;
use App\User;

class LocalAdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app('cache')->forget('spatie.permission.cache');

        $this->seedUsersTable();
    }
    
    protected function seedUsersTable()
    {
        User::insert(factory(User::class, 10)->raw());
    }
}
