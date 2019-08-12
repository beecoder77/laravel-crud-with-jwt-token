<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Validator;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Material::all();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'thumbnail' => 'required',
            'title' => 'required',
            'content' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response([
                'messages' => $validator->messages()
            ],401);
        } else {
            $data = [
                'thumbnail' => $request->get('thumbnail'),
                'title' => $request->get('title'),
                'content' => $request->get('content')
            ];
            $store = Material::create($data);
            if($store){
                return response()->json([
                    'message' => 'store berhasil'
                ],200);
            } else {
                return response()->json([
                    'message' => 'Failed to Store'
                ],400);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'thumbnail' => 'required',
            'title' => 'required',
            'content' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response([
                'messages' => $validator->messages()
            ], 401);
        } else {
            $material = Material::find($id);
            $data = [
                'thumbnail' => $request->get('thumbnail'),
                'title' => $request->get('title'),
                'content' => $request->get('content')
            ];
            $material->update($data);
            if ($material) {
                return response([
                    'messages' => 'update berhasil'
                ],200);
            } else {
                return response([
                    'messages' => 'gagal update'
                ],400);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material, $id)
    {
        $material = Material::find($id);
        $material->delete();

        return response([
            'messages' => 'berhasil delete'
        ]);
    }
}
