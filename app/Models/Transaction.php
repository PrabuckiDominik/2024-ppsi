<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    protected $fillable = [
        'material_id',
        'pricePerUnit',
        'quantity',
        'type'
    ];
}
