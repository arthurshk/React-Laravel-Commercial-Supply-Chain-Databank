<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts, 200);
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
        $contact = new Contact;
        $contact->email = $request->email ? $request->email : "";
        $contact->phone = $request->phone ? $request->phone : "";
        $contact->address = $request->address ? $request->address : "";
        $contact->save();
        return response()->json([
            'success' => 'Contact created successfully'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if(!empty($contact)){
            return response()->json($contact,200);
        }
        else {
            return response()->json([
                'error' => 'Contact not found',
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
        $contact = Contact::find($id);
        if(!empty($contact)){
            $contact->email = ($request->email) ? $request->email : $contact->email;
            $contact->phone = ($request->phone) ? $request->phone : $contact->phone;
            $contact->address = ($request->address) ? $request->address : $contact->address;

            $contact->save();
            return response()->json([
                'success' => 'Contact updated successfully'
            ],200);
          }  else {
                return response()->json([
                    'error' => 'Contact not found',
                ], 404);
            }
        }
        public function destroy(string $id)
        {
            if(Contact::where('id', $id)->exists()){
                $contact = Contact::find($id);
                $contact->delete();
                return response()->json([
                    'success' => 'Contact deleted successfully'
                ],200);
              }  else {
                    return response()->json([
                        'error' => 'Contact not found',
                    ], 404);
                }
        }
    
    }
