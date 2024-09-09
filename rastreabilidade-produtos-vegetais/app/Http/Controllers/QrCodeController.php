<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    public function show(){

    
            $qrcode = QrCode::format('svg')->size(200)->generate('127.0.0.1:8000/');

            // Define the file path
            $filePath = 'img/qrcode';
    
            // Store the QR code in the storage
            Storage::disk('local')->put($filePath, $qrcode);



            // Return a response or view
            return redirect('/');

}

}
