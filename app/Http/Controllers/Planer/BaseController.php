<?php

namespace App\Http\Controllers\Planer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //
    }
}
