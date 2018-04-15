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
    	    font-size: 16px;
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
    	.at{
    		font-weight: 400;
    		font-size: 8px;
    	}
    	tbody>tr>td, thead>tr>th{
    		text-align: center;
    		padding: 4px !important;
    	}
    </style>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-6" id="canvas" style="margin-left: 15%; margin-top: 6%;">
				<h4 style="margin-left: 22%;">{!! ucwords(session('tb')) !!}</h4>
				<table class="table table-bordered" style="color: #000; width: 84%;">
					<thead>
					      <tr>
					        <th>Room</th>
					        <th>Subject Code</th>
					        <th>Teacher</th>
					        <th>Time</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@if(count($sblist)>0)
					    	<?php $sa = $su = $mn = $tu = $wd = $th = 0; ?>
						      @foreach($sblist as $info)
						      
						      	@if(strtoupper($info->day) == strtoupper('Saturday') && $sa == 0)
						      	
						      	<tr>
						      		<td colspan="4">{!! $info->day !!}</td>
						      		<?php $sa = 1; ?>
						      	</tr>
						      	@endif

						      	@if(strtoupper($info->day) == strtoupper('Sunday') && $su == 0)
						      	<tr>
						      		<td colspan="4">{!! $info->day !!}</td>
						      		<?php $su = 1; ?>
						      	</tr>
						      	@endif

						      	@if(strtoupper($info->day) == strtoupper('Monday') && $mn == 0)
						      	<tr>
						      		<td colspan="4">{!! $info->day !!}</td>
						      		<?php $mn = 1; ?>
						      	</tr>
						      	@endif

						      	@if(strtoupper($info->day) == strtoupper('tuesday') && $tu == 0)
						      	<tr>
						      		<td colspan="4">{!! $info->day !!}</td>
						      		<?php $tu = 1; ?>
						      	</tr>
						      	@endif

						      	@if(strtoupper($info->day) == strtoupper('wednesday') && $wd == 0)
						      	<tr>
						      		<td colspan="4">{!! $info->day !!}</td>
						      		<?php $wd = 1; ?>
						      	</tr>
						      	@endif

						      	@if(strtoupper($info->day) == strtoupper('thursday') && $th == 0)
						      	<tr>
						      		<td colspan="4">{!! $info->day !!}</td>
						      		<?php $th = 1; ?>
						      	</tr>
						      	@endif

						      	<tr class="cl">
						      	  <td>{!! $info->room !!}</td>
						      	  <td>{!! $info->subcode !!}</td>
						      	  <td>{!! $info->teacher !!}</td>
						      	  <td>{!! $info->time !!}</td>
						      	</tr>
						      @endforeach
						    @endif
						    <tr class="at"><span style="float: left;">DIU</span>  <a style="float: right;margin-right: 16%;" href="https://www.fb.me/mhzahid01">[fb.me/mhzahid01]</a></tr>
					    </tbody>					
				</table>
			</div>
		</div>

	</div>
</body>
</html>