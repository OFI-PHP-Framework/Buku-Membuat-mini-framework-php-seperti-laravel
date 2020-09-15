<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit data</title>
</head>
<body>
    <form action="<?php echo ProjectURL ?>/update?id=<?php echo $data->id ?>" method="post">
        <p>
            User
        </p>
        <input name="user" value="<?php echo $data->user ?>" type="text">

        <p>
            Tweet
        </p>
        <input name="tweet" type="text" value="<?php echo $data->tweet ?>">

        <br>

        <button type="submit">Save</button>
    </form>
</body>
</html>