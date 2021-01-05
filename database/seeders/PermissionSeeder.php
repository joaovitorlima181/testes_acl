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
        $users1 = Permission::firstOrCreate([
            'name' =>'user-view',
            'description' =>'Acesso a lista de Usuários'
        ]);
        $users2 = Permission::firstOrCreate([
            'name' =>'user-create',
            'description' =>'Adicionar Usuários'
        ]);
        $users2 = Permission::firstOrCreate([
            'name' =>'user-edit',
            'description' =>'Editar Usuários'
        ]);
        $users3 = Permission::firstOrCreate([
            'name' =>'user-delete',
            'description' =>'Deletar Usuários'
        ]);

        $roles1 = Permission::firstOrCreate([
            'name' =>'role-view',
            'description' =>'Listar Papéis'
        ]);
        $roles2 = Permission::firstOrCreate([
            'name' =>'role-create',
            'description' =>'Adicionar Papéis'
        ]);
        $roles3 = Permission::firstOrCreate([
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
