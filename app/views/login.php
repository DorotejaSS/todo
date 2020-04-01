<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./assets/main.css"/>
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
            <div class="loginbox">
                <label for="username">username:</label>
                <input type="text" name="username" required>

                <label for="password">password:</label>
                <input type="password" name="password" required>

                <input class = "loginbtn" type="submit" name="Login" value="Login">
            </div>
        </form>
        <form action="/todo/public/registration" method="post">
            <button name="register" type="submit" value="register">Register</button>
        </form>
    </body>
</html>
