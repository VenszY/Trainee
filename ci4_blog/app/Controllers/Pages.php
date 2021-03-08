<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Pages extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data = [
            'news' => $model->getPosts(),
            $model->orderBy('date', 'DESC' ),
            'news' => $model->paginate(5),
            'pager' => $model->pager
    ];

        echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');
    }

    public function view($page = 'home'){

        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view('templates/header');
        echo view('pages/'.$page);
        echo view('templates/footer');
    }

        public function filter() {
            $model = new BlogModel();

            if(empty($_GET['dateFrom']) && empty($_GET['dateTo'])) {
                $_GET['dateFrom'] = '';
                $_GET['dateTo'] = '';
            }
            $filterData = [
                'dateFrom' => $_GET['dateFrom'],
                'dateTo' => $_GET['dateTo']
            ];
            print_r($filterData);
            $data = [
                'news' => $model->filterByDate($filterData),
                $model->orderBy('date', 'DESC' ),


//                $model->paginate(5),
//                'pager' => $model->pager
            ];

            echo view('templates/header', $data);
            echo view('pages/filtered');
            echo view('templates/footer');
        }

}
