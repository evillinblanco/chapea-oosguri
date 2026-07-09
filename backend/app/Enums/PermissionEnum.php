<?php

namespace App\Enums;

enum PermissionEnum: string
{
    // Users
    case USERS_VIEW = 'users.view';
    case USERS_CREATE = 'users.create';
    case USERS_EDIT = 'users.edit';
    case USERS_DELETE = 'users.delete';
    case USERS_CHANGE_ROLE = 'users.change_role';

    // Clients
    case CLIENTS_VIEW = 'clients.view';
    case CLIENTS_CREATE = 'clients.create';
    case CLIENTS_EDIT = 'clients.edit';
    case CLIENTS_DELETE = 'clients.delete';

    // Vehicles
    case VEHICLES_VIEW = 'vehicles.view';
    case VEHICLES_CREATE = 'vehicles.create';
    case VEHICLES_EDIT = 'vehicles.edit';
    case VEHICLES_DELETE = 'vehicles.delete';

    // Service Orders
    case ORDERS_VIEW = 'orders.view';
    case ORDERS_CREATE = 'orders.create';
    case ORDERS_EDIT = 'orders.edit';
    case ORDERS_DELETE = 'orders.delete';
    case ORDERS_COMPLETE = 'orders.complete';

    // Reports
    case REPORTS_VIEW = 'reports.view';
    case REPORTS_EXPORT = 'reports.export';

    // Settings
    case SETTINGS_VIEW = 'settings.view';
    case SETTINGS_EDIT = 'settings.edit';

    public function label(): string
    {
        return match ($this) {
            self::USERS_VIEW => 'Visualizar Usuários',
            self::USERS_CREATE => 'Criar Usuários',
            self::USERS_EDIT => 'Editar Usuários',
            self::USERS_DELETE => 'Deletar Usuários',
            self::USERS_CHANGE_ROLE => 'Alterar Roles de Usuários',
            self::CLIENTS_VIEW => 'Visualizar Clientes',
            self::CLIENTS_CREATE => 'Criar Clientes',
            self::CLIENTS_EDIT => 'Editar Clientes',
            self::CLIENTS_DELETE => 'Deletar Clientes',
            self::VEHICLES_VIEW => 'Visualizar Veículos',
            self::VEHICLES_CREATE => 'Criar Veículos',
            self::VEHICLES_EDIT => 'Editar Veículos',
            self::VEHICLES_DELETE => 'Deletar Veículos',
            self::ORDERS_VIEW => 'Visualizar Ordens de Serviço',
            self::ORDERS_CREATE => 'Criar Ordens de Serviço',
            self::ORDERS_EDIT => 'Editar Ordens de Serviço',
            self::ORDERS_DELETE => 'Deletar Ordens de Serviço',
            self::ORDERS_COMPLETE => 'Completar Ordens de Serviço',
            self::REPORTS_VIEW => 'Visualizar Relatórios',
            self::REPORTS_EXPORT => 'Exportar Relatórios',
            self::SETTINGS_VIEW => 'Visualizar Configurações',
            self::SETTINGS_EDIT => 'Editar Configurações',
        };
    }
}
