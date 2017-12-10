<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadFileController extends Controller
{
    //

    public function getDownload()
    {
              $file= public_path(). '\files\funcionalidades.pdf';
            $headers = [
                  'Content-Type' => 'application/pdf',
               ];

                return response()->download($file, 'funcionalidades.pdf', $headers);
    }
    public function getPcmovel()
    {
              $file= public_path(). '\files\pcmovel.jpg';
            $headers = [
                  'Content-Type' => 'jpg',
               ];

               return response()->file($file,$headers );
    }
    public function getCars()
    {
              $file= public_path(). '\files\teste.jpg';
            $headers = [
                  'Content-Type' => 'jpg',
               ];

               return response()->file($file,$headers );
    }


}
