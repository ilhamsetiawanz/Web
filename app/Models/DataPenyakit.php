<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class DataPenyakit extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'KdPenyakit',
        'NamaPenyakit',
        'reason',
        'solution',
        'image'
    ];
    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/asset/dataPenyakit/' . $image),
        );
    }
    public function gejala()
    {
        return $this->belongsToMany(DataGejala::class, 'rule', 'penyakit_id', 'gejala_id');
    }

    public function rule()
    {
        return $this->hasMany(Rule::class);
    }
    public function diagnosa()
    {
        return $this->hasMany(Report::class);
    }
}
