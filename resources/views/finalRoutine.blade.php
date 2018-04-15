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
    	
    	tbody>tr>td, thead>tr>th{
    		text-align: center;
    	}
    	table{
		    position: relative;
		    overflow: hidden;
    	}

    	table:before {
    	  content: "";
    	  position: absolute;
    	  width: 200%;
    	  height: 200%;
    	  top: -50%;
    	  left: -50%;
    	  background: url(public/img/watermark.png);
    	  background-repeat: no-repeat;
    	  background-position: 59% 52.6%;
    	  background-size: 18%;
    	  -webkit-transform: rotate(-30deg);
    	  transform: rotate(-30deg);
    	}
    </style>

    
</head>
<body>
	<div class="container" id="containers">
		<div class="col-md-12">
			<div class="col-md-6 text center col-md-offset-3" style="margin-top: 4%;">
				
				{!!	Form::open(['url' => ['gnrtn/d2'], 'method' => 'POST', 'class' => 'pull-left']) !!}

				    <button class="btn btn-md btn-info">Design 2</button>
				    
				{!! Form::close() !!}

				{!!	Form::open(['url' => ['gnrtn/pdf'], 'method' => 'POST', 'class' => 'pull-right']) !!}

				    <button class="btn btn-primary btn-md" id="btnSave">Download PDF</button>

				    <input type="button" id="btnSave" value="Save as Image" class="btn btn-primary btn-md" onclick="onClickbtn()" />
				{!! Form::close() !!}


			</div>
			<div class="col-md-6 col-md-offset-3" id="canvases">
				<div id="wrapper">
					<div id="toCopy">
						<div class="text-center" id="routinetitle">{!! ucwords(session('tb')) !!}</div>

						<table class="table table-bordered" style="color: #000;">
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