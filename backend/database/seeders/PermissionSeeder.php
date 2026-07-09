<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Users Permissions
        Permission::create([
            'name' => PermissionEnum::USERS_VIEW->value,
            'description' => 'Visualizar usuários do sistema',
            'module' => 'users',
        ]);
        Permission::create([
            'name' => PermissionEnum::USERS_CREATE->value,
            'description' => 'Criar novos usuários',
            'module' => 'users',
        ]);
        Permission::create([
            'name' => PermissionEnum::USERS_EDIT->value,
            'description' => 'Editar usuários existentes',
            'module' => 'users',
        ]);
        Permission::create([
            'name' => PermissionEnum::USERS_DELETE->value,
            'description' => 'Deletar usuários',
            'module' => 'users',
        ]);
        Permission::create([
            'name' => PermissionEnum::USERS_CHANGE_ROLE->value,
            'description' => 'Alterar roles dos usuários',
            'module' => 'users',
        ]);

        // Clients Permissions
        Permission::create([
            'name' => PermissionEnum::CLIENTS_VIEW->value,
            'description' => 'Visualizar clientes',
            'module' => 'clients',
        ]);
        Permission::create([
            'name' => PermissionEnum::CLIENTS_CREATE->value,
            'description' => 'Criar novos clientes',
            'module' => 'clients',
        ]);
        Permission::create([
            'name' => PermissionEnum::CLIENTS_EDIT->value,
            'description' => 'Editar clientes existentes',
            'module' => 'clients',
        ]);
        Permission::create([
            'name' => PermissionEnum::CLIENTS_DELETE->value,
            'description' => 'Deletar clientes',
            'module' => 'clients',
        ]);

        // Vehicles Permissions
        Permission::create([
            'name' => PermissionEnum::VEHICLES_VIEW->value,
            'description' => 'Visualizar veículos',
            'module' => 'vehicles',
        ]);
        Permission::create([
            'name' => PermissionEnum::VEHICLES_CREATE->value,
            'description' => 'Criar novos veículos',
            'module' => 'vehicles',
        ]);
        Permission::create([
            'name' => PermissionEnum::VEHICLES_EDIT->value,
            'description' => 'Editar veículos existentes',
            'module' => 'vehicles',
        ]);
        Permission::create([
            'name' => PermissionEnum::VEHICLES_DELETE->value,
            'description' => 'Deletar veículos',
            'module' => 'vehicles',
        ]);

        // Service Orders Permissions
        Permission::create([
            'name' => PermissionEnum::ORDERS_VIEW->value,
            'description' => 'Visualizar ordens de serviço',
            'module' => 'orders',
        ]);
        Permission::create([
            'name' => PermissionEnum::ORDERS_CREATE->value,
            'description' => 'Criar novas ordens de serviço',
            'module' => 'orders',
        ]);
        Permission::create([
            'name' => PermissionEnum::ORDERS_EDIT->value,
            'description' => 'Editar ordens de serviço',
            'module' => 'orders',
        ]);
        Permission::create([
            'name' => PermissionEnum::ORDERS_DELETE->value,
            'description' => 'Deletar ordens de serviço',
            'module' => 'orders',
        ]);
        Permission::create([
            'name' => PermissionEnum::ORDERS_COMPLETE->value,
            'description' => 'Completar ordens de serviço',
            'module' => 'orders',
        ]);

        // Reports Permissions
        Permission::create([
            'name' => PermissionEnum::REPORTS_VIEW->value,
            'description' => 'Visualizar relatórios',
            'module' => 'reports',
        ]);
        Permission::create([
            'name' => PermissionEnum::REPORTS_EXPORT->value,
            'description' => 'Exportar relatórios',
            'module' => 'reports',
        ]);

        // Settings Permissions
        Permission::create([
            'name' => PermissionEnum::SETTINGS_VIEW->value,
            'description' => 'Visualizar configurações',
            'module' => 'settings',
        ]);
        Permission::create([
            'name' => PermissionEnum::SETTINGS_EDIT->value,
            'description' => 'Editar configurações',
            'module' => 'settings',
        ]);
    }
}
