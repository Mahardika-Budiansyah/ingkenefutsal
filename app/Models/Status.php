<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statues';

    protected $fillable = [
        'name',
    ];

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction', 'status_id', 'transaction_id');
    }
}
