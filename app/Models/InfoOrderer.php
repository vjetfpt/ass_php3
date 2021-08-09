<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoOrderer extends Model
{
    use HasFactory;
    public $table= "info_orderers";
    public $primaryKey= "id";
    protected $fillable=[
        'full_name',
        'phone',
        'address',
        'email',
        'note',
    ];
    public function orders(){
        return $this->hasMany(Order::class,'info_orderer_id','id');
    }
}
