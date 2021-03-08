<div class="container">
    <h1>Update post</h1>
    <?php if($_POST){
        echo \Config\Services::validation()->listErrors();
    } ?>
    <form class="" method='POST' action="/blog/update?post=<?= $_GET['post']; ?>">
        <div class="form-group">
            <label for="title">New Title: </label>
            <input class="form-control" type="text" name="NewTitle" id="title" value="<?= $value['title']; ?>">
        </div>
        <div class="form-group">
            <label for="content">New Content: </label>
            <textarea class="form-control" name="NewContent" id="content"><?= $value['content']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="copyright">New Author: </label>
            <input class="form-control" type="text" name="NewCopyright" id="copyright" value="<?= $value['copyright']; ?>">
        </div>
        <div class="form-group">
            <label for="date">Current Date: </label>
            <?= date('Y-m-d') ?>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update Post</button>
        </div>
    </form>

</div>