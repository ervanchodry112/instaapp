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

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->likeModel = new LikeModel();
    }

    public function index()
    {
        //
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
}
