<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $fillable =[
        'nama','prioritas',
    ];
    public function complaint(){
        $this->hasMany(Complaint::class);
    }
}
