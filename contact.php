<?php
$name = '';
$email = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {$error = 'Please fill in all fields.';
    } elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = 'Invalid email format.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <div class="card contact-form">
        <form method="post">
            <input type="text" name="name" placeholder="Your name"
                value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="email" name="email" placeholder="Your email">
            <textarea name="message" placeholder="Your message"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></textarea>

            <button class ="btn send-btn" type="submit">Send</button>
        </form>
            <div class="result-message">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($name === '' || $message === '')): ?>
                    <p class="error-message">
                        Please fill in <strong>all fields</strong>.
                    </p>

                <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <?php 
                    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                    $safe_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
                    ?>
                    <p class="success-message">
                        Welcome, <strong><?php echo $safe_name; ?></strong>!
                    </p>
                    <p class="success-sub"><?php echo $safe_message; ?>
                    </p>
                    <a class="btn portfolio-btn" href="index.php?name=<?php echo urlencode($safe_name); ?>">
                        Go to Portfolio
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>