<?php


namespace App\Controllers;

use App\Models\BlogModel;
use Config\Services;
use CodeIgniter\I18n\Time;


class Blog extends BaseController
{

    public function blogs($slug){

        echo view('templates/header');
        echo view('blog/post');
        echo view('templates/footer');
    }

    public function create(){
        helper('form');
        $model = new BlogModel();


        if (!$this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required'
        ])) {
            print_r($_POST);
            echo view('templates/header');
            echo view('blog/create');
            echo view('templates/footer');
        } else {
            $model->save(
                [
                   'title' => $this->request->getVar('title'),
                   'content' => $this->request->getVar('content'),
                   'copyright' => $this->request->getVar('copyright'),
//                   'date' => $this->date
                ]
            );
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'New post was created!');

            return redirect()->to('/');
        }
    }

    public function update() {
        helper('form');
        $model = new BlogModel();
        $sql = "CURRENT_TIMESTAMP()";

        if (!$this->validate([
            'NewTitle' => 'required',
            'NewContent' => 'required'
        ])) {
            $input['value'] = $model->getPosts($_GET['post']);
            print_r($_POST);
            echo view('templates/header', $input);
            echo view('blog/update');
            echo view('templates/footer');
        } else {

//            $myTime = Time::yesterday('America/Chicago', 'en_US');
            $data = [
                'title' => $_POST['NewTitle'],
                'content' => $_POST['NewContent'],
                'copyright' => $_POST['NewCopyright'],
                'date' => $date = date("Y-m-d H:i:s")

            ];
            echo helper('date');

            echo $model->update(['id' => $_GET['post']], $data);
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'Post was updated!');

            return redirect()->to('/');
        }
    }
}
