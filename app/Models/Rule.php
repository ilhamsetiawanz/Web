<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $fillable = [
        'KdPenyakit',
        'KdGejala',
    ];

    public function KdPenyakit(){
        return $this->belongsToMany(DataPenyakit::class);
    }
    public function KdGejala(){
        return $this->belongsToMany(DataGejala::class);
    }
}
