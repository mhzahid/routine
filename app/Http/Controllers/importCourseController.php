<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use File;
use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class importCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('course_up');
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
        $cld = array();


        if ($request->hasFile('file')) {
            $request->validate([

                'file' => 'required|mimes:xlsx,xls,csv',
            ]);

            /*Grave the file name*/
            $file = $request->file('file');
            $fullName  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $fileName = explode('.'.$extension,$fullName);

            $destinationPath = public_path('/files');
            $file -> move($destinationPath,$fullName);


            session()->put('table',$fileName[0]);


            /*It will create table in database with auto column name which is in excle file header name. And table name will be uploaded file name.*/
            Excel::load('public/files/'.$fullName, function ($reader)
            {
                $tableIndex = array();

                $cellData = $reader->first();
                foreach ($cellData as $cellValue) {

                    if (!empty($cellValue)) {

                        if (in_array($cellValue, $tableIndex) == false) {
                            array_push($tableIndex, $cellValue);
                        }

                    }
                }

                session()->put('len', count($tableIndex));

                session()->put('tableIndex',$tableIndex);

                $table = session('table');

                if (Schema::hasTable($table)) {
                    session()->put('error','yes');
                }
                else{
                    Schema::create($table, function (Blueprint $table) {

                        foreach (session('tableIndex') as $key => $tableColumn) {
                            $table->text($tableColumn)->nullable($value = true);
                        }
                    });


                    DB::table('course_tb_list')->insertGetId(['tb_name' => $table]);
                }

            });


            if (session('error') != 'yes') {
                Excel::load('public/files/'.$fullName, function ($reader)
                {
                    $len = session('len');

                    $cldata = array();

                    $data = $reader->skipRows(1)->get();

                    foreach ($data as $value) {
                        
                        foreach ($value as $inData) {

                            $cd_len = count($cldata);

                            if ($cd_len<$len) {
                                
                                array_push($cldata, $inData);

                                $cd_len = count($cldata);
                            }

                            if ($cd_len == $len) {

                                if (!empty($cldata[0])) {
                                    $temp = $cldata[0];
                                }
                                else{
                                    $cldata[0] = $temp;
                                }

                                if (!empty($cldata[1])) {
                                    $temp1 = $cldata[1];
                                }
                                else{
                                    $cldata[1] = $temp1;
                                }

                                if (!empty($cldata[2])) {
                                    $temp2 = $cldata[2];
                                }
                                else{
                                    $cldata[2] = $temp2;
                                }

                                $table = session('table');

                                $column = DB::getSchemaBuilder()->getColumnListing($table);

                                // dd($column);

                                $dataSet = array();

                                $dataSet = array_combine($column, $cldata);

                                // dump($dataSet);

                                DB::table($table)->insert($dataSet);

                                $cldata = array();
                            }

                        }
                    }
                    
                });
                return redirect(url()->previous())->with('success', 'Routine uploaded successfully.');
            } else {
                session()->put('error','no');
                return redirect(url()->previous())->with('failed', 'Error! Table already exist.');
            }
             
        }

        else{
            return back()->with('failed', 'Error ! It seems that no file is select to upload.');
        }
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
