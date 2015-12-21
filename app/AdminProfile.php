<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['state','city','locality','message'];
    
    public function user() {
         return $this->belongsTo('App\User', 'user_id');
    }
}
