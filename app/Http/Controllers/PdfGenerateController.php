<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuti;
use PDF;

class PdfGenerateController extends Controller
{
    public function generatePDF($id)
    {
    	$data = Cuti::findOrFail($id);

    	$view = view('notifications.cuti_approved',compact('data'));

    		$pdf = PDF::loadView('notifications.cuti_approved',compact('data'));

    		return $pdf->stream('cuti_approved.pdf');

    	return view('notifications.cuti_approved');

    }
}
