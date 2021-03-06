<?php namespace Buildtalent\Course\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Section extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Buildtalent.Course', 'main-menu-item', 'side-menu-item-section');
    }
}
