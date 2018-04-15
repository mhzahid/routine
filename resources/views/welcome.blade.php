<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('public/css/app.css')}}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #select{
                color: #000 !important;
                font-weight: 500 !important;
            }
        </style>
    </head>
    <body>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if(session('failed'))
            <div class="alert alert-danger">
                {{session('failed')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                {{$errors}}
            </div>
        @endif

        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href="rtn">Find your Routine</a>
                </div>

           

            <div class="content">
                {!! Form::open(['url'=>'import','files' => true , 'method' => 'POST']) !!}
                    <div class="col-md-12 text-center">
                        <!-- <h2>Select Department</h2>
                        <select class="form-control" name="dept" id="select">
                            <option value="">---Select department---</option>
                            <option value="SWE">SWE</option>
                            <option value="CSE">CSE</option>
                        </select> -->
                        <h2>Upload your file</h2>
                        <input type="file" class="form-control" name="file">
                        <button class="btn btn-md btn-primary">Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </body>
</html>
