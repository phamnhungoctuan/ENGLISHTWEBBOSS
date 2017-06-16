<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'pt32_news';
    protected $guarded = [];

    public function category() {
    	return $this->belongsTo('App\Category');
    }

    public function news() {
    	return $this->belongsTo('App\User');
    }
}
