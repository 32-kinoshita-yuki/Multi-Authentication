<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
     //テーブル名
     protected $table = 'admin_profiles'; //テーブルとclass admin_profilesを紐づける
    //可変項目
    protected $fillable =
    [
      'email',
      'tell',
      'name',
      'address',
      'name_company',
      'url_company',
      'url_pr',
      'body_pr',
      'price'
      
    ];
}
