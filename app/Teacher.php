<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','state','city','locality','subject_tution','experience','language_medium','message'];
    
    public function user() {
         return $this->belongsTo('App\User', 'user_id');
    }
}
