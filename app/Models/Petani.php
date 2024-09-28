<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'AlamatPetani',
        'kota',
        'provinsi',
        "idUsers"
    ];

    public function idPetani() {
        return $this->hasOne(Petani::class, 'idUsers', 'id');   
    }
}
