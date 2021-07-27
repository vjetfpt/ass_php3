<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'image'
    ];
    public function tours(){
        return $this->hasMany(Tour::class,'category_id','id');
    }
}
