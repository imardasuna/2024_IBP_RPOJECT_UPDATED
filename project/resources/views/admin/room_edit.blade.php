@extends('admin.layout.app')

@section('heading','Edit Room')

@section('right_top_button')
<a href="{{ route('admin_room_view') }}"class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_room_update',$room_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">                                
                                <div class="mb-4">
                                    <label class="form-label">Fotoğraf </label><br>
                                    <img src="{{ asset('uploads/'.$room_data->featured_photo) }}" alt=""class="w_300">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Öne çıkan fotoğrafı değiştir </label><br>
                                    <input type="file"name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Fiyat </label>
                                    <input type="text" class="form-control" name="price" value="{{ $room_data->price }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">İsim </label>
                                    <input type="text" class="form-control" name="name" value="{{ $room_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Açıklama </label>
                                    <input type="text" class="form-control" name="description" value="{{ $room_data->description }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Toplam Oda </label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{ $room_data->total_rooms }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Toplam Konuk </label>
                                    <input type="text" class="form-control" name="total_guests" value="{{ $room_data->total_guests }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Amenities </label>
                                    @php $i=0;@endphp
                                    @foreach($all_amenities as $item)
                                    @if(in_array($item->id,$existing_amenities))
                                    @php $checked_type = 'checked'; @endphp
                                    @else
                                    @php $checked_type = ''; @endphp
                                    @endif
                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"value="{{ $item->id }}"
                                        id="defaultCheck{{ $i }}"name="arr_amenities[]"{{ $checked_type }}>
                                        <label class= "form-check-label"for="defaultCheck{{ $i }}">
                                        {{ $item->name }}</label>
                                            
                                    </div>
                                </div>
                                @endforeach
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection