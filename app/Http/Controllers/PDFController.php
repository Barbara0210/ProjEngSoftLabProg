<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;


class PDFController extends Controller
{


    public function generatePDF()
    {
        $user=User::all();
        
        $data = [
            'users'=>$user,
            'title' => 'Lista de Utilizadores',
            'date' => date('d/m/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('myPDF.pdf');
    }
}
