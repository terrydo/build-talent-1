<?php namespace Buildtalent\Course\Controllers;

use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Backend\Classes\Controller;
use BackendMenu;
use Buildtalent\Course\Models\Category as CategoryModel;
use Illuminate\Http\Request;

class Category extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    protected $helpers;

    public function __construct(Helpers $helpers)
    {
        parent::__construct();
        $this->helpers = $helpers;
        BackendMenu::setContext('Buildtalent.Course', 'main-menu-item', 'side-menu-item-category');
    }

    public function listCategory()
    {
        $response = CategoryModel::all();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }

    public function showCategory($id)
    {
        $response = CategoryModel::where('id', '=', $id)->get();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }
}
