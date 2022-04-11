<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ArsipSena extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];


    public function unit()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
