<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    public $incrementing = false; // Nonaktifkan auto-increment untuk UUID
    protected $keyType = 'string'; // Ubah tipe kunci utama menjadi string (UUID)

    protected $fillable = [
        'id', // Tambahkan 'id' dalam fillable jika ingin mengatur UUID secara manual
        'judul',
        'slug',
        'image',
        'content',
        'Tanggal_Post'
    ];

    // Event untuk membuat UUID secara otomatis saat artikel dibuat
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            // Generate UUID jika tidak ada
            if (!$artikel->id) {
                $artikel->id = (string) Str::uuid();
            }
            // Generate slug dari judul
            $artikel->slug = Str::slug($artikel->judul);
        });

        static::updating(function ($artikel) {
            // Update slug jika judul berubah
            $artikel->slug = Str::slug($artikel->judul);
        });
    }
}
