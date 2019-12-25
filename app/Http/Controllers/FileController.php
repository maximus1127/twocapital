<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Storage;
use App\Http\Controllers\Controller;

class FileController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get($file)
    {
        return Storage::disk('private')->get($file);
    }

 }
