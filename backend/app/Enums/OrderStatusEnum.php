<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pendente',
            self::IN_PROGRESS => 'Em Progresso',
            self::COMPLETED => 'Completo',
            self::CANCELLED => 'Cancelado',
        };
    }
}
