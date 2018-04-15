<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class routineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tb = DB::table('tb_routine_list')->orderBy('id','desc')->limit(1)->get();
        // return view('newview',['drtb' => $tb]);
        return view('newview');
    }


    public function getSection(Request $request)
    {
        $tableName = '';
        $sc = array();

        $subCode = array_fill(0, 6, '');

        if (!empty($request->get_option)) {

            $tb = DB::table('course_tb_list')->select('tb_name')->orderBy('id','desc')->limit(1)->get();

            foreach ($tb as $key => $t) {
                $tableName = $t->tb_name;
            }

            $section = DB::table($tableName)->select('SECTION')->where('LEVEL_&_TERM',$request->get_option)->distinct()->get();

            foreach ($section as $key => $sec) {
                $secName = $sec->SECTION;
            }

            $sectionName = explode(', ',$secName);

            $courseCode = DB::table($tableName)->select('COURSE_CODE')->where('LEVEL_&_TERM',$request->get_option)->where('COURSE_CREDIT','>','2')->distinct()->get();


            foreach ($courseCode as $key => $cc) {
                array_push($sc, $cc->COURSE_CODE);
            }

            $len = count($sc);
            for ($i=0; $i < $len ; $i++) { 
                if ($subCode[$i] == '') {
                    $subCode[$i] = $sc[$i];
                }
            }

        } else {
            $sectionName = '';
        }
        

        return response()->json(array('sectionName' => $sectionName, 'subCode' => $subCode));
    }



    public function getRoutine(Request $request)
    {
        if ($request->subcd[0] == '' && $request->subcd[1] == '' && $request->subcd[2] == '' && $request->subcd[3] != '' && $request->subcd[4] == '' || empty($request->subcd[0]) && empty($request->subcd[1]) && empty($request->subcd[2]) && empty($request->subcd[3]) && empty($request->subcd[4])) {

            $er = "Error! You may modified the value. Please don't do this again.";

            return response()->json(['er' => $er]);
        } 
        else {
            $ln = count($request->subcd);

            for ($i=0; $i < $ln; $i++) {

                if (!preg_match('/^[a-zA-Z]{2,3}[0-9]{3}[a-zA-Z]{1}||$/',$request->subcd[$i])) {

                    return back()->with('failed','!! Error !! Subject code is incorrect.');
                }
            }
            

            $tab = DB::table('tb_routine_list')->orderBy('id','desc')->limit(1)->get();

            foreach ($tab as $key => $value) {
                $tb = $value->tb_name;
            }

            if ($request->subcd[0] != '' && $request->subcd[1] != '' && $request->subcd[2] != '' && $request->subcd[3] != '' && $request->subcd[4] != '') {

                $sbj1 = strtoupper($request->subcd[0]);
                $sbj2 = strtoupper($request->subcd[1]);
                $sbj3 = strtoupper($request->subcd[2]);
                $sbj4 = strtoupper($request->subcd[3]);
                $sbj5 = strtoupper($request->subcd[4]);

                
                $rs = DB::table($tb)->where('subcode','LIKE', '%'.$sbj1.'%')->orWhere('subcode','LIKE', '%'.$sbj2.'%')->orWhere('subcode','LIKE', '%'.$sbj3.'%')->orWhere('subcode','LIKE', '%'.$sbj4.'%')->orWhere('subcode','LIKE', '%'.$sbj5.'%')->orderBy('id')->get();

                return response()->json($rs);
            }

            if ($request->subcd[0] != '' && $request->subcd[1] != '' && $request->subcd[2] != '' && $request->subcd[3] != '') {

                $sbj1 = strtoupper($request->subcd[0]);
                $sbj2 = strtoupper($request->subcd[1]);
                $sbj3 = strtoupper($request->subcd[2]);
                $sbj4 = strtoupper($request->subcd[3]);
                
                $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->orWhere('subcode','LIKE', "%$sbj4%")->get();

                return response()->json($rs);

            }

            if ($request->subcd[0] != '' && $request->subcd[1] != '' && $request->subcd[2] != '') {
                $sbj1 = strtoupper($request->subcd[0]);
                $sbj2 = strtoupper($request->subcd[1]);
                $sbj3 = strtoupper($request->subcd[2]);
                
                $rs = DB::table($tb)->orderBy('id')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->get();
                
                return response()->json($rs);
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
