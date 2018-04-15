<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Routine</title>
	<link href="https://fonts.googleapis.com/css?family=Exo:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
 
    <style type="text/css">
    	html, body {
    	    background-color: #fff;
    	    color: #636b6f;
    	    font-family: 'Exo', sans-serif;
    	    font-weight: 500;
    	    height: 100vh;
    	    margin: 0;
    	    font-size: 16px;
    	}
    	input{
    		font-weight: 600;
    		color: #000;
    	}
    	.alert{
    		font-weight: 500;
    	}
    	.cl{
			background-color: #add8e6f7;
    	}
    	.cl:nth-of-type(2n-1){
			background-color: #c5f3b2db;
    	}
    	.cl:nth-of-type(3n-2){
			background-color: #ffb6c159;
    	}

    	.ncl{
    		background-color: #c5f3b2db;
    	}

    	hr{
    		margin-top: 10px !important;
		    margin-bottom: 5px !important;
		    border-top: 1px solid #d8d4d4 !important;
    	}
    	
    	tbody>tr>td, thead>tr>th{
    		text-align: center;
    	}
    	tbody>tr>td{
    		min-height: 92px !important;
    		min-width: 128px !important;
    	}
    </style>

    
</head>
<body>
	<div class="container" id="containers">
		<div class="col-md-12">
			<div class="col-md-6 text center col-md-offset-3" style="margin-top: 4%;">
				{!!	Form::open(['url' => ['gnrtn'], 'method' => 'POST', 'class' => 'pull-left']) !!}

				@if(session('sbj1'))
				  <input type="hidden" class="form-control" name="sbj1" value="{{session('sbj1')}}">
				 @endif
				 @if(session('tb'))
				   <input type="hidden" class="form-control" name="slrtnm" value="{{session('tb')}}">
				  @endif
				@if(session('sbj2'))
				  <input type="hidden" class="form-control" name="sbj2" value="{{session('sbj2')}}">
				 @endif
				 @if(session('sbj3'))
				   <input type="hidden" class="form-control" name="sbj3" value="{{session('sbj3')}}">
				  @endif
				@if(session('sbj4'))
				  <input type="hidden" class="form-control" name="sbj4" value="{{session('sbj4')}}">
				 @endif

				@if(session('sbj5'))
				  <input type="hidden" class="form-control" name="sbj5" value="{{session('sbj5')}}">
				 @endif

				    <button class="btn btn-md btn-info">Design 1</button>

				{!! Form::close() !!}

				{!!	Form::open(['url' => ['gnrtn/pdf/d2'], 'method' => 'POST', 'class' => 'pull-right']) !!}

				    <button class="btn btn-primary btn-md" id="btnSave">Download PDF</button>

				    <input type="button" id="btnSave" value="Save as Image" class="btn btn-primary btn-md" onclick="onClickbtn()" />
				{!! Form::close() !!}


			</div>
			<div class="col-md-12" id="canvases">
				<div id="wrapper">
					<div id="toCopy">
						<div class="text-center" id="routinetitle">{!! ucwords(session('tb')) !!}</div>
						@if(count($sblist)>0)
	<?php $sat1 = $sat2 = $sat3 = $sat4 =$sat5 = $sat6 = $sun1 = $sun2 = $sun3 =$sun4 = $sun5 =$sun6 = $mon1 = $mon2 = $mon3= $mon4 =$mon5 = $mon6 = $tue1 = $tue2 = $tue3 = $tue4 = $tue5 = $tue6 = $wed1 = $wed2 = $wed3 = $wed4 = $wed5 = $wed6 = $thu1 = $thu2 =$thu3 = $thu4 = $thu5 = $thu6 = ' - - - ';

		$sat1_1 = $sat2_1 = $sat3_1 = $sat4_1 = $sat5_1 = $sat6_1 = $sun1_1 = $sun2_1 = $sun3_1 = $sun4_1 = $sun5_1 = $sun6_1 = 
		$mon1_1 = $mon2_1 = $mon3_1 = $mon4_1 = $mon5_1 = $mon6_1 = $tue1_1 = $tue2_1 = $tue3_1 = $tue4_1 = $tue5_1 = $tue6_1 = 
		$wed1_1 = $wed2_1 = $wed3_1 = $wed4_1 = $wed5_1 = $wed6_1 = $thu1_1 = $thu2_1 = $thu3_1 = $thu4_1 = $thu5_1 = $thu6_1 = ''; 

	$st1 = $st2 = $st3 = $st4 = $st5 = $st6 = $sn1 = $sn2 = $sn3 = $sn4 = $sn5 = $sn6 = $mn1 = $mn2 = $mn3 = $mn4 = $mn5 = $mn6 = $tu1 = $tu2 = $tu3 = $tu4 = $tu5 = $tu6 = $wd1 = $wd2 = $wd3 = $wd4 = $wd5 = $wd6 = $th1 = $th2 = $th3 = $th4 = $th5 = $th6 = 0;
	?>

							@foreach($sblist as $info)
							@if(strtoupper($info->day) == strtoupper('Saturday'))

							<?php $time = $info->time; ?>

								@if($time == '08:30-10:00' && $st1 == 0)
								
									<?php $st1 = 1;
									 $sat1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '08:30-10:00' && $st1 == 1)
								
									<?php $st1 = 0;
									 $sat1_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '10:00-11:30' && $st2 == 0)
								
									<?php $st2 = 1;
									 $sat2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '10:00-11:30' && $st2 == 1)
								
									<?php $st2 = 0;
									 $sat2_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
								
								@if($time == '11:30-1:00' && $st3 == 0)
								
									<?php $st3 = 0;
									 $sat3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '11:30-1:00' && $st3 == 1)
								
									<?php $st3 = 0;
									 $sat3_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '1:00-2:30' && $st4 == 0)
								
									<?php $st4 = 0;
									$sat4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '1:00-2:30' && $st4 == 1)
								
									<?php $st4 = 0;
									 $sat4_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '2:30-4:00'&& $st5 == 0)
								
									<?php $st5 = 1;
									 $sat5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '2:30-4:00' && $st5 == 1)
								
									<?php $st5 = 0;
									 $sat5_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '4:00-5:30'&& $st6 == 0)
								
									<?php $st6 = 1;
									 $sat6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '4:00-5:30' && $st6 == 1)
								
									<?php $st6 = 0;
									 $sat6_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
							
							@endif



							@if(strtoupper($info->day) == strtoupper('sunday'))

							<?php $time = $info->time; ?>

								@if($time == '08:30-10:00' && $sn1 == 0)
								
									<?php $sn1 = 1;
									 $sun1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '08:30-10:00' && $sn1 == 1)
								
									<?php $sn1 = 0;
									 $sun1_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '10:00-11:30' && $sn2 == 0)
								
									<?php $sn2 = 1;
									 $sun2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '10:00-11:30' && $sn2 == 1)
								
									<?php $sn2 = 0;
									 $sun2_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
								
								@if($time == '11:30-1:00' && $sn3 == 0)
								
									<?php $sn3 = 0;
									 $sun3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '11:30-1:00' && $sn3 == 1)
								
									<?php $sn3 = 0;
									 $sun3_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '1:00-2:30' && $sn4 == 0)
								
									<?php $sn4 = 0;
									$sun4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '1:00-2:30' && $sn4 == 1)
								
									<?php $sn4 = 0;
									 $sun4_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '2:30-4:00'&& $sn5 == 0)
								
									<?php $sn5 = 1;
									 $sun5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '2:30-4:00' && $sn5 == 1)
								
									<?php $sn5 = 0;
									 $sun5_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '4:00-5:30'&& $sn6 == 0)
								
									<?php $sn6 = 1;
									 $sun6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '4:00-5:30' && $sn6 == 1)
								
									<?php $sn6 = 0;
									 $sun6_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
							
							@endif





							@if(strtoupper($info->day) == strtoupper('monday'))

							<?php $time = $info->time; ?>

								@if($time == '08:30-10:00' && $mn1 == 0)
								
									<?php $mn1 = 1;
									 $mon1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '08:30-10:00' && $mn1 == 1)
								
									<?php $mn1 = 0;
									 $mon1_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '10:00-11:30' && $mn2 == 0)
								
									<?php $mn2 = 1;
									 $mon2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '10:00-11:30' && $mn2 == 1)
								
									<?php $mn2 = 0;
									 $mon2_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
								
								@if($time == '11:30-1:00' && $mn3 == 0)
								
									<?php $mn3 = 0;
									 $mon3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '11:30-1:00' && $mn3 == 1)
								
									<?php $mn3 = 0;
									 $mon3_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '1:00-2:30' && $mn4 == 0)
								
									<?php $mn4 = 0;
									$mon4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '1:00-2:30' && $mn4 == 1)
								
									<?php $mn4 = 0;
									 $mon4_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '2:30-4:00'&& $mn5 == 0)
								
									<?php $mn5 = 1;
									 $mon5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '2:30-4:00' && $mn5 == 1)
								
									<?php $mn5 = 0;
									 $mon5_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '4:00-5:30'&& $mn6 == 0)
								
									<?php $mn6 = 1;
									 $mon6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '4:00-5:30' && $mn6 == 1)
								
									<?php $mn6 = 0;
									 $mon6_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
							
							@endif



							@if(strtoupper($info->day) == strtoupper('tuesday'))

							<?php $time = $info->time; ?>

								@if($time == '08:30-10:00' && $tu1 == 0)
								
									<?php $tu1 = 1;
									 $tue1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '08:30-10:00' && $tu1 == 1)
								
									<?php $tu1 = 0;
									 $tue1_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '10:00-11:30' && $tu2 == 0)
								
									<?php $tu2 = 1;
									 $tue2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '10:00-11:30' && $tu2 == 1)
								
									<?php $tu2 = 0;
									 $tue2_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
								
								@if($time == '11:30-1:00' && $tu3 == 0)
								
									<?php $tu3 = 0;
									 $tue3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '11:30-1:00' && $tu3 == 1)
								
									<?php $tu3 = 0;
									 $tue3_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '1:00-2:30' && $tu4 == 0)
								
									<?php $tu4 = 0;
									$tue4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '1:00-2:30' && $tu4 == 1)
								
									<?php $tu4 = 0;
									 $tue4_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '2:30-4:00'&& $tu5 == 0)
								
									<?php $tu5 = 1;
									 $tue5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '2:30-4:00' && $tu5 == 1)
								
									<?php $tu5 = 0;
									 $tue5_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '4:00-5:30'&& $tu6 == 0)
								
									<?php $tu6 = 1;
									 $tue6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '4:00-5:30' && $tu6 == 1)
								
									<?php $tu6 = 0;
									 $tue6_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
							
							@endif





							@if(strtoupper($info->day) == strtoupper('wednesday'))

							<?php $time = $info->time; ?>

								@if($time == '08:30-10:00' && $wd1 == 0)
								
									<?php $wd1 = 1;
									 $wed1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '08:30-10:00' && $wd1 == 1)
								
									<?php $wd1 = 0;
									 $wed1_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '10:00-11:30' && $wd2 == 0)
								
									<?php $wd2 = 1;
									 $wed2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '10:00-11:30' && $wd2 == 1)
								
									<?php $wd2 = 0;
									 $wed2_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
								
								@if($time == '11:30-1:00' && $wd3 == 0)
								
									<?php $wd3 = 0;
									 $wed3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '11:30-1:00' && $wd3 == 1)
								
									<?php $wd3 = 0;
									 $wed3_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '1:00-2:30' && $wd4 == 0)
								
									<?php $wd4 = 0;
									$wed4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '1:00-2:30' && $wd4 == 1)
								
									<?php $wd4 = 0;
									 $wed4_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '2:30-4:00'&& $wd5 == 0)
								
									<?php $wd5 = 1;
									 $wed5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '2:30-4:00' && $wd5 == 1)
								
									<?php $wd5 = 0;
									 $wed5_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '4:00-5:30'&& $wd6 == 0)
								
									<?php $wd6 = 1;
									 $wed6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '4:00-5:30' && $wd6 == 1)
								
									<?php $wd6 = 0;
									 $wed6_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
							
							@endif




							@if(strtoupper($info->day) == strtoupper('thursday'))

							<?php $time = $info->time; ?>

								@if($time == '08:30-10:00' && $th1 == 0)
								
									<?php $th1 = 1;
									 $thu1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '08:30-10:00' && $th1 == 1)
								
									<?php $th1 = 0;
									 $thu1_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '10:00-11:30' && $th2 == 0)
								
									<?php $th2 = 1;
									 $thu2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@elseif($time == '10:00-11:30' && $th2 == 1)
								
									<?php $wd2 = 0;
									 $thu2_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
								
								@if($time == '11:30-1:00' && $th3 == 0)
								
									<?php $th3 = 0;
									 $thu3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '11:30-1:00' && $th3 == 1)
								
									<?php $th3 = 0;
									 $thu3_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '1:00-2:30' && $th4 == 0)
								
									<?php $th4 = 0;
									$thu4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '1:00-2:30' && $th4 == 1)
								
									<?php $th4 = 0;
									 $thu4_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '2:30-4:00'&& $th5 == 0)
								
									<?php $th5 = 1;
									 $thu5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '2:30-4:00' && $th5 == 1)
								
									<?php $th5 = 0;
									 $thu5_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif

								@if($time == '4:00-5:30'&& $th6 == 0)
								
									<?php $th6 = 1;
									 $thu6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@elseif($time == '4:00-5:30' && $th6 == 1)
								
									<?php $th6 = 0;
									 $thu6_1 = '<hr>'.$info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>

								@endif
							
							@endif



							@endforeach



					@endif

						<table class="table table-bordered" style="color: #000;">
							<thead>

						      	@if(count($sblist)>0)
						    	<tr>
							      	<th>Day/Time</th>
							      	<th>08:30-10:00</th>
							      	<th>10:00-11:30</th>
							      	<th>11:30-1:00</th>
							      	<th>1:00-2:30</th>
							      	<th>2:30-4:00</th>
							      	<th>4:00-5:30</th>
							    </tr>

							    @endif
							      
							    </thead>
							    <tbody>
							    	@if(count($sblist)>0)
							    									      
								      <tr>
								      	<td>Saturday</td>
								      	<td>{!! $sat1 !!} {!! $sat1_1 !!}</td>
								      	<td>{!! $sat2 !!} {!! $sat2_1 !!}</td>
								      	<td>{!! $sat3 !!} {!! $sat3_1 !!}</td>
								      	<td>{!! $sat4 !!} {!! $sat4_1 !!}</td>
								      	<td>{!! $sat5 !!} {!! $sat5_1 !!}</td>
								      	<td>{!! $sat6 !!} {!! $sat6_1 !!}</td>
								      </tr>


								      <tr>
								      	<td>Sunday</td>
								      	<td>{!! $sun1 !!} {!! $sun1_1 !!}</td>
								      	<td>{!! $sun2 !!} {!! $sun2_1 !!}</td>
								      	<td>{!! $sun3 !!} {!! $sun3_1 !!}</td>
								      	<td>{!! $sun4 !!} {!! $sun4_1 !!}</td>
								      	<td>{!! $sun5 !!} {!! $sun5_1 !!}</td>
								      	<td>{!! $sun6 !!} {!! $sun6_1 !!}</td>
								      </tr>


								      <tr>
								      	<td>Monday</td>
								      	<td>{!! $mon1 !!} {!! $mon1_1 !!}</td>
								      	<td>{!! $mon2 !!} {!! $mon2_1 !!}</td>
								      	<td>{!! $mon3 !!} {!! $mon3_1 !!}</td>
								      	<td>{!! $mon4 !!} {!! $mon4_1 !!}</td>
								      	<td>{!! $mon5 !!} {!! $mon5_1 !!}</td>
								      	<td>{!! $mon6 !!} {!! $mon6_1 !!}</td>
								      </tr>


								      <tr>
								      	<td>Tuesday</td>
								      	<td>{!! $tue1 !!} {!! $tue1_1 !!}</td>
								      	<td>{!! $tue2 !!} {!! $tue2_1 !!}</td>
								      	<td>{!! $tue3 !!} {!! $tue3_1 !!}</td>
								      	<td>{!! $tue4 !!} {!! $tue4_1 !!}</td>
								      	<td>{!! $tue5 !!} {!! $tue5_1 !!}</td>
								      	<td>{!! $tue6 !!} {!! $tue6_1 !!}</td>
								      </tr>

								      <tr>
								      	<td>Wednesday</td>
								      	<td>{!! $wed1 !!} {!! $wed1_1 !!}</td>
								      	<td>{!! $wed2 !!} {!! $wed2_1 !!}</td>
								      	<td>{!! $wed3 !!} {!! $wed3_1 !!}</td>
								      	<td>{!! $wed4 !!} {!! $wed4_1 !!}</td>
								      	<td>{!! $wed5 !!} {!! $wed5_1 !!}</td>
								      	<td>{!! $wed6 !!} {!! $wed6_1 !!}</td>
								      </tr>

								      <tr>
								      	<td>Thursday</td>
								      	<td>{!! $thu1 !!} {!! $thu1_1 !!}</td>
								      	<td>{!! $thu2 !!} {!! $thu2_1 !!}</td>
								      	<td>{!! $thu3 !!} {!! $thu3_1 !!}</td>
								      	<td>{!! $thu4 !!} {!! $thu4_1 !!}</td>
								      	<td>{!! $thu5 !!} {!! $thu5_1 !!}</td>
								      	<td>{!! $thu6 !!} {!! $thu6_1 !!}</td>
								      </tr>

								    @else
								    <h3>No result</h3>
								    @endif
								    
							    </tbody>					
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

	<script src="{{asset('public/js/html2canvas.js')}}"></script>
	<script src="{{asset('public/js/download.js')}}"></script>

	<script type="text/javascript">
	    function onClickbtn() {
	    	
	        html2canvas(document.querySelector("#canvases")).then(canvas => {
	            //document.body.appendChild(canvas)
	            var conta = document.getElementById("containers");
	            var title= document.getElementById("routinetitle").textContent+'.jpg';
	            //document.body.replaceChild(canvas, conta)
	            download(canvas.toDataURL("image/jpeg"), title, 'image/jpeg');
	        });
	    }
	</script>

</body>
</html>