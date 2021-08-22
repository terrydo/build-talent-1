<?php namespace RainLab\Blog\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Media\Classes\MediaLibrary;
use Media\FormWidgets\MediaFinder;
use October\Rain\Support\Facades\Mail;
use RainLab\Blog\Models\Post;

class FormDownload extends Controller
{
    protected $post;
    protected $formDownload;

    public function __construct(Post $post, \RainLab\Blog\Models\FormDownload $formDownload)
    {
        $this->post = $post;
        $this->formDownload = $formDownload;

        parent::__construct();
    }


    public function formDownload($id, Request $request)
    {
        $post = $this->post->find($id)->toArray();
        $this->formDownload->create($request->all());
        $data = $request->all();

        $vars = ['name' => $data['name'], 'url' => MediaLibrary::url($post['document'])];
        Mail::sendTo($data['email'], 'form_download', $vars);

        return (new Response('success', 200));
    }
}
