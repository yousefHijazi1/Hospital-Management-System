<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'start_time',
        'end_time'
    ];

    use HasFactory;
}
