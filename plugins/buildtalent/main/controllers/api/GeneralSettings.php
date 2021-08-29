<?php

namespace Buildtalent\Main\Controllers\API;

use Backend\Classes\Controller;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Buildtalent\Main\Models\GeneralSettings as SettingsModel;

class GeneralSettings extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new Helpers();
    }

    public function getSettings($key)
    {
        try {
            $isGetAll = $key === 'all';
            $result = SettingsModel::select($isGetAll ? '*' : $key)->where('id', 1)->first()->toArray();
            return $this->helper->apiArrayResponseBuilder(200, 'ok', $isGetAll ? $result : $result[$key]);
        } catch (\Exception $e) {
            return response('', 400);
        }
    }
}
