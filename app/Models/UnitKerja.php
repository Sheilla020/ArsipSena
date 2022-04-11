<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function arsip()
    {
        return $this->hasMany(ArsipSena::class, 'unit_kerja_id');
    }

    // public function category()
    // {
    //     return $this->hasMany(Category::class, 'id');
    // }

    public function user()
    {
        return $this->hasMany(User::class, 'unit_kerja_id');
    }
}
