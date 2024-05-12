<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::all();
        return response()->json($carts, 200);
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
        $cart = new Cart;
        $cart->name = $request->name ? $request->name : "";
        $cart->description = $request->description ? $request->description : "";
        $cart->price = $request->price ? $request->price : "";
        $cart->img_url = $request->img_url ? $request->img_url : "";
        $cart->save();
        return response()->json([
            'success' => 'Cart created successfully'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart = Cart::find($id);
        if(!empty($cart)){
            return response()->json($cart,200);
        }
        else {
            return response()->json([
                'error' => 'Cart not found',
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
        $cart = Cart::find($id);
        if(!empty($cart)){
            $cart->name = is_null($request->name) ? $request->name : $cart->name;
            $cart->description = ($request->description) ? $request->description : $cart->description;
            $cart->price = ($request->price) ? $request->price : $cart->price;
            $cart->img_url = ($request->img_url) ? $request->img_url : $cart->img_url;
            $cart->save();
            return response()->json([
                'success' => 'Cart updated successfully'
            ],200);
          }  else {
                return response()->json([
                    'error' => 'Cart not found',
                ], 404);
            }
        }
        public function destroy(string $id)
        {
            if(Cart::where('id', $id)->exists()){
                $cart = Cart::find($id);
                $cart->delete();
                return response()->json([
                    'success' => 'Cart deleted successfully'
                ],200);
              }  else {
                    return response()->json([
                        'error' => 'Cart not found',
                    ], 404);
                }
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
