<?php
$name = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $message = trim($_POST['message'] ?? '');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Your name">
        <br><br>
        <textarea name="message" placeholder="Your message"></textarea>
        <button type="submit">Send</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php if ($name === '' || $message === ''): ?>
            <p style="color:red;">Please enter your name.</p>
        <?php else: ?>
            <?php 
            $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $safe_message = htmlspecialchars($message,ENT_QUOTES,'UTF-8');
            ?>
            <p>Welcome, <?php echo $safe_name; ?>!</p>
            <p>Your message: <?php echo $safe_message; ?></p>
            <a href="index.php?name=<?php echo urlencode($safe_name); ?>">Go to Portfolio</a>
        <?php endif; ?>
    <?php endif; ?>
    
</body>
</html>