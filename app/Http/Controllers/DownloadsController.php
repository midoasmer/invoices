<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function download($invoiceId,$attachName) {
        //return "invoice : ".$invoiceId."      attach : ".$attachName;
        $file_path = public_path('Attachments/'.$invoiceId.'/'.$attachName);
        return response()->download($file_path);
    }

    public function openFile($invoiceId,$attachName)

    {
        $files = public_path('Attachments/'.$invoiceId.'/'.$attachName);
        return response()->file($files);
    }
}
