<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios1 = Permission::firstOrCreate([
            'name' =>'usuario-view',
            'description' =>'Acesso a lista de Usuários'
        ]);
        $usuarios2 = Permission::firstOrCreate([
            'name' =>'usuario-create',
            'description' =>'Adicionar Usuários'
        ]);
        $usuarios2 = Permission::firstOrCreate([
            'name' =>'usuario-edit',
            'description' =>'Editar Usuários'
        ]);
        $usuarios3 = Permission::firstOrCreate([
            'name' =>'usuario-delete',
            'description' =>'Deletar Usuários'
        ]);
  
        $papeis1 = Permission::firstOrCreate([
            'name' =>'role-view',
            'description' =>'Listar Papéis'
        ]);
        $papeis2 = Permission::firstOrCreate([
            'name' =>'role-create',
            'description' =>'Adicionar Papéis'
        ]);
        $papeis3 = Permission::firstOrCreate([
            'name' =>'role-edit',
            'description' =>'Editar Papéis'
        ]);
  
        $papeis4 = Permission::firstOrCreate([
            'name' =>'role-delete',
            'description' =>'Deletar Papéis'
        ]);
  
        $perfil1 = Permission::firstOrCreate([
            'name' =>'perfil-view',
            'description' =>'Acesso ao perfil'
        ]);
  
        $chamados1 = Permission::firstOrCreate([
            'name' =>'chamados-view',
            'description' =>'Acesso aos chamados'
        ]);
  
        $chamados2 = Permission::firstOrCreate([
            'name' =>'chamados-create',
            'description' =>'Acesso aos chamados'
        ]);
        $chamados3 = Permission::firstOrCreate([
            'name' =>'chamados-edit',
            'description' =>'Acesso aos chamados'
        ]);
        $chamados4 = Permission::firstOrCreate([
            'name' =>'chamados-delete',
            'description' =>'Acesso aos chamados'
        ]);
    }
}
