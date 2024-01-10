<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentHistory extends Model
{
    protected $table = 'history';
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
