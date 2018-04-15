<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Exo:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>

        html,body{
            font-family: "Exo",sans-serif;
            font-weight: 400;
        }
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {min-height: 550px;margin-top: 50px;}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #056f65b3;
            height: 100%;
        }

        .navbar-nav{
            float: right;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {height: auto;margin-top: auto;} 
            .navbar-nav{
                float: none;
            }
        }

        #brand{
            margin-top: 0.7%;
            margin-bottom: .7%;
        }

        .u-profile{
            border-radius: 50%;
        }
        .u-account,.u-account>a{
            display: inline-block !important;
        }

        #overview .well{
            color: #fff;
            border: none;
        }

        #dash-head{
            background: #342542d6;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
        }

        #dash-head #version{
            text-align: right;
        }

        #overview>div:nth-child(1)>div{
            background-color: #347c92;
        }
        #overview>div:nth-child(2)>div{
            background-color: #8BC34A;
        }
        #overview>div:nth-child(3)>div{
            background-color: #737171;
        }
        #overview>div:nth-child(4)>div{
            background-color: #037b70;
        }

        .kwl{
            background: #00ACC1;
        }
        .kwl>p{
            margin: 0;
            color: #fff;
        }
        .kwl>p>span{
            font-size: 16px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><span><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;</span>Dashboard</a></li>
                    <li><a href="#section2"><span><img src="public/img/app.png" alt="" height="14" width="14">&nbsp;</span>Your App</a></li>
                    <li><a href="#section3"><span><i class="fa fa-cog" aria-hidden="true"></i></span>Setting</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-inverse navbar-fixed-top hidden-xs">
        <div class="container-fluid">
            <div class="navbar-header" id="brand">
                <a class="navbar-brand" href="#">Routine</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="u-account"><a href=""><img src="public/img/avatar.png" alt="" height="40" width="40" class="u-profile">&nbsp;MHZAHID</a><i class="fa fa-chevron-down" aria-hidden="true"></i></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
              <h2>Dashboard</h2>
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#section1"><span><i class="fa fa-eye-slash" aria-hidden="true"></i>&nbsp;</span>Overview</a></li>
                <li><a href="#section2"><span><img src="public/img/app.png" alt="" height="14" width="14">&nbsp;</span>Your App</a></li>
                <li><a href="#section3"><span><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;</span>Setting</a></li>
              </ul><br>
            </div>
        <br>

        <div class="col-sm-9">
          <div class="well" id="dash-head">
            <h4>Dashboard Overview</h4>
            <h5 id="version">Current Api version : 1.0.0</h5>
          </div>
          <div class="row" id="overview">
            <div class="col-sm-3">
              <div class="well">
                <h4>Today Hits</h4>
                <p>9</p> 
              </div>
            </div>
            <div class="col-sm-3">
              <div class="well">
                <h4>Total Hits</h4>
                <p>10000</p> 
              </div>
            </div>
            <div class="col-sm-3">
              <div class="well">
                <h4>Average hits pre day</h4>
                <p>10</p> 
              </div>
            </div>
            <div class="col-sm-3">
              <div class="well">
                <h4>Limit</h4>
                <p>15 request per day.</p> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="well">
                <p>Text</p> 
                <p>Text</p> 
                <p>Text</p> 
              </div>
            </div>
            <div class="col-sm-4">
              <div class="well">
                <p>Text</p> 
                <p>Text</p> 
                <p>Text</p> 
              </div>
            </div>
            <div class="col-sm-4">
              <div class="well">
                <p>Text</p> 
                <p>Text</p> 
                <p>Text</p> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="well kwl">
                <p>Your api key : <span>i2jw0c4859304u38jf89tu9g5r98gby7y4785y87h45o8t38978297948hf834fg</span></p> 
              </div>
            </div>
            <div class="col-sm-4">
              <div class="well">
                <p>Text</p> 
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>

</body>
</html>
