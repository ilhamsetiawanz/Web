<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'id_penyakit',
        'answer_log', //Log Jawaban atau Gejala Yang Dipilih
    ];

    protected $casts = [
        'answer_log' => 'json', //TIPE DATA JSON
    ];

    public function user()
    {
        // One To Many
        return $this->belongsTo(User::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(DataPenyakit::class);
    }
    public function getAnswerLogAttribute($value)
    {
        return json_decode($value);
    }

    public function setAnswerLogAttribute($value)
    {
        $this->attributes['answer_log'] = json_encode($value);
    }
}
