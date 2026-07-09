<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Uuid;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table = 'service_orders';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'client_id',
        'vehicle_id',
        'user_id',
        'description',
        'status',
        'priority',
        'estimated_date',
        'completion_date',
        'total_value',
        'payment_status',
    ];

    protected $casts = [
        'estimated_date' => 'date',
        'completion_date' => 'date',
        'total_value' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Uuid::v4();
            }
        });
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(ServiceItem::class);
    }
}
