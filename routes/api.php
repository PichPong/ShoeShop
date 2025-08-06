<?php

use App\Http\Controllers\ShoeController;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/shoes', function(){
    $shoes = DB::table('shoes')->get();
    return response()->json(
        [
            'data' => $shoes,
            "success" => true,
        ],200
    );
});

Route::post('/shoes', function(Request $request){
    $shoes = DB::table('shoes')->insert([
        'name' => $request->name,
        'price' => $request->price,
        'stock_qty' => $request->stock_qty,
        'brand' => $request->brand,
        'image' => $request->image,
        'description' => $request->description
    ]);
    return response()->json(
        [
            'data' => $shoes,
            "success" => true,
        ],201
    );
});

Route::put('/shoes/{id}', function($id, Request $request){
    $affected = DB::table('shoes')
        ->where('id', $id)
        ->update(
            [
                    'name' => $request->name,
                    'price' => $request->price,
                    'stock_qty' => $request->stock_qty,
                    'brand' => $request->brand,
                    'image' => $request->image,
                    'description' => $request->description
                ]       
            );
            if($affected == 0){
                return response()->json([
                    "success" => false,
                ],404);
            }
            return response()->json([
                "success" => true
            ]);
});

Route::delete('/shoes/{id}', function($id, Request $request){
    $delete = DB::table('shoes')->where('id', '=', $id)->delete();
    if($delete == 0){
                return response()->json([
                    "success" => false,
                ],404);
            }
            return response()->json([
                "success" => true
            ]);
});

Route::get('/shoes', [ShoeController::class, 'index']);
