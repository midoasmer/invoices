<?php

namespace App\Http\Controllers;

use App\Models\invoiceAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceAttachmentController extends Controller
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

//        $this->validate($request, [
//
//            'file_name' => 'mimes:pdf,jpeg,png,jpg',
//
//        ], [
//            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
//        ]);


            $attach = $request->file('file_name');
            $file_name = time() . $attach->getClientOriginalName();
            $attachments = new invoiceAttachment();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $request->invoice_number;
            $attachments->created_by = Auth::user()->name;
            $attachments->invoice_id = $request->invoice_id;
            $attachments->save();

            // move pic
            $request->file_name->move(public_path('Attachments/' . $request->invoice_number), $file_name);

            session()->flash('Add', 'تم اضافة المرفق بنجاح');
            return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoiceAttachment  $invoiceAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(invoiceAttachment $invoiceAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoiceAttachment  $invoiceAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(invoiceAttachment $invoiceAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoiceAttachment  $invoiceAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoiceAttachment $invoiceAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoiceAttachment  $invoiceAttachment
     * @return Request
     */
    public function destroy(Request $request)
    {
        //$attach=invoiceAttachment::findOrFail($request->id);
        if(invoiceAttachment::where('id','=', $request->id)->exists()) {
            invoiceAttachment::findOrFail($request->id)->delete();
            unlink(public_path() . '/Attachments/'.$request->invoice_number.'/'.$request->file_name);
        }
        //public_path('Attachments/'.$request->invoice_number.'/'.$request->file_name)->delete();
//        return response()->download($file_path);
//        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }
}
