<?php

namespace AhmadFatoni\ApiGenerator\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

class Helpers
{

    public function apiArrayResponseBuilder($statusCode = null, $message = null, $data = [])
    {
        $arr = [
            'status_code' => (isset($statusCode)) ? $statusCode : 500,
            'message' => (isset($message)) ? $message : 'error'
        ];
        if (count($data) > 0 && !$data instanceof LengthAwarePaginator) {
            $arr['data'] = $data;
        } else {
            return response()->json(array_merge($arr, !empty($data) ? $data->toArray() : []), $arr['status_code']);
        }

        return response()->json($arr, $arr['status_code']);
        //return $arr;

    }
}
