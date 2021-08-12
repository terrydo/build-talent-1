<?php namespace AhmadFatoni\ApiGenerator\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

Class Helpers {

	public function apiArrayResponseBuilder($statusCode = null, $message = null, $data = [])
	{
		$arr = [
			'status_code' => (isset($statusCode)) ? $statusCode : 500,
			'message' => (isset($message)) ? $message : 'error'
		];
		if (count($data) > 0 && !$data instanceof LengthAwarePaginator) {
			$arr['data'] = $data;
		} else {
		    return array_merge($arr, $data->toArray());
        }

		return response()->json($arr, $arr['status_code']);
		//return $arr;

	}
}
