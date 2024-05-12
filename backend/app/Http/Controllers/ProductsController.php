<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Productss = Products::all();
        return response()->json($Productss, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Products = new Products;
        $Products->name = $request->name ? $request->name : "";
        $Products->description = $request->description ? $request->description : "";
        $Products->price = $request->price ? $request->price : "";
        $Products->img_url = $request->img_url ? $request->img_url : "";

        $Products->save();
        return response()->json([
            'success' => 'Products created successfully'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Products = Products::find($id);
        if(!empty($Products)){
            return response()->json($Products,200);
        }
        else {
            return response()->json([
                'error' => 'Products not found',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Products = Products::find($id);
        if(!empty($Products)){
            $Products->name = is_null($request->name) ? $request->name : $Products->name;
            $Products->description = ($request->description) ? $request->description : $Products->description;
            $Products->price = ($request->price) ? $request->price : $Products->price;
            $Products->img_url = ($request->img_url) ? $request->img_url : $Products->img_url;

            $Products->save();
            return response()->json([
                'success' => 'Products updated successfully'
            ],200);
          }  else {
                return response()->json([
                    'error' => 'Products not found',
                ], 404);
            }
        }
        public function destroy(string $id)
        {
            if(Products::where('id', $id)->exists()){
                $Products = Products::find($id);
                $Products->delete();
                return response()->json([
                    'success' => 'Products deleted successfully'
                ],200);
              }  else {
                    return response()->json([
                        'error' => 'Products not found',
                    ], 404);
                }
        }
    
    }
