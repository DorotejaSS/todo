<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../app/views/main.css">
        <title>Document</title>
    </head>
    <body>
        <h1> LOGIN </h1>
        <div class="loginbox">
            <form action="" method="post">
                <div>
                    <label for="username">username:</label>
                    <input type="text" name="username" required>
                </div>
                <br>
                <div>
                    <label for="password">password:</label>
                    <input type="password" name="password" required>
                </div>

                <input class="loginbtn" type="submit" name="Login" value="Login">
            </form>
            <form action="/todo/public/registration" method="post">
                <input class="registerbtn" type="submit" name="register" value="Register">
            </form>
        </div>

    </body>
</html>
