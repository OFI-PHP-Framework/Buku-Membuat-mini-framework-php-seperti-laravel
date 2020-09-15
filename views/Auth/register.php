<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
</head>
<body>
    <form action="<?php echo ProjectURL ?>/register" method="post">
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
        <button type="submit">Daftar</button>
    </form>
</body>
</html>