<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'name',
        'email',
        'birthDate',
        'department',
        'phone',
        'appointment-time',
        'message',
        'price'
    ];

    use HasFactory;
}
