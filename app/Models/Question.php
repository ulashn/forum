<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    public function getRouteKeyName(){
        return 'slug';
    }

    protected $guarded = [];
    //Every question belongs to some user. (One user has many questions -> Many to one)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Every question can have one or more replies (One to many)
    public function replies(){
        return $this->hasMany(Reply::class);
    }

    //Every category can have any number of questions inside it
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute(){
        return asset("api/question/$this->slug");
    }
}
