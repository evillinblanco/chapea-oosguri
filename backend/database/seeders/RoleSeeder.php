<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrador do sistema com acesso total',
        ]);

        Role::create([
            'name' => 'manager',
            'description' => 'Gerente da oficina com acesso a operações e relatórios',
        ]);

        Role::create([
            'name' => 'worker',
            'description' => 'Operário com acesso às ordens de serviço',
        ]);

        Role::create([
            'name' => 'receptionist',
            'description' => 'Recepcionista com acesso a agendamentos e entrada de clientes',
        ]);
    }
}
