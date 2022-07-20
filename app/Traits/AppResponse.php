<?php
namespace App\Traits;

trait AppResponse
{

    /**
     * @param $data
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */

    public function successResponse($data,$status){
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $status);
    }

    /**
     * @param $data
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function failedResponse($data,$status){
        return response()->json([
            'success' => false,
            'data' => $data,
        ], $status);
    }
}
