<?php

namespace App\Http\Controllers;
use App\Models\OneProduct;

use Illuminate\Http\Request;

class OneProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $OneProducts = OneProduct::all();
        return response()->json($OneProducts, 200);
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
        $OneProduct = new OneProduct;
        $OneProduct->name = $request->name ? $request->name : "";
        $OneProduct->quantity = $request->quantity ? $request->quantity : "";
        $OneProduct->price = $request->price ? $request->price : "";
        $OneProduct->save();
        return response()->json([
            'success' => 'Product created successfully'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $OneProduct = OneProduct::find($id);
        if(!empty($OneProduct)){
            return response()->json($OneProduct,200);
        }
        else {
            return response()->json([
                'error' => 'Product not found',
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
        $OneProduct = OneProduct::find($id);
        if(!empty($OneProduct)){
            $OneProduct->name = is_null($request->name) ? $request->name : $OneProduct->name;
            $OneProduct->quantity = ($request->quantity) ? $request->quantity : $OneProduct->quantity;
            $OneProduct->price = ($request->price) ? $request->price : $OneProduct->price;

            $OneProduct->save();
            return response()->json([
                'success' => 'Product updated successfully'
            ],200);
          }  else {
                return response()->json([
                    'error' => 'Product not found',
                ], 404);
            }
        }
        public function destroy(string $id)
        {
            if(OneProduct::where('id', $id)->exists()){
                $OneProduct = OneProduct::find($id);
                $OneProduct->delete();
                return response()->json([
                    'success' => 'Product deleted successfully'
                ],200);
              }  else {
                    return response()->json([
                        'error' => 'Product not found',
                    ], 404);
                }
        }
    
    }
