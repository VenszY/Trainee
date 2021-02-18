<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="application/View/css/style.css">
    <script  src="application/View/js/MoreLess.js"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
    <body>
        <table class ='table table-bordered text text-center table-hover' id="TableA">
            <tr class='active'>
                <th class='text text-center'>Blog Title</th>
                <th class='text text-center'>Blog Content</th>
                <th class='text text-center'>Public Date</th>
                <th class='text text-center'>Author</th>
            </tr>
            <?php require_once dirname(dirname(dirname(__FILE__))) . "/libs/pagination.php"; ?>
        </table>
    </body>
</html>