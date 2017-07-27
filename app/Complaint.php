<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable =[
        'description','answer', 'feedback',
    ];
    public function kategori(){
        return $this->belongsTo(kategori::class,'catagory_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
