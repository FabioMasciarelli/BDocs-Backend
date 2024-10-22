<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'duration'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'sponsorship_doctor')
                    ->withPivot('start_date', 'end_date');
                  
    }
}
