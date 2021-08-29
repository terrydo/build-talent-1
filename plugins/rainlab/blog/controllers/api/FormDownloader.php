<?php


namespace RainLab\Blog\Controllers\API;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Media\Classes\MediaLibrary;
use October\Rain\Support\Facades\Mail;
use RainLab\Blog\Models\FormDownload as ModelsFormDownload;
use RainLab\Blog\Models\Post;

class FormDownloader extends Controller
{

    public function sendDocToUser($id, Request $request)
    {
        $post = Post::find($id)->toArray();
        ModelsFormDownload::create($request->all());
        $data = $request->all();

        $vars = ['name' => $data['name'], 'url' => MediaLibrary::url($post['document'])];
        Mail::sendTo($data['email'], 'form_download', $vars);

        return response('success', 200);
    }
}
