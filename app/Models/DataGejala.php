<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class DataGejala extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'jenis_gejala'
    ]; // Data yang dapat di isi
    /**
     * image
     *
     * @return Attribute
     */
    
    //  Gambar
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/asset/dataGejala/' . $image),
        );
    }
    public function rule()
    {
        // Many to Many
        return $this->hasMany(Rule::class);
    }
}
