<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case WORKER = 'worker';
    case RECEPTIONIST = 'receptionist';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrador',
            self::MANAGER => 'Gerente',
            self::WORKER => 'Operário',
            self::RECEPTIONIST => 'Recepcionista',
        };
    }
}
