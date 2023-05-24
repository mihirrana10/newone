<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
		<div class="row">
					
			<div class="row">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Ragister to your account</h2>
					
					<!-- <form> -->
                                    
                              <form role="form" method="post" action="<?php echo base_url(); ?>admin/ragister/create" enctype="multipart/form-data">

							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="form-control" name="txt_username" id="txt_username" type="text" placeholder="type user name"/>
							</div>
							<br>
							<div class="clearfix"></div>
                                          <div class="input-prepend" title="number">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="form-control" name="txt_email" id="txt_email" type="email" placeholder="type email"/>
							</div>
							<br>
							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="form-control" name="txt_pwd" id="txt_pwd" type="password" placeholder="type password"/>
							</div>
                                          <br>
                                          
							<div class="clearfix"></div>
							
							<!--<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>-->

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<!--<hr>
                              
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>	-->
                              <br>
                              <p>also acount <a href="<?php echo base_url() ?>admin/ragister">register here</a></p>
				</div><!--/span-->
			</div><!--/row-->
			
                  
	

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
            
</body>
</html>