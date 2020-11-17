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
      'workid',
      'adminid',
      'influid',
      'sns_kind1',
      'sns_kind2',
      'sns_kind3',
      'sns_kind4',
      'pr',
      'pr_price',
      'p_sns_kind1',
      'p_sns_kind2',
      'p_sns_kind3',
      'p_sns_kind4',
      'registr_date',
      'contract_date',
      'completion_date',
      'status'
    ];
}
