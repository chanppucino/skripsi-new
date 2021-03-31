<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Announcements;
use Input;
use Redirect;
use Session;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $announcements=Announcements::all();

        $data=['announcements'=>$announcements];

        return view('admin/announcements/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/announcements/create');
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
        $rules =[
            'title'=>'required',
            'subject'=>'required',
            'imageFile'=>'required|mimes:jpg,png,jpeg,JPG',
            'contents'=>'required'
        ];
 
        $pesan=[
            'title.required'=>'Judul Berita Tidak Boleh Kosong',
            'subject.required'=>'Perihal Tidak Boleh Kosong',
            'imageFile.required'=>"Gambar Tidak Boleh Kosong",
            'contents.required'=>'Berita Tidak Boleh Kosong'
        ];
 
        $validator=Validator::make(Input::all(),$rules,$pesan);
 
        //jika data ada yang kosong
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('admin/announcements/create')
            ->withErrors($validator);
 
        }else{

            $image=$request->file('imageFile')->store('announcementsImages','public');
             
            $announcements=new Announcements;
 
            $announcements->title=Input::get('title');
            $announcements->subject=Input::get('subject');
            $announcements->image=Input::get('subject');
            $announcements->contents=Input::get('contents');
            $announcements->save();

 
            Session::flash('message','Data Berhasil Ditambah');
 
            return Redirect::to('admin/announcements/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $announcements=Announcements::find($id);

        $d=['announcements'=>$announcements];

        return view('admin/announcements/show')->with($d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $announcements=Announcements::find($id);
        $d=['announcements'=>$announcements];
        return view('admin/announcements/edit')->with($d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules=[
             
            'title'=>'required',
            'subject'=>'required',
            'contents'=>'required',
        ];
 
        $pesan=[
            'title.required'=>'Judul Tidak Boleh Kosong!!',
            'subject.required'=>'Perihal Tidak Boleh Kosong!!',
            'contents.required'=>'Pengumuman Tidak Boleh Kosong!!',
        ];
 
 
        $validator=Validator::make(Input::all(),$rules,$pesan);
 
        if ($validator->fails()) {
            return Redirect::to('admin/announcements/'.$id.'/edit')
            ->withErrors($validator);
 
        }else{
 
            $image="";
 
            if (!$request->file('imageFile')) {
                # code...
                $image=Input::get('imagePath');
            }else{
                $image=$request->file('imageFile')->store('announcementsImages','public');                
            }
 
            $announcements=Announcements::find($id);
 
            $announcements->title=Input::get('title');
            $announcements->subject=Input::get('subject');
            $announcements->image=Input::get('subject');
            $announcements->contents=Input::get('contents');
            $announcements->save();

            Session::flash('message','Data Berhasil Diubah');
             
            return Redirect::to('admin/announcements/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $announcements=Announcements::find($id);
        $announcements->delete();

        Session::flash('message','Data Dihapus');
        return Redirect::to('admin/announcements/index');
    }
}
