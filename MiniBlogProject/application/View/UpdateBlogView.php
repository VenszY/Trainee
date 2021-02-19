<?php  $asd = new BlogController();
        $blog = $asd->filterDate();

        print_r($blog[0]['title']);
?>
        <form method='POST' action="?controller=Blog&id=<?php echo $_POST['id']; ?>">
            <label>Title</label>
            <input type="text" name="newTitle" value="<?php echo $blog[0]['title']; ?>">
            <label>Content</label>
            <textarea name="newContent" value="<?php echo $blog['content']; ?>"></textarea>
            <label>Author</label>
            <input type="text" name="newCopyright" value="<?php echo $blog['copyright']; ?>">
            <label>Current Date: </label>
            <?php echo $date = date('Y-m-d'); ?>
            <button type="submit" name="update">Update</button>
        </form>
    </body>
</html>

