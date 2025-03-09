@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Ödeme</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 checkout-left">

                <form action="{{ route('sendorder') }}" method="post" class="frm_checkout" >
                    @csrf
                    <div class="billing-info">
                        <h4 class="mb_30">Fatura Bilgileri</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Name:</label>
                                <input type="text" class="form-control mb_15" name="name" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email Address:</label>
                                <input type="text" class="form-control mb_15" name="email" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Phone Number:</label>
                                <input type="text" class="form-control mb_15" name="phone" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">TC ID: </label>
                                <input type="text" class="form-control mb_15" name="TC_ID" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Country:</label>
                                <input type="text" class="form-control mb_15" name="country" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Address:</label>
                                <input type="text" class="form-control mb_15" name="address" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">State:</label>
                                <input type="text" class="form-control mb_15" name="state" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">City:</label>
                                <input type="text" class="form-control mb_15" name="city" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Zip Code:</label>
                                <input type="text" class="form-control mb_15" name="zip" value="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bg-website mb_30">Siparişi Oluştur</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Rezervasyon Detayları</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @php
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
                            $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                            @endphp

                            <tr>
                                    <td>
                                        {{ $room_data->name }}
                                        <br>
                                        ({{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }})
                                        <br>
                                        Adult: {{$arr_cart_adult[$i]   }}, Children: {{ $arr_cart_children[$i] }}
                                    </td>
                                    <td class="p_price">
                                        @php
                                        $d1 = explode('/',$arr_cart_checkin_date[$i]);
                                        $d2 = explode('/',$arr_cart_checkout_date[$i]);
                                        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                        $t1 = strtotime($d1_new);
                                        $t2 = strtotime($d2_new);
                                        $diff = ($t2-$t1)/60/60/24;
                                        echo '$'.$room_data->price*$diff;
                                        @endphp
                                    </td>
                                </tr>                                      
                            @php
                            $total_price = $total_price+($room_data->price*$diff);
                           }
                            @endphp

                                
                               
                                
                                <tr>
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>${{ $total_price }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->get('error'))
<script>
    iziToast.error({
    title: '',
    position: 'topRight',
    message: '{{ session()->get('error') }}',
});
</script>
@endif
@endsection