<?php

namespace App\Http\Controllers;
use App\Models\deliveryPayment;

use Illuminate\Http\Request;

class deliveryPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = deliveryPayment::all();
        return response()->json($payments, 200);
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
        $payment = new deliveryPayment;
        $payment->speed = $request->speed ? $request->speed : "";
        $payment->type = $request->type ? $request->type : "";
        $payment->price = $request->price ? $request->price : "";
        $payment->save();
        return response()->json([
            'success' => 'Payment created successfully'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = deliveryPayment::find($id);
        if(!empty($payment)){
            return response()->json($payment,200);
        }
        else {
            return response()->json([
                'error' => 'Payment not found',
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
        $payment = deliveryPayment::find($id);
        if(!empty($contact)){
            $payment->speed = is_null($request->speed) ? $request->speed : $payment->speed;
            $payment->type = ($request->type) ? $request->type : $payment->type;
            $payment->price = ($request->price) ? $request->price : $payment->price;

            $payment->save();
            return response()->json([
                'success' => 'Payment updated successfully'
            ],200);
          }  else {
                return response()->json([
                    'error' => 'Payment not found',
                ], 404);
            }
        }
        public function destroy(string $id)
        {
            if(deliveryPayment::where('id', $id)->exists()){
                $payment = deliveryPayment::find($id);
                $payment->delete();
                return response()->json([
                    'success' => 'Payment deleted successfully'
                ],200);
              }  else {
                    return response()->json([
                        'error' => 'Payment not found',
                    ], 404);
                }
        }
    
    }
