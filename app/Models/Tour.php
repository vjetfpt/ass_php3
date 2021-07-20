<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = "tours";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'description',
        'price',
        'travel_day',
        'schedule',
        'departure_place',
        'category_id'
    ];
}