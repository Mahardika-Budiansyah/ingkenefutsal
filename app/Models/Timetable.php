<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetables';

    protected $fillable = [
        'name',
    ];

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'field_timetable', 'timetable_id', 'field_id');
    }
}
