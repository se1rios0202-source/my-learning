<form method="post">
    <input type="text" name="name" placeholder="Your name">
    <button type="submit">Send</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);

    var_dump($_POST['name']);

    if ($name === '') {
        echo "<p>Please enter your name.</p>";
    } else {
        $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        echo "<p>Hello, $safe_name!</p>";
    }
}
?>