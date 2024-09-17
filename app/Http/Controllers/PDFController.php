<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Example Generate PDF',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        // lokasi file pdf rosource/views/pdf

        $pdf = Pdf::loadView('pdf', $data);

        return $pdf->download('test.pdf');
    }
}
