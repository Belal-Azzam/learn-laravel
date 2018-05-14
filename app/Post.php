<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
    //
    //exist by default
//    protected $table = 'posts';
//    protected $primaryKey = 'post_id'



    protected $fillable = [

        'title',
        'content',
//        'user_id'

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){


        return $this->morphMany('App\Photo', 'imageable');

    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }


}
