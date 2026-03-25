<form action="" method="post">
    <input type="text" name="name" placeholder="Your name">
    <button type="submit">Send</button>
</form>

<?php
if (!empty($_POST['name'])) {
    echo "Hello, " . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
}
?>