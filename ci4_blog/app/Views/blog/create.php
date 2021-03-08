<div class="container">
    <h1>Create new post</h1>
    <?php if($_POST){
        echo \Config\Services::validation()->listErrors();
    } ?>
    <form class="" method='POST' action="/blog/create">
        <div class="form-group">
            <label for="title">Title: </label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="content">Content: </label>
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>
        <div class="form-group">
            <label for="copyright">Author: </label>
            <input class="form-control" type="text" name="copyright" id="copyright">
        </div>
        <div class="form-group">
            <label for="date">Current Date: </label>
            <?= date('Y-m-d') ?>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="create">Create</button>
        </div>
    </form>

</div>