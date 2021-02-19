<?php
    require_once MODEL_PATH . "BlogModel.php";

    class BlogController {

        private $blogModel;

        public function __construct(){
            $this->blogModel = new BlogModel();
        }

        public function chosenView($innerView) {
            $path = VIEW_PATH . $innerView . 'View.php';
            require_once VIEW_PATH . "MenuView.html";
            require_once $path;

        }

        public function addBlogs(){
            $date = date('Y-m-d H:i:s');
            if (!empty($_POST)) {
                if (
                    !empty($_POST["title"]) &&
                    !empty($_POST["content"]) &&
                    !empty($_POST["copyright"])
                ) {
                    if ($this->blogModel->addNewBlog(
                        $_POST["title"],
                        $_POST["content"],
                        $date,
                        $_POST["copyright"]
                    )
                    ) {
                        header("Location: /MiniBlogProject");
                    }
                }
            }
        }

        public function filterDate(){
            if(empty($_GET['dateFrom']) && empty($_GET['dateTo'])) {
                $_GET['dateFrom'] = '';
                $_GET['dateTo'] = '';
            }
            if(!empty($_GET['id'])) {
                    $filterData = [
                        'id' => $_GET['id'],
                        'dateFrom' => $_GET['dateFrom'],
                        'dateTo' => $_GET['dateTo']
                    ];
                    $result = $this->blogModel->filterByDate($filterData);
                    return $result;
                } else {
                    $filterData = [
                        'dateFrom' => $_GET['dateFrom'],
                        'dateTo' => $_GET['dateTo']
                    ];
                    $result = $this->blogModel->filterByDate($filterData);
                    return $result;
            }
        }

        public function updateBlogs(){
            if (!empty($_GET['id']) && !empty($_POST)) {
                if (
                    !empty($_POST["newTitle"]) &&
                    !empty($_POST["newContent"]) &&
                    !empty($_POST["newCopyright"])
                    ) {
                        $id = $_GET['id'];
                        $newTitle = $_POST['newTitle'];
                        $newContent = $_POST['newContent'];
                        $newDate = date('Y-m-d H:i:s');
                        $newCopyright = $_POST['newCopyright'];
                        $updateData = [
                            "id" => $id,
                            "newTitle" => $newTitle,
                            "newContent" => $newContent,
                            "newDate" => $newDate,
                            "newCopyright" => $newCopyright
                        ];
                        if ($this->blogModel->updateBlogById($updateData)) {
                            header("Location: /MiniBlogProject");
                    }
                }
            }
        }
    }
//
//    $chosenController->updateBlogs();
//    $chosenController->addBlogs();

    $blogInstance = new BlogController();

    $blogInstance->addBlogs();
    $blogInstance->updateBlogs();
