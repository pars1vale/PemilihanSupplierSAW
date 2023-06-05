<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;
    protected $table = 'alternatives';
    protected $fillable = ['id_supplier'];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
}
