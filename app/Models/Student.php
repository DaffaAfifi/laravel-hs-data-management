<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'students';
    protected $fillable = [
        'name',
        'gender',
        'nim',
        'class_id',
        'image',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id',
        'extracurricular_id');
    }
}
