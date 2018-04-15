<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\validateDropdown;
use DB;
use PDF;
use Location;

class routineGenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ip = \Request::getClientIp(true);/*have to store this ip address and it info in database*/
         $ip = '103.85.241.42';
        $this::VisitorInfo($ip);

        $tables = DB::table('tb_routine_list')->select('tb_name')->orderBy('id','desc')->limit(3)->get();

        $total_hits = DB::table('tb_count_visitor')->get();

        if (session()->has('modal')) {
             session()->put('modal','DontDisplay');
        }
        else{
             session()->put('modal','Display');
        }

        return view('routine',['opt' => $tables, 'total_hits' => $total_hits]);
    }



    /*
    Below function return Null;
    It store information of site user into database;
    */
    public function VisitorInfo($ip_address)
    {
        $result = '';
        $tab = 'visitor_info';
        $position = Location::get($ip_address);

        $stored = DB::table($tab)->where('ip',$ip_address)->get();

        foreach ($stored as $key => $ip_info) {
            $result = $ip_info->ip;
            $visit = $ip_info->total_visit;
        }

        if (!empty($result)) {

            $new_visit = $visit+1;
            DB::table($tab)->where('ip',$result)->update(['last_visit' => now(), 'total_visit'=>$new_visit]);
            
        } else {
            DB::table($tab)->insertGetId(
                ['ip' => $ip_address, 'countryName' => $position->countryName, 'countryCode' => $position->countryCode, 'cityName' => $position->cityName, 'postalCode' => $position->postalCode, 'latitude_longitude' => $position->latitude.','.$position->longitude, 'first_visit' => now(), 'last_visit' => now(), 'total_visit' => 1]
            );
        }
                
    }


    public function error()
    {
        return redirect('rtn')->with('failed','Error, Please fill the form below with your subject code to get your Routine.');
    }


    public function shw(Request $request)
    {
        $current_count = '';

        if (empty($request->input('slrtnm')) && $request->input('sbj1') == null && $request->input('sbj2') == null && $request->input('sbj3') == null && $request->input('sbj4') == null && $request->input('sbj5') == null) {
            return back()->with('failed','Form appears to be blank. Please write your correct subject code to get your Routine.');
        } 
        else {
            $request->validate([

                'slrtnm' => ['required',new validateDropdown],
                'sbj1' => 'string|nullable',
                'sbj2' => 'string|nullable',
                'sbj3' => 'string|nullable',
                'sbj4' => 'string|nullable',
                'sbj5' => 'string|nullable',
            ]);


            $vs = DB::table('tb_count_visitor')->get();

            foreach ($vs as $key => $data) {
                $current_count = $data->visited;
            }

            $new_count = $current_count+1;
            DB::table('tb_count_visitor')->where('visited',$current_count)->update(['visited'=>$new_count]);
                // dd($new_count);


            $tb = $request->input('slrtnm');
            session()->put('tb',$tb);

            if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2')) && $request->has('sbj3') && !empty($request->input('sbj3')) && $request->has('sbj4') && !empty($request->input('sbj4')) && $request->has('sbj5') && !empty($request->input('sbj5'))) {
                $sbj1 = strtoupper($request->input('sbj1'));
                $sbj2 = strtoupper($request->input('sbj2'));
                $sbj3 = strtoupper($request->input('sbj3'));
                $sbj4 = strtoupper($request->input('sbj4'));
                $sbj5 = strtoupper($request->input('sbj5'));

                session()->put('sbj1',$sbj1);
                session()->put('sbj2',$sbj2);
                session()->put('sbj3',$sbj3);
                session()->put('sbj4',$sbj4);
                session()->put('sbj5',$sbj5);
                
                $rs = DB::table($tb)->where('subcode','LIKE', '%'.$sbj1.'%')->orWhere('subcode','LIKE', '%'.$sbj2.'%')->orWhere('subcode','LIKE', '%'.$sbj3.'%')->orWhere('subcode','LIKE', '%'.$sbj4.'%')->orWhere('subcode','LIKE', '%'.$sbj5.'%')->orderBy('id')->get();

                return view('finalRoutine',['sblist'=>$rs]);
            }

            if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2')) && $request->has('sbj3') && !empty($request->input('sbj3')) && $request->has('sbj4') && !empty($request->input('sbj4'))) {
                $sbj1 = strtoupper($request->input('sbj1'));
                $sbj2 = strtoupper($request->input('sbj2'));
                $sbj3 = strtoupper($request->input('sbj3'));
                $sbj4 = strtoupper($request->input('sbj4'));

                session()->put('sbj1',$sbj1);
                session()->put('sbj2',$sbj2);
                session()->put('sbj3',$sbj3);
                session()->put('sbj4',$sbj4);
                session()->put('sbj5','');
                
                $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->orWhere('subcode','LIKE', "%$sbj4%")->get();

                return view('finalRoutine',['sblist'=>$rs]);

            }

            if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2')) && $request->has('sbj3') && !empty($request->input('sbj3'))) {
                $sbj1 = strtoupper($request->input('sbj1'));
                $sbj2 = strtoupper($request->input('sbj2'));
                $sbj3 = strtoupper($request->input('sbj3'));

                session()->put('sbj1',$sbj1);
                session()->put('sbj2',$sbj2);
                session()->put('sbj3',$sbj3);
                session()->put('sbj4','');
                session()->put('sbj5','');
                
                $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->get();
                
                return view('finalRoutine',['sblist'=>$rs]);
            }
           
            if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2'))) {
                $sbj1 = strtoupper($request->input('sbj1'));
                $sbj2 = strtoupper($request->input('sbj2'));

                session()->put('sbj1',$sbj1);
                session()->put('sbj2',$sbj2);
                session()->put('sbj3','');
                session()->put('sbj4','');
                session()->put('sbj5','');
                
                $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->get();
                
                return view('finalRoutine',['sblist'=>$rs]);
            }

            if ($request->has('sbj1') && !empty($request->input('sbj1'))) {
                
                $sbj1 = strtoupper($request->input('sbj1'));

                // dd($sbj1);

                session()->put('sbj1',$sbj1);
                session()->put('sbj2','');
                session()->put('sbj3','');
                session()->put('sbj4','');
                session()->put('sbj5','');

                $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->get();
                
                return view('finalRoutine',['sblist'=>$rs]);
            }

            return back()->with('failed','!! Error !!');

        }
        
    }

    public function shw2()
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

                   return view('finalRoutine2',['sblist'=>$rs]);
               }

               if (!empty($sbj1) && !empty($sbj2) && !empty($sbj3) && !empty($sbj4)) {
                   
                   $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->orWhere('subcode','LIKE', "%$sbj4%")->get();
                   
                   return view('finalRoutine2',['sblist'=>$rs]);

               }

               if (!empty($sbj1) && !empty($sbj2) && !empty($sbj3)) {
                   
                   $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->get();
                   
                   return view('finalRoutine2',['sblist'=>$rs]);
               }
              
               if (!empty($sbj1) && !empty($sbj2)) {
                   
                   $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->get();
                   
                   return view('finalRoutine2',['sblist'=>$rs]);
               }

               if (!empty($sbj1)) {
                   
                   $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->get();

                   return view('finalRoutine2',['sblist'=>$rs]);
               }

           }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
