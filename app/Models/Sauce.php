<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    use HasFactory;
    protected $primaryKey="idSauce";
    protected $fillable=["idSauce","userId", "name", "manufacturer", "description", "mainPepper", "imageURL", "heat",
    "likes", "dislikes", "userLiked", "userDisliked"];

    public function utilisateur() {return $this->belongsTo('App\Utilisateur');}
}
