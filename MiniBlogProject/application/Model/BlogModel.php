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

        public function updateBlogById($updateData) {
            $prep = $this->connection->prepare('UPDATE Blog SET title=:newTitle, content=:newContent, date=:newDate, copyright=:newCopyright WHERE id=:sameid ');
            $prep->bindParam(':newTitle', $updateData['newTitle']);
            $prep->bindParam(':newContent', $updateData['newContent']);
            $prep->bindParam(':newDate', $updateData['newDate']);
            $prep->bindParam(':newCopyright', $updateData['newCopyright']);
            $prep->bindParam(':sameid', $updateData['id']);
            $prep->execute();
            return true;
//            $sql = "
//                UPDATE
//                    Blog
//                SET
//                    title = '".$updateData['newTitle']."',
//                    content = '".$updateData['newContent']."',
//                    date = '".$updateData['newDate']."',
//                    copyright = '".$updateData['newCopyright']."'
//                WHERE
//                    id = ".$updateData['id']."
//            ";
//
//            $this->connection->exec($sql);
//            return true;
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
                SELECT * FROM 
                    Blog
                WHERE id =".$id;
            $result = $this->connection->query($sql);
            $allBlogs = $result->fetchAll();
            if(!empty($allBlogs)) {
                return $allBlogs;
            } else {
                return [];
            }
        }


        public function filterByDate($filterData){

            $where = " WHERE 1 ";
            if (!empty($filterData['dateFrom'])) {
                $where .= " AND date >= '".$filterData['dateFrom']."' ";
            }
            if (!empty($filterData['dateTo'])) {
                $where .= " AND date <= '".$filterData['dateTo']."' ";
            }
            if (!empty($filterData['id'])) {
                $where .= "AND id = '".$filterData['id']."' ";
            }

            $sql = "
                SELECT * FROM Blog
                ".$where."
                ORDER BY date DESC  
            ";

            $result = $this->connection->query($sql);
            $allBlogs = $result->fetchAll();
            if(!empty($allBlogs)) {
                return $allBlogs;
            } else {
                return [];
            }

//            if($dateFrom == "NULL"){
//                $where = "
//                    WHERE date = ".$dateTo."
//                ";
//            } elseif ($dateTo == "NULL") {
//                $where = "
//                    WHERE date = ".$dateFrom."
//                ";
//            } else {
//                $where = "
//                    WHERE date BETWEEN ".$dateFrom." AND ".$dateTo."
//                ";
//            }
//
//            $sql = "
//                SELECT * FROM Blog
//                    ".$where."
//                ORDER BY date DESC
//            ";


//            if($dateFrom == "NULL"){
//                $sql = "
//                    SELECT * FROM Blog
//                        WHERE date = '".$dateTo."'
//                        ORDER BY date DESC
//                ";
//            } elseif ($dateTo == "NULL") {
//                $sql = "
//                    SELECT * FROM Blog
//                        WHERE date = '".$dateFrom."'
//                        ORDER BY date DESC
//                ";
//            } else {
//                $sql = "
//                    SELECT * FROM Blog
//                        WHERE date BETWEEN '".$dateFrom."' AND '".$dateTo."'
//                        ORDER BY date DESC
//                ";
//            }

//            $sql = "
//                SELECT * FROM Blog
//                CASE
//                    WHEN '".$dateFrom."' = NULL THEN
//                        SELECT * FROM Blog
//                            WHERE date = '".$dateTo."'
//                    WHEN '".$dateTo."' = NULL THEN
//                        SELECT * FROM Blog
//                            WHERE date = '".$dateFrom."'
//                    ELSE
//                        SELECT * FROM Blog
//                            WHERE date BETWEEN '".$dateFrom."' AND '".$dateTo."'
//                ORDER BY date DESC
//            ";

        }

    }