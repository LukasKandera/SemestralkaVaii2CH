<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Post;

class PostController extends AControllerBase
{
    public function authorize(string $action)
    {
        return true;
    }

    public function index(): Response
    {
        $posts = Post::getAll();
        return $this->html($posts);
    }
    public function add(): Response
    {
        return $this->html();
    }

}