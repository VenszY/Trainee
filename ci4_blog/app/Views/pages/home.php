<section>
    <?php
        $session = \Config\Services::session();

        if (isset($session->success)) { ?>
            <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="0">
                <?php echo $session->success ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


       <?php }
    ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">My Codeigniter Blog!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
</section>
<section class="blog_section">
    <div class="container">
        <form method="GET" action="/pages/filter">
            <label for="dateFrom">Date From: </label>
                <input type="date" id="dateFrom" name="dateFrom">
            <label for="dateTo">Date To: </label>
                <input type="date" id="dateTo" name="dateTo">
            <button class="btn btn-primary" type="submit">Filter</button>
        </form>
    </div>
    <br>
    <div class="container">
    <table class ='table table-bordered text text-center table-hover' id="TableA">
        <tr class='active'>
            <th class='text text-center'>Blog Title</th>
            <th class='text text-center'>Blog Content</th>
            <th class='text text-center'>Public Date</th>
            <th class='text text-center'>Author</th>
            <th class='text text-center'>Edit Blog</th>
        </tr>
        <?php
        $dotsCounter = 0;
        $moreCounter = 0;
        $btnCounter = 0;
        $funcCounter = 0;

            if ($news):
                foreach ($news as $newsItem) {
        ?>
                    <tr>
                        <td><?php echo $newsItem['title']; ?></td>
                        <td>
                            <?php

                            if(strlen($newsItem['content']) > 15) {
                                echo substr($newsItem['content'], 0, 15); ?><span id='dots<?php $dotsCounter++; echo $dotsCounter; ?>'>...</span><span id='more<?php $moreCounter++; echo $moreCounter; ?>' class="more"><?php echo substr($newsItem['content'], 15); ?></span>
                                <button class="btn btn-outline-dark" onclick='moreLess<?php $funcCounter++; echo $funcCounter; ?>()' id='btn<?php $btnCounter++; echo $btnCounter; ?>' >Read more</button>
                                <?php
                            } else {
                                echo $newsItem['content'];
                            }
                            ?>
                        </td>
                        <td><?php echo $newsItem['date']; ?></td>
                        <td><?php echo $newsItem['copyright']; ?></td>
                        <td>
                            <a class="btn btn-outline-success" href="/blog/update?post=<?php echo $newsItem['id']; ?>">Edit Blog</a>
                        </td>
                    </tr>
       <?php }
            endif;
        ?>
    </table>
        <div class="d-flex justify-content-center">
            <?php if ($pager) :?>
                <?php $pagi_path='/news'; ?>
                <?php $pager->setPath($pagi_path); ?>
                <?= $pager->links() ?>
            <?php endif ?>
        </div>
    </div>
</section>