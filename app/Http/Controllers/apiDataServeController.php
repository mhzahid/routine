<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\routineCollection;
use App\routineData;
use DB;

class apiDataServeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tb = '';
        $db_key = '';
        $key = '';

        if ($request->has('key')) {
            $key = $request->input('key');
        }

        if ($request->has('key') && $request->input('key') == null) {
            $er = array(
                'message' => 'Invalid api key. To get your own visit http://www.mhzahid.tk/get_api',
            );

            return response()->json($er,401)->header('Connection', 'close');
        }
        elseif (!empty($key)){

            if ($request->input('sbj1') == null && $request->input('sbj2') == null && $request->input('sbj3') == null && $request->input('sbj4') == null && $request->input('sbj5') == null) {

                $er = array(
                    'response' => '404',
                    'message' => 'Not Found',
                    'author_url' => url('http://mhzahid.tk/team'),
                );
                $data = [];

                $data['data'] = [$er];

                return response()->json($data,404)->header('Connection', 'close');
            } 
            else {

                $k = DB::table('api_key')->select('api_token')->where('api_token',$key)->get();

                foreach ($k as $key => $value) {
                    $db_key = $value->api_token;
                }
                
                if ($key == $db_key) {
                    $request->validate([

                        'sbj1' => 'string|nullable',
                        'sbj2' => 'string|nullable',
                        'sbj3' => 'string|nullable',
                        'sbj4' => 'string|nullable',
                        'sbj5' => 'string|nullable',
                    ]);

                    $tbrs = DB::table('tb_routine_list')->select('tb_name')->orderBy('id','desc')->limit(1)->get();

                    foreach ($tbrs as $key => $value) {
                        $tb = $value->tb_name;
                    }

                    $rd = new routineData;
                    $rd->setTable($tb);


                    if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2')) && $request->has('sbj3') && !empty($request->input('sbj3')) && $request->has('sbj4') && !empty($request->input('sbj4')) && $request->has('sbj5') && !empty($request->input('sbj5'))) {
                        $sbj1 = strtoupper($request->input('sbj1'));
                        $sbj2 = strtoupper($request->input('sbj2'));
                        $sbj3 = strtoupper($request->input('sbj3'));
                        $sbj4 = strtoupper($request->input('sbj4'));
                        $sbj5 = strtoupper($request->input('sbj5'));
                        
                        $rs = $rd->select('room','subcode','teacher','time','day')->where('subcode','LIKE', '%'.$sbj1.'%')->orWhere('subcode','LIKE', '%'.$sbj2.'%')->orWhere('subcode','LIKE', '%'.$sbj3.'%')->orWhere('subcode','LIKE', '%'.$sbj4.'%')->orWhere('subcode','LIKE', '%'.$sbj5.'%')->orderBy('id')->get();

                        return new routineCollection($rs);
                    }

                    if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2')) && $request->has('sbj3') && !empty($request->input('sbj3')) && $request->has('sbj4') && !empty($request->input('sbj4'))) {
                        $sbj1 = strtoupper($request->input('sbj1'));
                        $sbj2 = strtoupper($request->input('sbj2'));
                        $sbj3 = strtoupper($request->input('sbj3'));
                        $sbj4 = strtoupper($request->input('sbj4'));
                        
                        $rs = $rd->select('room','subcode','teacher','time','day')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->orWhere('subcode','LIKE', "%$sbj4%")->get();

                        return new routineCollection($rs);

                    }

                    if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2')) && $request->has('sbj3') && !empty($request->input('sbj3'))) {
                        $sbj1 = strtoupper($request->input('sbj1'));
                        $sbj2 = strtoupper($request->input('sbj2'));
                        $sbj3 = strtoupper($request->input('sbj3'));
                        
                        $rs = $rd->select('room','subcode','teacher','time','day')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->orWhere('subcode','LIKE', "%$sbj3%")->get();
                        
                        return new routineCollection($rs);
                    }
                    
                    if ($request->has('sbj1') && !empty($request->input('sbj1')) && $request->has('sbj2') && !empty($request->input('sbj2'))) {
                        $sbj1 = strtoupper($request->input('sbj1'));
                        $sbj2 = strtoupper($request->input('sbj2'));
                        
                        $rs = $rd->select('room','subcode','teacher','time','day')->where('subcode','LIKE', "%$sbj1%")->orWhere('subcode','LIKE', "%$sbj2%")->get();

                        return new routineCollection($rs);
                    }

                    if ($request->has('sbj1') && !empty($request->input('sbj1'))) {
                        
                        $sbj1 = strtoupper($request->input('sbj1'));

                        $rs = $rd->select('room','subcode','teacher','time','day')->where('subcode','LIKE', "%$sbj1%")->get();

                        return new routineCollection($rs);
                    }

                    $er = array(
                        'response' => '404',
                        'message' => 'Not Found',
                        'author_url' => url('http://mhzahid.tk/team'),
                    );
                    $data = [];

                    $data['data'] = [$er];

                    return response()->json($data,404)->header('Connection', 'close');

                } else {
                    $er = array(
                        'response' => '401',
                        'message' => 'Invalid api key.',
                        'author_url' => url('http://mhzahid.tk/team'),
                    );

                    return response()->json($er,401)->header('Connection', 'close');
                }
                

            }
        }

        $er = 'Hey, you are in wrong way. If you don\'t have any api key, you can get one from http://www.mhzahid.tk/get_api';

        return response()->json($er,400)->header('Connection', 'close');
    }

}
