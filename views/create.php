<?php 
    // Import class
    use App\Middleware\cekLogin;
use Volnix\CSRF\CSRF;

// jalankan middlewarenya
    $middleware = new cekLogin;
    $middleware->handle();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create data</title>
</head>
<body>
    <form action="<?php echo ProjectURL ?>/store" method="post">
    <?php echo CSRF ?>
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