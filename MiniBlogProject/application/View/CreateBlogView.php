<?php require_once "MenuView.html"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form method='POST' action="?controller=Blog">
        <label>Title</label>
        <input type="text" name="title">
        <label>Content</label>
        <textarea name="content"></textarea>
        <label>Author</label>
        <input type="text" name="copyright">
        <label>Current Date: </label>
        <?php echo $date = date('Y-m-d'); ?>
        <button type="submit" name="create">Create</button>
    </form>
</body>
</html>

