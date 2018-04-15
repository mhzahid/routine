<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class pdfGenerateControllerTwo extends Controller
{
    public function index()
    {
    	$sbj1 = $sbj2 = $sbj3 =$sbj4 = $sbj5 = $tb ='';
      if (session()->has('tb')) {
        $tb = session()->get('tb');
        $pdfName = ucwords($tb);
      }
    	if (session()->has('sbj1')) {
    		$sbj1 = session()->get('sbj1');
    	}
    	if (session()->has('sbj2')) {
    		$sbj2 = session()->get('sbj2');
    	}
    	if (session()->has('sbj3')) {
    		$sbj3 = session()->get('sbj3');
    	}
    	if (session()->has('sbj4')) {
    		$sbj4 = session()->get('sbj4');
    	}
    	if (session()->has('sbj5')) {
    		$sbj5 = session()->get('sbj5');
    	}
       if ($sbj1 == null && $sbj2 == null && $sbj3 == null && $sbj4 == null && $sbj5 == null) {
           return redirect('rtn')->with('failed','Sorry!! PDF can\'t generate without correct subject code. Or,your time is up. Please, enetr subject code below again to generate PDF.');
       } 
       else {

           if (!empty($sbj1) && !empty($sbj2) && !empty($sbj3) && !empty($sbj4) && !empty($sbj5)) {
               
               $rs = DB::table($tb)->where('subcode','LIKE', '%'.$sbj1.'%')->orWhere('subcode','LIKE', '%'.$sbj2.'%')->orWhere('subcode','LIKE', '%'.$sbj3.'%')->orWhere('subcode','LIKE', '%'.$sbj4.'%')->orWhere('subcode','LIKE', '%'.$sbj5.'%')->orderBy('id')->get();

               $view = view('pdfRoutine2 ',['sblist'=>$rs]);

               $pdf = PDF::loadView('pdfRoutine2 ', ['sblist'=>$rs]);
               return $pdf->download($pdfName.'.pdf');
           }

           if (!empty($sbj1) && !empty($sbj2) && !empty($sbj3) && !empty($sbj4)) {
               
               $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->orWhere('subcode','LIKE', "%$sbj4%")->get();
               
               $view = view('pdfRoutine2 ',['sblist'=>$rs]);

               $pdf = PDF::loadView('pdfRoutine2 ', ['sblist'=>$rs]);
               return $pdf->download($pdfName.'.pdf');

               // return view('pdfRoutine2 ',['sblist'=>$rs]);

           }

           if (!empty($sbj1) && !empty($sbj2) && !empty($sbj3)) {
               
               $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->get();
               
               $view = view('pdfRoutine2 ',['sblist'=>$rs]);

               $pdf = PDF::loadView('pdfRoutine2 ', ['sblist'=>$rs]);
               return $pdf->download($pdfName.'.pdf');
           }
          
           if (!empty($sbj1) && !empty($sbj2)) {
               
               $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->get();
               
               $view = view('pdfRoutine2 ',['sblist'=>$rs]);

               $pdf = PDF::loadView('pdfRoutine2 ', ['sblist'=>$rs]);
               return $pdf->download($pdfName.'.pdf');
           }

           if (!empty($sbj1)) {
               
               $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->get();

               $view = view('pdfRoutine2 ',['sblist'=>$rs]);

               $pdf = PDF::loadView('pdfRoutine2 ', ['sblist'=>$rs]);
               return $pdf->download($pdfName.'.pdf');
               
               // return view('pdfRoutine2 ',['sblist'=>$rs]);
           }

       }
    }
}
