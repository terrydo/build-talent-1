<?php namespace Buildtalent\Course\Controllers;

use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Backend\Classes\Controller;
use BackendMenu;

class Expert extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    protected $helpers;
    protected $expert;
    /**
     * @var \Buildtalent\Course\Models\Expert
     */


    public function __construct(Helpers $helpers, \Buildtalent\Course\Models\Expert $expert)
    {
        parent::__construct();

        $this->helpers = $helpers;
        $this->expert = $expert;

        BackendMenu::setContext('Buildtalent.Course', 'main-menu-item', 'side-menu-item-expert');
    }

    public function getAllExpert()
    {
        $data = $this->expert->all();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }
}
