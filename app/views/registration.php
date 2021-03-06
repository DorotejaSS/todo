<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TO DO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="../app/views/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../app/views/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../app/views/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../app/views/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../app/views/vendor/animate/animate.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../app/views/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../app/views/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../app/views/css/util.css">
        <link rel="stylesheet" type="text/css" href="../app/views/css/main.css">
    <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('../app/views/images/bg-01.jpg');">
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                    <form class="login100-form validate-form flex-sb flex-w" method="post">
                        <span class="login100-form-title p-b-53">
                            Sign Up
                        </span>
                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Username
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Username is required">
                            <input class="input100" type="text" name="username" required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="p-t-13 p-b-9">
                            <span class="txt1">
                                Password
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Name
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Name is required">
                            <input class="input100" type="text" name="name" required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="p-t-31 p-b-9">
                            <span class="txt1">
                                Email
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Email is required">
                            <input class="input100" type="email" name="email" required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-17">
                            <input class="login100-form-btn" type="submit" name="Register" value="Sign Up">
                        </div>

                        <div class="w-full text-center p-t-55">
						<span class="txt2">
							Already a member?
						</span>

						<a href="/todo/public/login" class="txt2 bo1">
							Sign in now
						</a>
					</div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
