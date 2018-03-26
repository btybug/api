<?php

namespace BtyBugHook\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhpJsonParser;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getRequested()
    {
        return view('bty_api::index', compact(''));
    }

    public function getApproved()
    {
        return view('bty_api::approved', compact(''));
    }

    public function getManage()
    {
        return view('bty_api::manage', compact(''));
    }
}