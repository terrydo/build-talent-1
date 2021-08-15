<?php

namespace Buildtalent\Course\Controllers;

use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Backend\Classes\Controller;
use BackendMenu;
use Illuminate\Http\Request;
use RainLab\User\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class Payment extends Controller
{
    public $implement = ['Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    protected $helpers;
    public function __construct(Helpers $helpers)
    {
        parent::__construct();
        $this->helpers = $helpers;

        BackendMenu::setContext('Buildtalent.Course', 'main-menu-item', 'side-menu-item-buy-course');
    }

    public function buyCourse(Request $request)
    {
        $token = JWTAuth::getToken();
        $decodedToken = JWTAuth::getPayload($token)->toArray();
        $id = $decodedToken['sub'];

        $endUser = User::select('id', 'name', 'email', 'username')->where('id', '=', $id)->first();

        $paymentMethodCode = '';

        switch ($request->payment_method) {
            case 'direct_banking':
            default:
                $paymentMethodCode = 'DB';
        }

        $payment = new \Buildtalent\Course\Models\Payment();
        $payment->course_id = $request->course_id;
        $payment->user_id = $endUser->id;
        $payment->payment_method = $request->payment_method;
        $payment->payment_status = config('buildtalent.payment_status.pending');
        $payment->tracking_id = 'OC' . $endUser->id . $request->course_id . $paymentMethodCode;
        $payment->save();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $payment->toArray());
    }

    public function myCourse(Request $request)
    {
        $token = JWTAuth::getToken();
        $decodedToken = JWTAuth::getPayload($token)->toArray();
        $id = $decodedToken['sub'];

        $endUser = User::select('id', 'name', 'email', 'username')->where('id', '=', $id)->first();

        $response = $endUser->courses()
            ->where('payment_status', '=', config('buildtalent.payment_status.complete'))
            ->get();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }
}
