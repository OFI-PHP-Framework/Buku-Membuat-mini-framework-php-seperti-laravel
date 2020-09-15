<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo ProjectURL ?>/login" method="post">
        <p>
            Username
        </p>
        <input name="username" type="text">

        <br>

        <p>
            Password
        </p>
        <input name="password" type="password">

        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>