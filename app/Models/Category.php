<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function arsip()
    {
        return $this->hasMany(ArsipSena::class, 'category_id');
    }

    // public function unit()
    // {
    //     return $this->belongsTo(UnitKerja::class, 'unit_id');
    // }
}
