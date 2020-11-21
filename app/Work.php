<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
     //テーブル名
    protected $table = 'works';
      //可変項目
    protected $fillable =
    [
      
      'pr',
      'pr_price',
     
    ];
}
