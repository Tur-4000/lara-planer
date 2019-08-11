<?php

namespace App\Http\Controllers\Planer\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Planer\BaseController;

abstract class AdminBaseController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        //
    }
}
