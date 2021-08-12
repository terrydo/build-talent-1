<?php namespace Buildtalent\Course\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Payment extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController'    ];
    
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Buildtalent.Course', 'main-menu-item', 'side-menu-item-buy-course');
    }
}
