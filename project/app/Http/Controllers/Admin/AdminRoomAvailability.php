<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomAvailability;
class AdminRoomAvailability extends Controller
{
    public function index()
    {
        $rooms = Room::Get();
        return view('admin.availability_add',compact('rooms'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'kontenjan' => 'required',
        ]);
        $t1 = strtotime($request->start_date);
        $t2 = strtotime($request->end_date);

        while($t1<=$t2)
        {
            $single_date = date('d/m/Y',$t1); 
            DB::table('room_availabilities')
             ->where('room_id',$request->room_id)
             ->where('booking_date',$single_date)
             ->delete();
            $obj = new RoomAvailability();
            $obj->room_id = $request->room_id;
            $obj->booking_date = $single_date; 
            $obj->kontenjan = $request->kontenjan;
            $t1 = strtotime('+1 day',$t1);
            $obj->save();
        }
        
        return redirect()->back()->with('success','Kontenjan Ayarlandi');

    }
}
