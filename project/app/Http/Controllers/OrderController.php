<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\BookedRoom;
use App\Models\Room;

class OrderController extends Controller
{  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'TC_ID' => 'required'
        ]);
        $arr_cart_room_id = array();
        $i=0;
        foreach(session()->get('cart_room_id') as $value) 
        {
         $arr_cart_room_id[$i] = $value;
         $i++;
        }

        $arr_cart_checkin_date = array();
        $i=0;
        foreach(session()->get('cart_checkin_date') as $value) 
        {
         $arr_cart_checkin_date[$i] = $value;
         $i++;
        }    

        $arr_cart_checkout_date = array();
        $i=0;
        foreach(session()->get('cart_checkout_date') as $value) 
        {
         $arr_cart_checkout_date[$i] = $value;
         $i++;
        }      
        
        $arr_cart_adult = array();
        $i=0;
        foreach(session()->get('cart_adult') as $value) 
        {
         $arr_cart_adult[$i] = $value;
         $i++;
        } 
        
        $arr_cart_children = array();
        $i=0;
        foreach(session()->get('cart_children') as $value) 
        {
         $arr_cart_children[$i] = $value;
         $i++;
        }
        $total_price = 0;
        for($i=0;$i<count($arr_cart_room_id);$i++)
        {
            $room_data = Room::where('id',$arr_cart_room_id[$i])->first();        
            $d1 = explode('/',$arr_cart_checkin_date[$i]);
            $d2 = explode('/',$arr_cart_checkout_date[$i]);
            $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
            $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
            $t1 = strtotime($d1_new);
            $t2 = strtotime($d2_new);
            $diff = ($t2-$t1)/60/60/24;
            $price = $room_data->price*$diff;

           
            $obj = new Order();
            $obj->name = $request->name;
            $obj->email = $request->email;
            $obj->TC_ID = $request->TC_ID;
            $obj->phone = $request->phone;
            $obj->country = $request->country;
            $obj->address = $request->address;
            $obj->state = $request->state;
            $obj->city = $request->city;
            $obj->zip = $request->zip;
            $obj->room_name = $room_data->name;  
            $obj->checkin_date = $arr_cart_checkin_date[$i];
            $obj->checkout_date =  $arr_cart_checkout_date[$i];
            $obj->adult = $arr_cart_adult[$i];
            $obj->child = $arr_cart_children[$i];
            $obj->status = 'Pending';
            $obj->price = $room_data->price*$diff;
            $obj->save();

            while(1){ 
                if($t1>=$t2){
                    break;
                }  
            
            $obj2 = new BookedRoom();
            $obj2->booking_date = date('d/m/Y',$t1);
            $obj2->room_id = $room_data->id;
            $obj2->order_no = $obj->id;
            $obj2->save();

            $t1 = strtotime('+1 day',$t1);
            }
        }
        session()->flush();
        return redirect()->route('home')->with('success','Rezervasyon gönderildi');
    }
    
}
