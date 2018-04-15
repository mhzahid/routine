<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use File;
// use App\importFile;
// use App\infoInsert;
use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class importfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function display(Request $request)
    {
        $day = '';
        $time = '';
        $cld = array();
        if ($request->hasFile('file')) {
            $request->validate([

                'file' => 'required|mimes:xlsx,xls,csv',
            ]);
            $file = $request->file('file');
            $fullName  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $fileName = explode('.'.$extension,$fullName);



            $destinationPath = public_path('/files');
            $file -> move($destinationPath,$fullName);

            $table = $fileName[0];

            Schema::create($table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('room',10);
                $table->string('subcode',15);
                $table->string('teacher',8);
                $table->text('time');
                $table->string('day',20);
            });

            $data = Excel::load('public/files/'.$fullName, function ($reader)
            {
                 
            })->get();


            foreach ($data as $value) {
                
                foreach ($value as $inData) {
                    
                    if ($inData == 'Saturday' || $inData == 'Sunday' || $inData == 'Monday' || $inData == 'Tuesday' || $inData == 'Wednesday' || $inData == 'Thursday' ) {

                        $day = $inData;
                    }
                    else{
                        
                        if ($inData == '08:30-10:00' || $inData == '10:00-11:30' || $inData == '11:30-1:00' || $inData == '1:00-2:30' || $inData == '2:30-4:00' || $inData == '4:00-5:30') {
                            $time = $inData;
                        }
                        else{
                            // var_dump($inData);
                            $len = count($cld);

                            if ($len<3) {
                                if ($inData !== NULL) {
                                    if (in_array($inData, $cld) == false) {
                                        array_push($cld, $inData);
                                    }
                                }
                                $len = count($cld);
                            }

                            if ($len==3 ) {
                                // dump($cld);
                                if ($cld[2] !== NULL) {
                                    if (in_array("Class",$cld) || in_array("Class1",$cld) || in_array("Class2",$cld) || in_array("Class3",$cld) || in_array("Class4",$cld) || in_array("Class5",$cld) || in_array("Class6",$cld) || in_array("Course",$cld) || in_array("Course1",$cld) || in_array("Course2",$cld) || in_array("Course3",$cld) || in_array("Course4",$cld) || in_array("Course5",$cld) || in_array("Course6",$cld)) {
                                        // just escape these value from storing.
                                    }
                                    else{

                                        DB::table($table)->insertGetId([
                                                    'room' => $cld[0],'subcode' => $cld[1],'teacher' => $cld[2],'time' => $time,'day' => $day
                                                    ]);
                                    }
                                }
                                
                                $cld = array();
                            }

                        }
                                                
                    }

                }
            }

             return back()->with('success', 'Routine uploaded successfully.');
        }

        return back()->with('failed', 'Error ! It seems that no file is select to upload.');
        
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
