<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'course',
        'year_level'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
