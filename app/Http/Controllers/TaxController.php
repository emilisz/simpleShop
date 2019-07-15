<?php

namespace App\Http\Controllers;

use App\Tax;
use Illuminate\Http\Request;
use Session;

class TaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        // dd($request->all());
        $validated = request()->validate([
            'rate' => '',
            'status' => 'boolean',
            'discount_type' => 'boolean',
            'discount' => 'boolean',
            'discount_size' => ''
        ]);

         $tax->updateTax($validated);

       Session::flash('message', "Tax updated");
        return redirect()->back();
    }

}
