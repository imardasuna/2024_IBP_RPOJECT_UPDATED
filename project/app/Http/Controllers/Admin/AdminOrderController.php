<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

use App\Models\Order;
use App\Models\Room;

class AdminOrderController extends Controller
{
    public function view()
    {
        $orders = Order::get();
        return view('admin.orders_view',compact('orders'));
    }
    public function approve($id)
    {
        $order_data = Order::where('id',$id)->first();
        $order_data->status = 'Onaylandi';
        $order_data->save();         
        return redirect()->back()->with('success','Rezervasyon onaylandi');
    }
    public function delete($id)
    {
        $rez = Order::where('id',$id)->first();
        $rez->delete();
        return redirect()->back()->with('success','Rezervasyon silindi.');
    }
    //public function orderbydatedesc()
    //{
    //    $rezervations = DB::table('users')
    //                    ->orderBy('')
   // }
}
