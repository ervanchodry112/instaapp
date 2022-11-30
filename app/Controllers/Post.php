<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CommentModel;
use App\Models\LikeModel;

class Post extends BaseController
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
        return redirect()->to(base_url('home'));
    }

    public function new_post()
    {
        $data = [
            'title' => 'New Post',
            'validation'    => \Config\Services::validation(),
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

    public function delete_post()
    {
        $id = $this->request->getVar('id');
        $post = $this->postModel->where('id_post', $id)->first();
        if ($post->id_user != user_id()) {
            session()->setFlashdata('error', 'Anda tidak memiliki akses untuk menghapus post ini');
            return redirect()->to(base_url('home'));
        }


        if (!$this->postModel->where('id_post', $id)->delete()) {
            session()->setFlashdata('error', 'Gagal menghapus post');
            return redirect()->to(base_url('home'));
        }
        unlink('assets/img/post_image/' . $post->image);
        session()->setFlashdata('success', 'Berhasil menghapus post');
        return redirect()->to(base_url('home'));
    }

    public function edit_post()
    {
        $id = $this->request->getVar('id');
        $post = $this->postModel->where('id_post', $id)->first();
        $data = [
            'title' => 'Edit Post',
            'post' => $post,
        ];
        return view('home/edit_post', $data);
    }

    public function save_post()
    {
        $caption = $this->request->getVar('caption');
        // dd($this->request->getVar());

        $data = [
            'id_post'   => $this->request->getVar('id_post'),
            // 'id_user'   => user_id(),
            'caption'   => $caption,
        ];

        if (!$this->postModel->save($data)) {
            session()->setFlashdata('error', 'Gagal Mengedit Post');
            return redirect()->to(base_url('home'))->withInput();
        }
        session()->setFlashdata('success', 'Berhasil Mengedit Post');
        return redirect()->to(base_url('home'));
    }

    public function like($id)
    {
        $like = $this->likeModel->where('id_post', $id)->where('id_user', user_id())->first();
        if ($like) {
            $this->likeModel->where('id_post', $id)->where('id_user', user_id())->delete();
            // session()->setFlashdata('success', 'Berhasil unlike post');
            return redirect()->to(base_url('home'));
        }
        $data = [
            'id_post'   => $id,
            'id_user'   => user_id(),
            'is_liked'   => 1,
        ];
        if (!$this->likeModel->save($data)) {
            // session()->setFlashdata('error', 'Gagal like post');
            return redirect()->to(base_url('home'));
        }
        // session()->setFlashdata('success', 'Berhasil like post');
        return redirect()->to(base_url('home'));
    }

    public function comment_post($id)
    {
        $comment = $this->commentModel->join('users', 'users.id=comments.id_user')->where('comments.id_post', $id)->findAll();
        $post = $this->postModel->where('id_post', $id)->join('users', 'users.id=posts.id_user')->first();
        // dd($post);
        $data = [
            'title' => "Comments",
            'comments'  => $comment,
            'post'  => $post,
        ];

        return view('home/comment', $data);
    }

    public function comment()
    {
        $id_post = $this->request->getVar('id_post');
        $comment = $this->request->getVar('comment');
        $data = [
            'id_post'   => $id_post,
            'id_user'   => user_id(),
            'comment'   => $comment,
            'tanggal'   => date('Y-m-d'),
        ];
        if (!$this->commentModel->save($data)) {
            session()->setFlashdata('error', 'Gagal menambahkan komentar');
            return redirect()->to(base_url('home'));
        }
        session()->setFlashdata('success', 'Berhasil menambahkan komentar');
        return redirect()->to(base_url('home'));
    }

    public function edit_comment()
    {
        $id = $this->request->getVar('id');
        $comment = $this->commentModel->where('id_comment', $id)->first();
        $data = [
            'title' => 'Edit Comment',
            'comment' => $comment,
        ];
        return view('home/edit_comment', $data);
    }

    public function save_comment()
    {
        $comment = $this->request->getVar('comment');
        $id = $this->request->getVar('id_comment');
        $data = [
            'id_comment'   => $id,
            'comment'   => $comment,
        ];

        if (!$this->commentModel->save($data)) {
            session()->setFlashdata('error', 'Gagal Mengedit Comment');
            return redirect()->to(base_url('home'))->withInput();
        }
        session()->setFlashdata('success', 'Berhasil Mengedit Comment');
        return redirect()->to(base_url('home'));
    }

    public function delete_comment()
    {
        $id = $this->request->getVar('id');
        $comment = $this->commentModel->where('id_comment', $id)->first();
        if ($comment->id_user != user_id()) {
            session()->setFlashdata('error', 'Anda tidak memiliki akses untuk menghapus comment ini');
            return redirect()->to(base_url('home'));
        }
        if (!$this->commentModel->where('id_comment', $id)->delete()) {
            session()->setFlashdata('error', 'Gagal menghapus comment');
            return redirect()->to(base_url('home'));
        }
        session()->setFlashdata('success', 'Berhasil menghapus comment');
        return redirect()->to(base_url('home'));
    }
}
