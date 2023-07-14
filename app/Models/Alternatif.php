<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ALternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatif';

    protected $fillable = [
        'name',
        'stamina',
        'posture',
        'finishing',
        'dribbling',
        'header',
        'attitude',
        'indeks_vikor',
        'team_id',
        'image_path',
    ];
}
