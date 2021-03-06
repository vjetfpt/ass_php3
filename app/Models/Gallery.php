<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = "gallerys";
    protected $fillable=[
        'link_image',
        'tour_id'
    ];
    public function tour(){
        return $this->belongsTo(Tour::class,'tour_id','id');
    }
}
