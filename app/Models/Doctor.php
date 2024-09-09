<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['photo', 'phone_number', 'studio_address', 'CV', 'performance'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function specializations() {
        return $this->belongsToMany(Specialization::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function ratings() {
        return $this->belongsToMany(Rating::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class, 'sponsorship_doctor')
                    ->withPivot('start_date', 'end_date');
                  
    }
}
