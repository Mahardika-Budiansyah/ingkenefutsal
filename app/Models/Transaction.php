<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'transactions';

    protected $fillable = [
        'invoice',
        'field_id',
        'user_id',
        'status',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'invoice'
            ]
        ];
    }

    public function fields()
    {
        return $this->belongsTo(Field::class, 'field_id', 'id');
    }

    public function statues()
    {
        return $this->belongsToMany(Status::class, 'transaction_status', 'transaction_id', 'status_id')->withTimestamps();
    }

    public function partners()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }
}
