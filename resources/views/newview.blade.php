<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Routine</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="public/js/app.js"></script>

    <style type="text/css">
    	html, body {
    	    background-color: #fff;
    	    color: #636b6f;
    	    font-family: 'Raleway', sans-serif;
    	    font-weight: 100;
    	    height: 100vh;
    	    margin: 0;
    	}
    	input{
    		font-weight: 600;
    		color: #000;
    	}
    	.team{
    		float: right;
    	}
    	.team>a{
			font-weight: 600;color: #F44336 !important;
    	}
    	.alert{
    		font-weight: 500;
    	}
    	#select{
    	    color: #000 !important;
    	    font-weight: 500 !important;
    	}
    	.modal-body>p{
    		font-weight: 500 !important;
    	}
    	.modal-body>p>a{
    		font-size: 20px !important;
    		font-weight: 600 !important;
    	}
    	.recom{
    		display: none;
    	}

    	@media only screen and (max-width: 770px) {
    		.recom{
    			margin: auto;
    			max-width: 65%;
    			display: block !important;
    		}
    	    .rectext{
				background-color: #ffff00b0;
				color: #000;
				font-weight: 500;
    	    }
    	}
    	
    </style>

</head>
<body>
	<div class="container">		
		<div class="col-md-12 text-center">
			<div class="recom"><p class="rectext">Use Google Chrome or Mozilla Firefox for better performance.</p></div>
			<h2>Find your Routine</h2>
			<div class="text-center" style="font-weight: 400;"><strong>N:B:</strong> Subject Code Example : Swe123f <br> Add your section after course code.</div>
			<div class="col-md-6 col-md-offset-3" >
				<div class="diser"></div>
				@if(session('failed'))
				    <div class="alert alert-danger">
				        {{session('failed')}}
				    </div>
				@endif
				{!! Form::open(['url'=>'gnrtn','files' => true , 'method' => 'POST']) !!}
				<br>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('slsem') ? ' has-error' : '' }}">
								<select class="form-control" name="slsem" onchange="fetch_section(this.value);" id="select">
								    <option value="">---Select Semester---</option>
								    <option value="11">1-st</option>
								    <option value="12">2-nd</option>
								    <option value="13">3-rd</option>
								    <option value="21">4-th</option>
								    <option value="22">5-th</option>
								    <option value="23">6-th</option>
								    <option value="31">7-th</option>
								    <option value="32">8-th</option>
								    <option value="33">9-th</option>
								    <option value="41">10-th</option>
								    <option value="42">11-th</option>
								</select>
								@if ($errors->has('slsem'))
								    <span class="help-block">
								        <strong>{{ $errors->first('slsem') }}</strong>
								    </span>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('slsec') ? ' has-error' : '' }}">
								<select class="form-control secName" name="slsec" onchange="fetch_subcode(this.value);" id="select">
								    <option value="">---Select Section---</option>
								    
								    
								</select>
								@if ($errors->has('slsec'))
								    <span class="help-block">
								        <strong>{{ $errors->first('slsec') }}</strong>
								    </span>
								@endif
							</div>
						</div>
					</div>
				
					<div class="ext"></div>
				{!! Form::close() !!}
			</div>
		</div>

		<div class="col-md-4">
			
		</div>
		<div class="col-md-3 col-md-offset-3 team"><a href="team">Meet the Team</a></div>
		
	</div>
	  



	    <script type="text/javascript">
	    	var sem = '';
	    	var sub_ar = '';
	    	var c_url = '';
	    	function fetch_section(val)
	    	{
	    		var op = " ";
	    		c_url = window.location.href;
	    		sem = val;
	    		 $.ajax({
	    			 type: 'get',
	    			 url: c_url+'/load_section',
	    			 data: {
	    			  get_option:val
	    			 },
	    			 success: function (response) {
	    			 	var ar = response.sectionName;
	    			 	sub_ar = response.subCode;
	    			 	op+='<option value=" " selected disabled>---Select Section---</option>';
	    				for (var i = 0; i < ar.length; i++) {
	    				op+='<option value="'+ar[i]+'">'+ar[i]+'</option>';
	    				}
	    				$('.secName').html(" ");
	    				$('.secName').append(op);
	    				console.clear();
	    			 }
	    		 });
	    	}

	    	function fetch_subcode(val)
	    	{
	    		var elm = " ";
	    		var sec = val;
	    		if (sub_ar != '') {
	    			for (var i = 0; i < sub_ar.length; i++) {
	    				if (sub_ar[i] != '') {
	    					sub_ar[i] = sub_ar[i]+val;
	    				}
	    			}
				 	elm = '<div class="form-group"><input type="text" class="form-control" name="sbj1" placeholder="Subject Code" value="'+sub_ar[0]+'"></div><div class="form-group"><input type="text" class="form-control" name="sbj2" placeholder="Subject Code" value="'+sub_ar[1]+'"></div><div class="form-group"><input type="text" class="form-control" name="sbj3" placeholder="Subject Code" value="'+sub_ar[2]+'"></div><div class="form-group"><input type="text" class="form-control" name="sbj4" placeholder="Subject Code" value="'+sub_ar[3]+'"></div><div class="form-group"><input type="text" class="form-control" name="sbj5" placeholder="Subject Code" value="'+sub_ar[4]+'"></div><div class="form-group"><button class="btn btn-primary btn-lg waves-effect waves-light">Submit</button></div>';
				}
				$('.ext').html(" ");
				$('.ext').append(elm);
				elm ="";

				console.clear();

				gnr_rtn();
	    	}

	    	function gnr_rtn() {

	    		 $.ajax({
	    			 type: 'get',
	    			 url: c_url+'/gtrnt',
	    			 data: {
	    			  subcd:sub_ar
	    			 },
	    			 success: function (res) {

	    			 	console.log(res);
	    		
	    			 	if (typeof res.er != 'undefined') {
	    			 	    console.log(res.er);
	    			 	    elm = '<div class="alert alert-danger">'+res.er+'</div>';

	    			 	    $('.diser').html(" ");
	    			 	    $('.diser').append(elm);
	    			 	    elm = " ";
	    			 	} 
	    			 	// else {}
	    			 	// console.log(response);
	    			 // 	var ar = response.sectionName;
	    			 // 	sub_ar = response.subCode;
	    			 // 	op+='<option value=" " selected disabled>---Select Section---</option>';
	    				// for (var i = 0; i < ar.length; i++) {
	    				// op+='<option value="'+ar[i]+'">'+ar[i]+'</option>';
	    				// }
	    				// $('.secName').html(" ");
	    				// $('.secName').append(op);
	    				// console.clear();
	    			 }
	    		 });
	    	}
	    </script>


</body>
</html>