<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections/sections_index',compact('sections'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $validatedData = $request->validate([
//            'section_name' => 'required|unique:sections|max:255',
//            'description' => 'required',
//        ],[
//
//            'section_name.required' =>'يرجي ادخال اسم القسم',
//            'section_name.unique' =>'اسم القسم مسجل مسبقا',
//            'description.required' =>'يرجي ادخال البيان',
//
//        ]);
        $chick=Section::where('name','=',$request->name)->exists();
        if($chick)
        {
            Session::flash('ُError',' خطا  '.$request->name.' موجود بالفعل ');
            return redirect('sections');
        }
        else
        {
            $section= new Section();
            //Section::create($request->all());
            $section->name=$request->name;
            if($request->description)
                $section->description=$request->description;
            $section->created_by= Auth::user()->name;
            $section->save();
            Session::flash('Add','تم اضافه '.$request->name.' بنجاح ');
            return redirect('sections');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|unique:sections,name,'.$id,
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
            'name.unique' =>'اسم القسم مسجل مسبقا',

        ]);

        $sections = Section::findOrfail($id);
        $sections->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        section::findOrfail($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/sections');
    }
}
