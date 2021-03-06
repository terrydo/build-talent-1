<?php

namespace Buildtalent\Main\Controllers;

use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Backend\Classes\Controller;
use BackendMenu;

class Enterprise extends Controller
{
    public $implement = ['Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    protected $helpers;
    protected $enterprise;

    public function __construct(Helpers $helpers, \Buildtalent\Main\Models\Enterprise $enterprise)
    {
        parent::__construct();
        $this->helpers = $helpers;
        $this->enterprise = $enterprise;

        BackendMenu::setContext('Buildtalent.Main', 'btmain', 'enterprise');
    }

    public function getAllEnterprise()
    {
        $data = $this->enterprise->all();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }
}
