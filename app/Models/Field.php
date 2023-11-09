<?php

namespace App\Models;

use App\Models\Fieldtype;
use App\Models\Timetable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'fields';

    protected $fillable = [
        'name',
        'fieldtype_id',
        'description',
        'image',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function fieldtypes()
    {
        return $this->belongsTo(Fieldtype::class, 'fieldtype_id', 'id');
    }

    public function timetables()
    {
        return $this->belongsToMany(Timetable::class, 'field_timetable', 'field_id', 'timetable_id')->withPivot('price')->withTimestamps();
    }
}
