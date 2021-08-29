<?php

namespace RainLab\Blog\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use RainLab\Blog\Models\Post;

class FormDownload extends Controller
{
    protected $post;
    protected $formDownload;

    public $implement = [
        \Backend\Behaviors\ListController::class,
    ];

    public $listConfig = 'config_list.yaml';

    public function __construct(Post $post, \RainLab\Blog\Models\FormDownload $formDownload)
    {
        $this->post = $post;
        $this->formDownload = $formDownload;

        parent::__construct();

        BackendMenu::setContext('RainLab.Blog', 'blog', 'formdownload');
    }
}
