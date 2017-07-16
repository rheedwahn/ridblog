<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function users()
    {
    	return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id', 'avater', 'facebook', 'youtube', 'about'];
}
