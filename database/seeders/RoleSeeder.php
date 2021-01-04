<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Role::firstOrCreate([
            'name' =>'Admin',
            'description' =>'Acesso total ao sistema'
        ]);
  
        $p2 = Role::firstOrCreate([
            'name' =>'Gerente',
            'description' =>'Gerenciamento do sistema'
        ]);
  
        $p3 = Role::firstOrCreate([
            'name' =>'Usuário',
            'description' =>'Acesso ao site como usuário'
        ]);
    }
}
