<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table= "orders";
    public $primaryKey= "id";
    protected $fillable=[
        'total_price',
        'amount_person',
        'departure_time',
        'tour_id',
        'info_orderer',
        'user_id'
    ];
    public function infoOrder(){
        return $this->belongsTo(InfoOrderer::class,'info_orderer_id','id');
    }
    public function tour(){
        return $this->belongsTo(Tour::class,'tour_id','id');
    }
}
