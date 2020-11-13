<?php

namespace App\Http\Controllers\Influ;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function request() 
    {
      return view('influ.request.index');
      
      
    }
}
