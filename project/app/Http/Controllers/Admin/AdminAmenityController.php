<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;

class AdminAmenityController extends Controller
{
    public function index()
    {
        $amenities= Amenity::get();
        return view('admin.amenity_view',compact('amenities'));
    }
    public function add()
    {
        return view('admin.amenity_add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
                    
        $obj = new Amenity();
        $obj->name= $request->name;
        $obj->save();

        return redirect()->back()->with('success','Amenity is added succesfully.');

    }
    public function edit($id)
    {
        $amenity_data = Amenity::where('id',$id)->first();
        //echo $id;
        return view('admin.amenity_edit',compact('amenity_data'));
    }
    public function delete($id){
        $amenity_data = Amenity::where('id',$id)->first();
        $amenity_data->delete();

        return redirect()->back()->with('success','Amenity is deleted succesfully');

    }
}
