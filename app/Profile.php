<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     //テーブル名
     protected $table = 'profiles'; //テーブルとclass Profilesを紐づける
    //可変項目
    protected $fillable =
    [
      'name',
      'gender',
      'image_path',
      'age',
      'sns_kind',
      'sns_url',
      'sns_genre'
    ];
}
