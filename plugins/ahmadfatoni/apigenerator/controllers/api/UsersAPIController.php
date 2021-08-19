<?php

namespace AhmadFatoni\ApiGenerator\Controllers\API;

use Cms\Classes\Controller;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use RainLab\User\Models\User;

class UsersAPIController extends Controller
{
    protected $User;

    protected $helpers;

    public function __construct(User $User, Helpers $helpers)
    {
        parent::__construct();
        $this->User    = $User;
        $this->helpers          = $helpers;
    }


    public function index()
    {
        $data = $this->User->select('id', 'name', 'email')->get()->toArray();
        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    public function me()
    {
        /** @var \Illuminate\Auth\AuthManager */
        $token = JWTAuth::getToken();
        $decodedToken = JWTAuth::getPayload($token)->toArray();
        $id = $decodedToken['sub'];

        $user = $this->User->select('id', 'name', 'email', 'username', 'phone', 'sex')->where('id', '=', $id)->first();

        $response = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'phone' => $user->phone,
            'sex' => $user->sex,
            'avatar_url' => $user->getAvatarThumb(100, 100)
        ];

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }

    public function show($id)
    {
        $data = $this->User->select('id', 'name', 'email')->where('id', '=', $id)->first();

        $response = [
            'id' => $data->id,
            'name' => $data->name,
            'avatar_url' => $data->avatar->getPath()
        ];

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $response);
    }

    public function store(Request $request)
    {

        $arr = $request->all();

        while ($data = current($arr)) {
            $this->User->{key($arr)} = $data;
            next($arr);
        }

        $validation = Validator::make($request->all(), $this->User->rules);

        if ($validation->passes()) {
            $this->User->save();
            return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->User->id]);
        } else {
            return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors());
        }
    }

    public function updateProfile(Request $request)
    {
        $token = JWTAuth::getToken();
        $decodedToken = JWTAuth::getPayload($token)->toArray();
        $id = $decodedToken['sub'];

        $user = $this->User->find($id);

        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $status = $user->save();

        if ($status) {
            return $this->helpers->apiArrayResponseBuilder(200, 'success', ['message' => 'Data has been updated successfully.']);
        } else {
            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', ['message' => 'Error, data failed to update.']);
        }
    }

    public function updateAvatar(Request $request)
    {
        $token = JWTAuth::getToken();
        $decodedToken = JWTAuth::getPayload($token)->toArray();
        $id = $decodedToken['sub'];

        $user = $this->User->find($id);

        $user->avatar = \Input::file('avatar');
        $status = $user->save();

        if ($status) {
            return $this->helpers->apiArrayResponseBuilder(200, 'success', ['message' => 'Data has been updated successfully.']);
        } else {
            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', ['message' => 'Error, data failed to update.']);
        }
    }

    public function updatePassword(Request $request)
    {
        $token = JWTAuth::getToken();
        $decodedToken = JWTAuth::getPayload($token)->toArray();
        $id = $decodedToken['sub'];

        $user = $this->User->find($id);

        $user->password = bcrypt($request->password);
        $status = $user->save();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', ['message' => 'Data has been updated successfully.']);
    }

    public function delete($id)
    {

        $this->User->where('id', $id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }

    public function destroy($id)
    {

        $this->User->where('id', $id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }


    public static function getAfterFilters()
    {
        return [];
    }
    public static function getBeforeFilters()
    {
        return [];
    }
    public static function getMiddleware()
    {
        return [];
    }
    public function callAction($method, $parameters = false)
    {
        return call_user_func_array(array($this, $method), $parameters);
    }
}
