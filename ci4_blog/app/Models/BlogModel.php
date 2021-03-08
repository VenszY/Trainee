<?php
    namespace App\Models;

    use CodeIgniter\Model;
    use CodeIgniter\Models;
    use Config\Database;


    class BlogModel extends Model
    {
        protected $table = 'Blog';
        protected $allowedFields = ['title', 'content', 'copyright', 'slug'];


        public function getPosts($slug = null, $filterData = null)
        {
            if (!$slug) {

                return $this->findAll();

            }

//

            return $this->asArray()
                ->where(['id' => $slug])
                ->first();
        }

        public function filterByDate($filterData)
        {

            if (!empty($filterData)) {
                $db = \Config\Database::connect();
                $db->table('Blog');

                $where = " WHERE 1 ";
                if (!empty($filterData['dateFrom'])) {
                    $where .= " AND date >= '" . $filterData['dateFrom'] . "' ";
                }
                if (!empty($filterData['dateTo'])) {
                    $where .= " AND date <= '" . $filterData['dateTo'] . "' ";
                }

                $sql = "
                    SELECT * FROM Blog
                    " . $where . "
                ";
//                return $sql;
//                die();

                $result = $db->query($sql);
                $arrResult = $result->getResultArray();
                return $arrResult;
            }

        }
    }
