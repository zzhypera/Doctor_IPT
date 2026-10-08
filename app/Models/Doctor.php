<?php

namespace App\Models;
use App\Models\Appointment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'email',
        'phone'
    ];

    public function appointments() {
     return $this->hasMany(Appointment::class);
    }
}
