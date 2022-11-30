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
        $post = $this->postModel->select('posts.id_post, posts.image, posts.id_user, posts.caption, posts.tanggal, likes.is_liked, likes.id_user as likes_user, users.name, users.profile_image')
            ->join('likes', 'posts.id_post=likes.id_post', 'left')->join('users', 'posts.id_user=users.id')->findAll();
        // $like = $this->likeModel->select('id_post')->where('id_user', user_id())->findAll();
        // dd($post);
        $data = [
            'title' => 'Beranda',
            'posts' => $post,
            // 'like'  => $like,
        ];
        return view('home/home', $data);
    }
}
