<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = 'articles';
    public $primaryKey = 'id';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function comment() {
        return $this->hasMany('App\Models\Comment');
    }

}
