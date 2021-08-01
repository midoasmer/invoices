<?php

namespace App\Http\Controllers;

use App\Models\invoiceAttachment;
use App\Models\invoiceDetails;
use App\Models\Invoices;
use Illuminate\Http\Request;

class InvoiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function show(invoiceDetails $invoiceDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $invoiceDetails = InvoiceDetails::findOrfail(7,'invoice_id');
//        return $invoiceDetails;
        $invoice = Invoices::where('id','=', $id)->get();
        $invoiceDetails = InvoiceDetails::where('invoice_id','=', $id)->get();
        if(invoiceAttachment::where('invoice_id','=', $id)->exists())
        {
            $invoiceAttachment = invoiceAttachment::where('invoice_id','=', $id)->get();
        }
        else{
            $invoiceAttachment="NON";
        }

        return view('invoices.invoice_details', compact('invoice','invoiceDetails','invoiceAttachment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoiceDetails $invoiceDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoiceDetails $invoiceDetails)
    {
        //
    }
}
