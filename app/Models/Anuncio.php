<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable =['titulo','preco','estado','descricao'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
   // public function photos(){
    //    return $this->hasMany(Photo::class,'photo_id','id');
   // }

    
}// caso estejam a ser atacados ele ia se proteger nao enviando mais campos
