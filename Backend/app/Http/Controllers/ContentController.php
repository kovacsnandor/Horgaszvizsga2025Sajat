<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{

    public function horgaszvizsgaTananyag(){

        $query = '
            SELECT co.*, ca.Foghatosag FROM contents co
            LEFT JOIN catchability_scents ca on ca.id = co.FoghatosagId
        ';
        $rows= DB::select($query, );
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];

        return response()->json($data, options:JSON_UNESCAPED_UNICODE);
    }


    public function halkartyak(){

        $query = '
            SELECT co.*, ca.Foghatosag FROM contents co
            LEFT JOIN catchability_scents ca on ca.id = co.FoghatosagId
            WHERE co.id IS NOT NULL
        ';
        $rows= DB::select($query);
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];

        return response()->json($data, options:JSON_UNESCAPED_UNICODE);
    }

    public function halkartyaById(int $id){

        $query = '
            SELECT * FROM contents co
            LEFT JOIN catchability_scents ca on ca.id = co.FoghatosagId
            WHERE co.id = ?
        ';
        $rows= DB::select($query, [$id]);
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];

        return response()->json($data, options:JSON_UNESCAPED_UNICODE);
    }

    public function halkartyakGyakorlo(){

        $query = '
            SELECT id, FejezetCim, KepFile FROM contents
            WHERE KepFile IS NOT NULL
        ';
        $rows= DB::select($query, );
        $data = [
            'message' => 'ok',
            'data' => $rows
        ];

        return response()->json($data, options:JSON_UNESCAPED_UNICODE);
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentRequest $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        //
    }
}
