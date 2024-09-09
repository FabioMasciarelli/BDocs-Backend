<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'guest_name', 'guest_mail', 'review'];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
}
