<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create data</title>
</head>
<body>
    <form action="<?php echo ProjectURL ?>/update" method="post">
        <p>
            User
        </p>
        <input name="user" type="text">

        <p>
            Tweet
        </p>
        <input name="tweet" type="text">

        <br>

        <button type="submit">Save</button>
    </form>
</body>
</html>