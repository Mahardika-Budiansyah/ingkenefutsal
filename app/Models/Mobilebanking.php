<?php

namespace App\Models;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobilebanking extends Model
{
    use HasFactory;

    protected $table = 'mobilebankings';

    protected $fillable = [
        'name',
    ];

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'partner_mobilebanking', 'mobilebanking_id', 'partner_id');
    }
}
