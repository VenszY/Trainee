
    <body>
        <form method='GET' action="?controller=Blog">
            <label>Date From: </label>
            <input type="date" name="dateFrom">
            <label>Date to: </label>
            <input type="date" name="dateTo">
            <button type="submit">Filter</button>
        </form>
        <table class ='table table-bordered text text-center table-hover' id="TableA">
            <tr class='active'>
                <th class='text text-center'>Blog Title</th>
                <th class='text text-center'>Blog Content</th>
                <th class='text text-center'>Public Date</th>
                <th class='text text-center'>Author</th>
                <th class='text text-center'>Update</th>
            </tr>
            <?php require_once dirname(dirname(dirname(__FILE__))) . "/libs/pagination.php"; ?>
        </table>
    </body>
</html>