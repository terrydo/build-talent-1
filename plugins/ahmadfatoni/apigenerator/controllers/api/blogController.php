<?php namespace AhmadFatoni\ApiGenerator\Controllers\API;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;
use RainLab\Blog\Models\Post;
class blogController extends Controller
{
	protected $Post;

    protected $helpers;

    public function __construct(Post $Post, Helpers $helpers)
    {
        parent::__construct();
        $this->Post    = $Post;
        $this->helpers          = $helpers;
    }

    public function getPostByType($type)
    {
        $data = $this->Post->where('type', '=', $type)->get();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data->toArray());
    }

    public function index(){

        $data = $this->Post->with('categories')->get()->toArray();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    public function show($id){

        $data = $this->Post::find($id);

        if ($data){
            return $this->helpers->apiArrayResponseBuilder(200, 'success', [$data]);
        } else {
            $this->helpers->apiArrayResponseBuilder(404, 'not found', ['error' => 'Resource id=' . $id . ' could not be found']);
        }

    }
//
//    public function store(Request $request){
//
//    	$arr = $request->all();
//
//        while ( $data = current($arr)) {
//            $this->Post->{key($arr)} = $data;
//            next($arr);
//        }
//
//        $validation = Validator::make($request->all(), $this->Post->rules);
//
//        if( $validation->passes() ){
//            $this->Post->save();
//            return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->Post->id]);
//        }else{
//            return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors() );
//        }
//
//    }
//
//    public function update($id, Request $request){
//
//        $status = $this->Post->where('id',$id)->update($data);
//
//        if( $status ){
//
//            return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been updated successfully.');
//
//        }else{
//
//            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', 'Error, data failed to update.');
//
//        }
//    }
//
//    public function delete($id){
//
//        $this->Post->where('id',$id)->delete();
//
//        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
//    }
//
//    public function destroy($id){
//
//        $this->Post->where('id',$id)->delete();
//
//        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
//    }
//
//
//    public static function getAfterFilters() {return [];}
//    public static function getBeforeFilters() {return [];}
//    public static function getMiddleware() {return [];}
//    public function callAction($method, $parameters=false) {
//        return call_user_func_array(array($this, $method), $parameters);
//    }

}
