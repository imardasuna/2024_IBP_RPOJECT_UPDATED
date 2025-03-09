@extends('admin.layout.app')

@section('heading','View Reservations')

@section('right_top_button')
<a href=""class="btn btn-primary"><i class="fas fa-plus"></i>Add Reservation</a>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Res Date</th>
                                <th>Room Name</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>@php $i=0; @endphp
                                @foreach($orders as $row)
                                
                            <tr>
                                <td>{{ $loop->iteration }}</td>                           
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->room_name }}</td>
                                <td>{{ $row->checkin_date }}</td>                        
                                <td>{{ $row->checkout_date }}</td>    
                                <td>{{ $row->status }}</td>               
                   
                   
                                <td class="pt_10 pb_10">
                                
                                    @if($row->status=='Pending')
                                        <a href="{{ route('admin_order_approve',$row->id) }}"class= "btn btn-success">Onayla</a>
                                    @endif                                                      
                                    <button class="btn btn-info" data-toggle="modal"data-target="#exampleModal{{ $i }}">Detail</button>
                                    <a href="{{ route('admin_order_edit',$row->id) }}"class= "btn btn-primary">Edit</a>
                                    <a href="{{ route('admin_order_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">Name</label></div>
                                                <div class="col-md-8">{{ $row->name }}</div>
                                            </div>
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">email</label></div>
                                                <div class="col-md-8">{{ $row->email }}</div>
                                            </div>                       
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">Phone</label></div>
                                                <div class="col-md-8">{{ $row->phone }}</div>
                                            </div>
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">TC_ID</label></div>
                                                <div class="col-md-8">{{ $row->TC_ID }}</div>
                                            </div>
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">Checkin Date</label></div>
                                                <div class="col-md-8">{{ $row->checkin_date }}</div>
                                            </div>
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">Checkout Date</label></div>
                                                <div class="col-md-8">{{ $row->checkout_date }}</div>
   
                                            </div>
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">Adult</label></div>
                                                <div class="col-md-8">{{ $row->adult }}</div>
                                            </div>
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">Child</label></div>
                                                <div class="col-md-8">{{ $row->child }}</div>
   
                                            </div>
                                            <div class="form-group row bdb1 pt_10 mb_0">
                                                <div class="col-md-4"><label class="form-label">Room Total Price</label></div>
                                                <div class="col-md-8">{{ $row->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection