<?php
    require_once "DbConnModel.php";

    class BlogModel extends Database {

        public function addNewBlog($title, $content, $date, $copyright) {
            $prep = $this->connection->prepare('INSERT INTO Blog(title, content, date, copyright) VALUES(:title, :content, :date, :copyright)');
            $prep->bindParam(':title', $title);
            $prep->bindParam(':content', $content);
            $prep->bindParam(':date', $date);
            $prep->bindParam(':copyright', $copyright);
            $prep->execute();
            return true;
        }

        public function updateBlogById($id, $title, $content, $date, $copyright) {
            $sql = "
                UPDATE
                    Blog
                SET
                    'title' = '".$title."',
                    'content' = '".$content."',
                    'date' = '".$date."',
                    'copyright' = '".$copyright."'
            ";

            $this->connection->exec($sql);
            return true;
        }

        public function getAllBlogs() {
            $sql = "
                SELECT * FROM Blog
                ORDER BY date DESC 
            ";
            $result = $this->connection->query($sql);
            $allBlogs = $result->fetchAll();
            if(!empty($allBlogs)) {
                return $allBlogs;
            } else {
                return [];
            }
        }

        public function deleteBlogById($id) {
            $sql = "
                DELETE FROM
                    Blog
                WHERE
                    id = '".$id."';
            ";

            $this->connection->exec($sql);
            return true;
        }

        public function displayBlogById($id) {
            $sql = "
                SELECT FROM 
                    Blog
                WHERE id =".$id;
            $this->connection->exec($sql);
            return true;
        }


        public function filterByDate($dateFrom, $dateTo){
            $sql = " 
                SELECT * FROM Blog
                CASE
                    WHEN '".$dateFrom."' = NULL THEN 
                        SELECT * FROM Blog
                            WHERE date = '".$dateTo."'
                    WHEN '".$dateTo."' = NULL THEN
                        SELECT * FROM Blog
                            WHERE date = '".$dateFrom."'
                    ELSE
                        SELECT * FROM Blog
                            WHERE date BETWEEN '".$dateFrom."' AND '".$dateTo."'
                ORDER BY date DESC 
            ";
            $result = $this->connection->query($sql);
            $allBlogs = $result->fetchAll();
            if(!empty($allBlogs)) {
                return $allBlogs;
            } else {
                return [];
            }
        }

    }