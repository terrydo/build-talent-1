<?php namespace Buildtalent\Course\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use RainLab\User\Models\User;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Buildtalent\Course\Models\Course as CourseModel;

class Course extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $user;
    public $helpers;

    public function __construct(User $user, Helpers $helpers)
    {
        parent::__construct();
        $this->user = $user;
        $this->helpers = $helpers;
        BackendMenu::setContext('Buildtalent.Course', 'main-menu-item', 'side-menu-item');
    }

    public function listCourse()
    {
        $response = CourseModel::where('status', config('buildtalent.course.public'))->get();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }

    public function showCourse($id)
    {
        $response = CourseModel::where('id', $id)->with('sections.lessons')->get();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }
}
