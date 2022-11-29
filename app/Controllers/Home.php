<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\LikeModel;
use App\Models\PostModel;

class Home extends BaseController
{
    protected $postModel;
    protected $commentModel;
    protected $likeModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->likeModel = new LikeModel();
    }

    public function index()
    {
        $post = $this->postModel->join('users', 'posts.id_user=users.id')->findAll();
        $data = [
            'title' => 'Beranda',
            'posts' => $post,
        ];
        return view('home/home', $data);
    }

    public function new_post()
    {
        $data = [
            'title' => 'New Post',
        ];

        return view('home/new_post', $data);
    }

    public function create_post()
    {
        $caption = $this->request->getVar('caption');
        $file = $this->request->getFile('image');
        $file_name = $file->getRandomName();
        $file->move('assets/img/post_image', $file_name);
        // dd(date('Y-m-d'));
        $save = [
            'id_user'   => user_id(),
            'image'     => $file_name,
            'caption'   => $caption,
            'tanggal'   => date('Y-m-d'),
        ];

        if (!$this->postModel->save($save)) {
            session()->setFlashdata('error', 'Gagal Membuat Post');
            return redirect()->to(base_url('new_post'))->withInput();
        }
        session()->setFlashdata('success', 'Berhasil membuat post');
        return redirect()->to(base_url('home'));
    }
}
