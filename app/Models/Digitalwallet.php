<?php

namespace App\Models;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Digitalwallet extends Model
{
    use HasFactory;

    protected $table = 'digitalwallets';

    protected $fillable = [
        'name',
    ];

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'partner_digitalwallet', 'digitalwallet_id', 'partner_id');
    }
}
