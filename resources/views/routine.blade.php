<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Routine</title>
	<link href="https://fonts.googleapis.com/css?family=Exo:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
    	html, body {
    	    background-color: #fff;
    	    color: #636b6f;
    	    font-family: 'Exo', sans-serif;
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

    	.api>a{
    		font-size: 18px;
    		font-weight: 600;
    		color: #ff6347;
    	}
    	
    </style>
    <script>
    	setTimeout(function() {
    	    $('#myModal').modal();
    	}, 3000);
    </script>
</head>
<body>
	<div class="container">		
		<div class="col-md-12 text-center">
			<div class="recom"><p class="rectext">Use Google Chrome or Mozilla Firefox for better performance.</p></div>
			<h2>Find your Routine</h2>
			<div class="text-center" style="font-weight: 400;"><strong>N:B:</strong> Subject Code Example : Swe123f <br> Add your section after course code.</div>
			<div class="col-md-6 col-md-offset-3" >
				@if(session('failed'))
				    <div class="alert alert-danger">
				        {{session('failed')}}
				    </div>
				@endif
				{!! Form::open(['url'=>'gnrtn','files' => true , 'method' => 'POST']) !!}
				
					<div class="form-group {{ $errors->has('slrtnm') ? ' has-error' : '' }}">
						<select style="text-transform: capitalize;" class="form-control" name="slrtnm" id="select">
						    <option value="">---Select Routine---</option>
						    @foreach($opt as $option)
						    		<option value="{!!$option->tb_name!!}">{!!$option->tb_name!!}</option>
						    @endforeach
						    
						</select>
						@if ($errors->has('slrtnm'))
						    <span class="help-block">
						        <strong>{{ $errors->first('slrtnm') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					  <input type="text" class="form-control" name="sbj1" placeholder="Subject Code    ----->     Ex: SWE123F">
					</div>

					<div class="form-group">
					  <input type="text" class="form-control" name="sbj2" placeholder="Subject Code">
					</div>

					<div class="form-group">
					  <input type="text" class="form-control" name="sbj3" placeholder="Subject Code">
					</div>

					<div class="form-group">
					  <input type="text" class="form-control" name="sbj4" placeholder="Subject Code">
					</div>

					<div class="form-group">
					  <input type="text" class="form-control" name="sbj5" placeholder="Subject Code">
					</div>

					<div class="form-group">
					  <button class="btn btn-primary btn-lg waves-effect waves-light">Submit</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>

		<div class="col-dm-12">
			<div class="row">
				<div class="row">
				  <div class="col-xs-6 col-sm-4">
				  	@foreach($total_hits as $hits)
				  		<h5>Total Hits: {!! $hits->visited !!}</h5>
				  	@endforeach
				  </div>
				  <div class="col-xs-6 col-sm-4 text-center api"><a href="get_api">Get an Api</a></div>
				  <!-- Optional: clear the XS cols if their content doesn't match in height -->
				  <div class="clearfix visible-xs-block"></div>
				  <div class="col-xs-6 col-sm-4 team text-center"><a href="team">Meet the Team</a></div>
				</div>
			</div>
		</div>


		@if(session('modal') == "Display")
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background: #e6133b;color: #fff;">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title text-center" style="font-weight: 600;">Message</h4>
						</div>
						<div class="modal-body">
							<p>Hi,</p>
							<p>This is a free service and this web-site hosted in free hosting and domain is free domain,resources are limited and any time server of this site can be down.</p>
							<p>We need your help to solve this problem and provide better service. <strong>Your support is key in solving this problem.</strong></p>
							<p>Would you consider <strong>DONATING 50tk OR other participation</strong> to help us?</p>
							<p>We thank you in advance for your support!</p>
							<p><a href="donate">Donate/Participation</a></p>
							<hr>
							<p>We are working on to generate <strong>All Department Routine</strong>. <br> Stay with us.</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		@endif
		
	</div>
	  

</body>
</html>