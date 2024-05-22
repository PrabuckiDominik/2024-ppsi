<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'gender',
        'phoneNumber',
        'country',
        'city',
        'zipCode',
        'street',
        'buildingName',
        'apartmentNumber',
        'position_id',
        'dateOfBirth',
        'hireDate'
    ];
}
