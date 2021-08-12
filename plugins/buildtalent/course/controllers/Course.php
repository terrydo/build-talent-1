<?php namespace Buildtalent\Course\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

    public function listCourse(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('buildtalent.course.paginate');
        $response = CourseModel::where('status', config('buildtalent.course.public'))
            ->paginate($per_page);

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }

    public function showCourse($id)
    {
        $response = CourseModel::where('id', $id)->with(['sections.lessons', 'tags'])->get();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }

    public function getCourseImageAttribute($value)
    {
        return config('app.url') . '/storage/app/media' . $value;
    }

    public function searchCourse(Request $request)
    {
//        $level = $request->level;
//        $category = $request->category;
//        $price = $request->price;
        $per_page = $request->per_page ? $request->per_page : config('buildtalent.course.paginate');

        $response = CourseModel::when(isset($request->level), function ($query) use ($request) {
            $level = $request['keyword'];

            return $query->where('level', '=', $level);
        })->when(isset($request->category_id), function ($query) use ($request) {
            $category_id = $request['category_id'];

            return $query->where('category_id', '=', $category_id);
        })->when(isset($request->price), function ($query) use ($request) {
            $price = $request['price'];

            if($price == config('buildtalent.course.price.free'))
            {
                return $query->where('price', '=', 0);
            } else {
                return $query->where('price', '>', 0);
            }
        })->with(['tags'])->paginate($per_page);

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }
}
