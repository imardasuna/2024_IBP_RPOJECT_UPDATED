<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::get();
        return view('admin.photo_view',compact('photos'));
    }
    public function add()
    {
        return view('admin.photo_add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image:mimes:jpg,jpeg,png,gif',
        ]);


        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

       
        
        $obj = new photo();
        $obj->photo = $final_name;
        $obj->caption = $request->caption;
        $obj->save();

        return redirect()->back()->with('success','photo is added succesfully.');

    }
    public function edit($id)
    {
        $photo_data = Photo::where('id',$id)->first();
        //echo $id;
        return view('admin.photo_edit',compact('photo_data'));
    }
    public function update(Request $request,$id)
    {
        $obj = Photo::where('id',$id)->first();

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'required|image:mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/'.$obj->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;

        }   
        

        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->update();

        return redirect()->back()->with('success','photo is updated succesfully.');
    }
    public function delete($id){
        $single_data = Photo::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));

        $single_data->delete();

        return redirect()->back()->with('success','photo is deleted succesfully.');

    }
}
