<!-- Login Form  
<form method="post" action="/user/login_end" name="login_form" id="login_form" onsubmit="return login_form_Function()">
    <div class="content">
    	<div class="title">
            <h2>Sign in</h2>
      		
		   	<div class="hr"></div>
        </div>
        <div class="content_inner">
        	<table width="978" border="0" cellspacing="0" cellpadding="0">
        		<tr>
					<td height="170" align="center" style="padding-top:50px;"><img src="/assets/images/login_icon.png" width="110" height="110" alt=""/></td>
				</tr>
				<tr>
				  <td class="login_text">Please, Fill in the blank<br>
					<span class="login_text_s">Email and Password</span></td>
				</tr>
				<tr>
					<td align="center"><input name="login_user_id" type="text" class="input" id="login_user_id" value="E-mail" /></td>
				</tr>
				<tr>
					<td align="center"><input name="user_pw" class="input" id="user_pw" onfocus="this.type='password'" value="password" /></td>
				</tr>
				<tr>
					<td class="checkbox"><input type="checkbox" name="remember_id_chx" id="remember_id_chx">Save ID</td>
				</tr>
				<tr>
					<td height="88" align="center">
					<input TYPE="IMAGE" src="/assets/images/bt_login.png" width="419" height="61" name="submit" value="submit">					
					</td>
				</tr>
				<tr>
					<td class="login_text_t1"><a href="/user/find_idpw">Find ID or PW</a> | <a href="/user/add_user">Sign up</a></td>
			  </tr>
			  
			</table>
		</div>
    </div>
</form>
 -->
 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aaron boost/estimate</title>

  <!-- Custom fonts for this template-->
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="/assets/css/main.css" type="text/css">
  
  <script type="text/javascript" src="/assets/js/jquery.js"></script>
  <script type="text/javascript" src="/assets/js/jquery-ui.js"></script>
  <script type="text/javascript" src="/assets/js/crypto.js"></script>
  
  <script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="/assets/js/jquery-ui.min.js"></script>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="login_user_id" id="login_user_id" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="login_user_pw" id="login_user_pw" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a class="btn btn-primary btn-user btn-block user_signin_ok">
                      Login
                    </a>
                    <hr>
                    <!-- 
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                     -->
                  </form>
                  <!--<hr>
                   
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                   -->
                  <div class="text-center">
                    <a class="small" href="/index.php/user/create_user">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
