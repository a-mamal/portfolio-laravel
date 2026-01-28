<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    /** @use HasFactory<\Database\Factories\DegreeFactory> */
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'issuer_id',
        'title',
        'level',
        'field',
        'start_date',
        'end_date',
        'grade',
        'image',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function issuer()
    {
        return $this->belongsTo(Issuer::class);
    }
}
