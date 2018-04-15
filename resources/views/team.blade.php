<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Team</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <script src="{{asset('public/js/app.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
	hr{
		height: 1px;
		background-color: rgba(180, 185, 189, 0.19);
	}

	#text_in_center{
		height: 200px;
		font-size: 18px;
		display: flex;
	    align-items: center;
	}

	#nm{
		text-align: center;
		font-weight: 600;
	}

	#bn{
		background-color: #277a67;
		color: #fff;
	}
	a {
	    cursor: pointer;
	    color: #0e9e98;
	}
	ul>li{
		list-style-type: none;
		font-size: 16px;
	}
	.progress {
	  width: 100%;
	  background-color: #ddd;
	}
	.cnb1, .cnb2{
	    width: 0;
	    background-color: #00bcd4;
	    color: #bf1307;
	    height: 25px;
	    line-height: 24px;
	    text-align: center;
	}
	
</style>

<body>

<div class="container">
	<div class="row">
	<?php $date = new DateTime();

		$date->modify('+6 hour');
		$date2 = $date->format('l.');
		$time = $date->format('h:i a');
		 ?>
		<div class="col-md-12" style="background-color: #277a67;">
			<div class="col-md-4"><marquee direction="up" SCROLLDELAY=250><h3 style='text-align: center; font-family: "Times New Roman", Times, Baskerville, Georgia, serif; color: #fff; margin-top: auto;''><?php echo "Today is " . $date2; ?></h3></marquee>
			</div>
				<div class="col-md-4" style="margin-top: 7px;"><h1 style='text-align: center; font-family: "Times New Roman", Times, Baskerville, Georgia, serif; color: #fff; margin-top: auto;''>About Team</h1></div>
			<div class="col-md-4" id="clockAutoRefresh"><marquee direction="up" SCROLLDELAY=250><h3 style='text-align: center; font-family: "Times New Roman", Times, Baskerville, Georgia, serif; color: #fff; margin-top: auto;''><?php echo $time; ?></h3></marquee></div>
		</div>
		<div class="col-md-12 well">
			<h3 id="nm">Mahmudul Hasan Zahid</h3>
			<hr>
			<div class="col-md-12 well">
				<div class="col-md-4">
				
				<div class="row">
					<div class="col-md-2">
						<a href="https://www.fb.me/mhzahid01" target="_blank"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
						<a href="https://www.linkedin.com/in/mahmudul-hasan-zahid-065481121/" target="_blank"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
					</div>
					<div class="col-md-10" style="text-align: center;">
						<img src="public/img/IMG_0600.JPG" alt="Mahmudul Hasan Zahid" height="240px;" width="220px;">
					</div>
				</div>
				
				<span></span>
				</div>
			<div class="col-md-8" id="text_in_center">
				<ul>
					<li>Student of Daffodil International University</li>
					<li>Email: mahmudul35-1088@diu.edu.bd</li>
					<li>Department: SWE (Software Engineering)</li>
					<li>Batch: 16<sup>th</sup></li>
					<li>
						<h4>Contribute : </h4>
						<div class="progress" data-width="97%">
						    <div class="cnb1"></div>
						</div>
					</li>
				</ul>
			</div>
			</div>

		</div>
		<div class="col-md-12 well">
			<h3 id="nm">Sajeeb Chandan</h3>
			<hr>
			<div class="col-md-12 well">
				<div class="col-md-4">
				
				<div class="row">
					<div class="col-md-2">
						<a href="https://www.fb.me/sajeeb.chandan" target="_blank"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
					</div>
					<div class="col-md-10" style="text-align: center;">
						<img src="public/img/img123-456.jpg" alt="Sajeeb Chandan" height="240px;" width="220px;">
					</div>
				</div>
				
				<span></span>
				</div>
			<div class="col-md-8" id="text_in_center">
				<ul>
					<li>Student of Daffodil International University</li>
					<li>Email: chanda35-858@diu.edu.bd</li>
					<li>Department: SWE (Software Engineering)</li>
					<li>Batch: 16<sup>th</sup></li>
					<li>
						<h4>Contribute : </h4>
						<div class="progress" data-width="3%">
						    <div class="cnb2"></div>
						</div>
					</li>
				</ul>
			</div>
			</div>

		</div>
		<div>
			<a href="{{URL::to('/')}}"><button id="bn" class="btn btn-lg btn-block">Back to Site</button></a>
		</div>
	</div>
</div>

<script>
  function animateProgressBar(el, width){
      el.animate(
          {width: width}, 
          {
              duration: 4000,
              step: function(now, fx) {
                  if(fx.prop == 'width') {
                      el.html(Math.round(now * 1) / 1 + '%');
                  }
              }
          }        
      );    
  }


  $('.progress').each(function(){
     animateProgressBar($(this).find("div"), $(this).data("width")) 
  });
</script>
	
</body>
</html>