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
    	    font-weight: 600;
    	    height: 100vh;
    	    margin: 0;
    	    font-size: 14px;
    	}
    	
    	tbody>tr>td, thead>tr>th{
    		text-align: center;
    	}
    	sup{
    		font-weight: 400;
    		font-size: 8px;
    	}
    </style>

    
</head>
<body>
	<div class="container" id="containers">
		<div class="col-md-12">
						<div class="text-center" id="routinetitle">{!! ucwords(session('tb')) !!}</div>
						@if(count($sblist)>0)
	<?php $sat1 = $sat2 = $sat3 = $sat4 =$sat5 = $sat6 = $sun1 = $sun2 = $sun3 =$sun4 = $sun5 =$sun6 = $mon1 = $mon2 = $mon3= $mon4 =$mon5 = $mon6 = $tue1 = $tue2 = $tue3 = $tue4 = $tue5 = $tue6 = $wed1 = $wed2 = $wed3 = $wed4 = $wed5 = $wed6 = $thu1 = $thu2 =$thu3 = $thu4 = $thu5 = $thu6 = ' - - - ';?>

							@foreach($sblist as $info)
							@if(strtoupper($info->day) == strtoupper('Saturday'))

							<?php $time = $info->time; ?>

								@if(strpos($time, '08:30-10:00') !== false)
								
									<?php $sat1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '10:00-11:30') !== false)
								
									<?php $sat2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '11:30-1:00') !== false)
								
									<?php $sat3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '1:00-2:30') !== false)
								
									<?php $sat4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '2:30-4:00') !== false)
								
									<?php $sat5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '4:00-5:30') !== false)
								
									<?php $sat6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif
							
							@endif

							@if(strtoupper($info->day) == strtoupper('sunday'))

							<?php $time = $info->time; ?>

								@if(strpos($time, '08:30-10:00') !== false)
								
									<?php $sun1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '10:00-11:30') !== false) 
								
									<?php $sun2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '11:30-1:00') !== false)
								
									<?php $sun3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '1:00-2:30') !== false)
								
									<?php $sun4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '2:30-4:00') !== false)
								<?php $sun5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '4:00-5:30') !== false)
								
									<?php $sun6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif
							
							@endif

							@if(strtoupper($info->day) == strtoupper('monday'))

							<?php $time = $info->time; ?>

								@if(strpos($time, '08:30-10:00') !== false)
								
									<?php $mon1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '10:00-11:30') !== false)
								
									<?php $mon2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '11:30-1:00') !== false)
								
									<?php $mon3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '1:00-2:30') !== false)
								
									<?php $mon4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '2:30-4:00') !== false)
								
									<?php $mon5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '4:00-5:30') !== false)
								
									<?php $mon6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif
							
							@endif

							@if(strtoupper($info->day) == strtoupper('tuesday'))

							<?php $time = $info->time; ?>

								@if(strpos($time, '08:30-10:00') !== false)
								
									<?php $tue1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '10:00-11:30') !== false)
								
									<?php $tue2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '11:30-1:00') !== false)
								
									<?php $tue3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '1:00-2:30') !== false)
								
									<?php $tue4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '2:30-4:00') !== false)
								
									<?php $tue5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '4:00-5:30') !== false)
								
									<?php $tue6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif
							
							@endif

							@if(strtoupper($info->day) == strtoupper('wednesday'))

							<?php $time = $info->time; ?>

								@if(strpos($time, '08:30-10:00') !== false)
								
									<?php $wed1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '10:00-11:30') !== false)
								
									<?php $wed2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '11:30-1:00') !== false)
								
									<?php $wed3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '1:00-2:30') !== false)
								
									<?php $wed4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '2:30-4:00') !== false)
								
									<?php $wed5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '4:00-5:30') !== false)
								
									<?php $wed6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif
							
							@endif

							@if(strtoupper($info->day) == strtoupper('thursday'))

							<?php $time = $info->time; ?>

								@if(strpos($time, '08:30-10:00') !== false)
								
									<?php $thu1 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '10:00-11:30') !== false)
								
									<?php $thu2 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '11:30-1:00') !== false)
								
									<?php $thu3 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '1:00-2:30') !== false)
								
									<?php $thu4 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '2:30-4:00') !== false)
								
									<?php $thu5 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
								@endif

								@if(strpos($time, '4:00-5:30') !== false)
								
									<?php $thu6 = $info->room.' '.$info->subcode.' ('.$info->teacher.')';  ?>
								
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
								      	<td>{!! $sat1 !!}</td>
								      	<td>{!! $sat2 !!}</td>
								      	<td>{!! $sat3 !!}</td>
								      	<td>{!! $sat4 !!}</td>
								      	<td>{!! $sat5 !!}</td>
								      	<td>{!! $sat6 !!}</td>
								      </tr>


								      <tr>
								      	<td>Sunday</td>
								      	<td>{!! $sun1 !!}</td>
								      	<td>{!! $sun2 !!}</td>
								      	<td>{!! $sun3 !!}</td>
								      	<td>{!! $sun4 !!}</td>
								      	<td>{!! $sun5 !!}</td>
								      	<td>{!! $sun6 !!}</td>
								      </tr>


								      <tr>
								      	<td>Monday</td>
								      	<td>{!! $mon1 !!}</td>
								      	<td>{!! $mon2 !!}</td>
								      	<td>{!! $mon3 !!}</td>
								      	<td>{!! $mon4 !!}</td>
								      	<td>{!! $mon5 !!}</td>
								      	<td>{!! $mon6 !!}</td>
								      </tr>


								      <tr>
								      	<td>Tuesday</td>
								      	<td>{!! $tue1 !!}</td>
								      	<td>{!! $tue2 !!}</td>
								      	<td>{!! $tue3 !!}</td>
								      	<td>{!! $tue4 !!}</td>
								      	<td>{!! $tue5 !!}</td>
								      	<td>{!! $tue6 !!}</td>
								      </tr>

								      <tr>
								      	<td>Wednesday</td>
								      	<td>{!! $wed1 !!}</td>
								      	<td>{!! $wed2 !!}</td>
								      	<td>{!! $wed3 !!}</td>
								      	<td>{!! $wed4 !!}</td>
								      	<td>{!! $wed5 !!}</td>
								      	<td>{!! $wed6 !!}</td>
								      </tr>

								      <tr>
								      	<td>Thursday</td>
								      	<td>{!! $thu1 !!}</td>
								      	<td>{!! $thu2 !!}</td>
								      	<td>{!! $thu3 !!}</td>
								      	<td>{!! $thu4 !!}</td>
								      	<td>{!! $thu5 !!}</td>
								      	<td>{!! $thu6 !!}</td>
								      </tr>
								      
								    @else
								    <h3>No result</h3>
								    @endif
								    <tr class="at"> <td colspan="7"><a style="float: right;margin-right: 6%;" href="https://www.fb.me/mhzahid01"><sup>[fb.me/mhzahid01]</sup></a></td></tr>
							    </tbody>

						</table>
					
		</div>

	</div>


</body>
</html>