<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaRating extends Model
{
    use HasFactory;

    protected $table = 'criteriaratings';
    protected $fillable = [
        'criteria_id',
        'rating',
        'description',
    ];
}