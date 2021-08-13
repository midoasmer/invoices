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
            $invoiceAttachments = invoiceAttachment::where('invoice_id','=', $id)->get();
        }
        else{
            $invoiceAttachments="NON";
        }

        return view('invoices.invoice_details', compact('invoice','invoiceDetails','invoiceAttachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->status==1)
        {
            $status='مدفوعة';
            $value=1;
            $payment_date = $request->payment_date;
        }
        elseif ($request->status==2)
        {
            $status='غير مدفوعة';
            $value=2;
            $payment_date = NUll;
        }
        else
        {
            $status='مدفوعة جزئيا';
            $value=3;
            $payment_date = $request->payment_date;
        }
        $invoice = invoices::findOrFail($request->id);
        $invoiceDetails = InvoiceDetails::where('invoice_id','=', $request->id)->first();
        $invoice->update([
            'status' => $status,
            'value_status' => $value,
            'payment_date' => $payment_date,
        ]);

        $invoiceDetails->update([
            'status' => $status,
            'value_status' => $value,
            'payment_date' => $request->payment_date,
        ]);

        session()->flash('payment_edit');
        return redirect('/invoices');
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
