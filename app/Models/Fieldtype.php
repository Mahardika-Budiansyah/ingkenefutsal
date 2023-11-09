<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fieldtype extends Model
{
    use HasFactory;

    protected $table = 'fieldtypes';
    
    protected $fillable = [
        'name',
    ];

    public function fields()
    {
        return $this->hasMany(Field::class, 'fieldtype_id','id');
    }
}
