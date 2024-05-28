<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileDownloadController extends Controller
{
    public function downloadresume()
    {
    return response()->download(public_path() . '/assets/images/comingsoon.jpeg');
    }

    public function downloadcv()
    {
        return response()->download(public_path() . '/assets/images/comingsoon.jpeg');

    }
}
