<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CommentModel;
use App\Models\LikeModel;

class Profile extends BaseController
{
    protected $postModel;
    protected $commentModel;
    protected $likeModel;
    protected $userModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->likeModel = new LikeModel();
        $this->userModel = new \Myth\Auth\Models\UserModel();
    }

    public function index()
    {
        $user = $this->userModel->where('id', user_id())->first();
        $countPost = $this->postModel->selectCount('id_post', 'jumlah_post')->where('id_user', user_id())->first();
        $post = $this->postModel->where('id_user', user_id())->findAll();
        $data = [
            'title' => 'Profile',
            'profile'   => $user,
            'countPost' => $countPost,
            'post'      => $post,
        ];

        return view('profile/profile', $data);
    }

    public function liked_post()
    {
        $post = $this->likeModel->join('posts', 'likes.id_post=posts.id_post')->join('users', 'users.id=posts.id_user')->where('likes.id_user', user_id())->findAll();

        $data = [
            'title' => 'Liked Post',
            'posts' => $post,
        ];

        return view('profile/liked_post', $data);
    }

    public function edit_photo()
    {
        $foto = $this->request->getFile('foto');
        // dd($foto);
        $filename = $foto->getRandomName();
        $foto->move('assets/img/profile_photo', $filename);
        $data = [
            'id' => user_id(),
            'profile_image' => $filename,
        ];

        if (!$this->userModel->save($data)) {
            session()->setFlashdata('error', 'Gagal mengubah foto');
            return redirect()->to('/profile');
        }

        session()->setFlashdata('success', 'Berhasil mengubah foto');
        return redirect()->to('/profile');

        return view('profile/edit_foto', $data);
    }
}
