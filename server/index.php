<?php
session_start();
if(isset($_SESSION['loggedin'])and $_SESSION['loggedin']===TRUE){
	header('location: my.php');
}
?>
<!doctype html>
<html lang="en">
<head>
  <title>Offlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">

</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
                <h1 class="mb-4 pb-3">Bienvenido a Offlib</h1>
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
                                <!--login-->
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="form-group"> 
                                               <!--cuidado--> <form class="form-group" action="login.php" method="POST">
												<input type="email" required="required" name="email" class="form-style" placeholder="Email">
												<span class="error_message"><?php if(isset($_SESSION['err'])){echo $_SESSION['err'];}?></span>
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" required="required" minlength="8" name="password"class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                                            <input class="btn mt-4" name="submit" type="submit" value="Ingresar">
											<!--<a href="https://www.web-leb.com/code" class="btn mt-4">Login</a>-->
                      <p class="mb-0 mt-4 text-center"><a href="https://www.web-leb.com/code" class="link">Forgot your password?</a></p>
				      					</div>
			      					</div>
			      				</div>
</form>
                                <!--register-->
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">Sign Up</h4>
											<div class="form-group">
                                            <form class="form-group" action="register.php" method="POST">
												<input type="text" required="required" name="nombre" class="form-style" placeholder="Full Name">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="tel" required="required" pattern="{0-9}" name="telefono" class="form-style" placeholder="Phone Number">
												<i class="input-icon uil uil-phone"></i>
											</div>	
                      <div class="form-group mt-2">
												<input type="email" required="required" name="email" class="form-style" placeholder="Email">
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" required="required" minlength="8" name="password" class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                                            <input class="btn mt-4" name="submit"  type="submit" value="Registrarse">
											<!--<a href="https://www.web-leb.com/code" class="btn mt-4">Register</a>-->
</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>
