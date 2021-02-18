<?php
    require_once MODEL_PATH . "BlogModel.php";

    class BlogController {

        private $blogModel;

        public function __construct(){
            $this->blogModel = new BlogModel();
        }

        public function listBlogs(){
            $results = $this->blogModel->getAllBlogs();

//            if(strlen($results['1']['content']) > 15 ) {
//                $resultCut = substr($results['content'], 0, 15);
//                $endPoint = strrpos($resultCut, ' ');
//
//                $results['content'] = $endPoint? substr($resultCut, 0, $endPoint) : substr($resultCut, 0);
//                $results['content'] .= '...';
//            }
            return $results;
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
                } else {
                    echo "Error";
                }
            }

        }

        public function filterDate(){
            if (!empty($_POST)) {
                if (!empty($_POST['dateFrom']) && !empty($_POST['dateTo'])) {
                    $result = $this->blogModel->filterByDate($_POST['dateFrom'], $_POST['dateTo']);
                    return $result;
                }
            }
        }
    }


    $create = new BlogController();
    $create->addBlogs();
    $list = new BlogController();
    $resultOfListedBlogs = $list->listBlogs();
    $filter = new BlogController();
    $resultOfFilterDate = $filter->filterDate();