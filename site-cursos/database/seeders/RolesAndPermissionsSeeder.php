<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Limpar tabeals para evitar duplicação ao rodar o seeder novamente
 

        //Criar Permissões
        Permission::create(['name' => 'manage courses']); //Gerenciar cursos
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view courses']);

        //Criar papeis e atribuir permissões

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['manage courses', 'manage users', 'view courses']);
 

        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo(['view courses']);
    }


}