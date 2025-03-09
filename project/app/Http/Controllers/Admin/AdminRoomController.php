<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;
use App\Models\Room;
use App\Models\Amenity;
use App\Models\RoomPhoto;


class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::Get();
        return view('admin.room_view',compact('rooms'));
    }
    public function add()
    {
        $all_amenities = Amenity::get();
        return view('admin.room_add',compact('all_amenities'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
        ]);

        $ext = $request->file('featured_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/'),$final_name);

        $amenities ='';
        $i=0;
        if(isset($request->arr_amenities)){
            foreach($request->arr_amenities as $item)
        {
            if($i==0)
            {
                $amenities.= $item;

            }
            else$amenities.= ','.$item;
            $i++;
        }
        }
        $obj = new Room();
        $obj->featured_photo = $final_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->save();

        return redirect()->back()->with('success','Room is added succesfully.');

    }
    public function edit($id)
    {
        $room_data = Room::where('id',$id)->first();
        $all_amenities = Amenity::get();
        $existring_amenities = array();
        if($room_data->amenities != ''){
            $existing_amenities = explode(',',$room_data->amenities);  //explode stringdeki ',' değerini ayıklar
            }
        
        return view('admin.room_edit',compact('room_data','all_amenities','existing_amenities'));
    }
    public function update(Request $request,$id)
    {
        $obj = Room::where('id',$id)->first();
        $amenities ='';
        $i=0;
        if(isset($request->arr_amenities)){
            foreach($request->arr_amenities as $item)
        {
            if($i==0)
            {
                $amenities.= $item;

            }
            else$amenities.= ','.$item;
            $i++;
        }
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
        ]);

        if($request->hasFile('featured_photo'))
        {
            $request->validate([
                'featured_photo' => 'required|image:mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('uploads/'.$obj->featured_photo));
            $ext = $request->file('featured_photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('uploads/'),$final_name);
            $obj->featured_photo = $final_name;

        }   
        
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->update();

        return redirect()->back()->with('success','Room is updated succesfully.');
    }
    public function delete($id){
        $single_data = Room::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->featured_photo));

        $single_data->delete();

        return redirect()->back()->with('success','Room is deleted succesfully.');

    }
}
