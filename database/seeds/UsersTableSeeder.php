<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Domains\Access\Models\Role::find(1);

        $this->command->info("Criando Usuários");
        // Create default user for each role
        $userUm = \App\Domains\Access\Models\User::create([
            'name' => 'ANGELO NETO',
            'username' => 'angelo',
            'email' => 'netopvh@gmail.com',
            'password' => bcrypt('jans2neto')
        ]);
        $userUm->attachRole($role);

        $userDois = \App\Domains\Access\Models\User::create([
            'name' => 'HUMBERTO BANCHIERI',
            'username' => 'humberto',
            'email' => 'humberto@gmail.com',
            'password' => bcrypt('741852')
        ]);
        $userDois->attachRole($role);
    }
}
