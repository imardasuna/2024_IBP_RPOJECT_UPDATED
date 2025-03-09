@extends('admin.layout.app')

@section('heading','Add Photo')

@section('right_top_button')
<a href="{{ route('admin_photo_view') }}"class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_photo_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">                                
                                <div class="mb-4">
                                    <label class="form-label">Photo </label><br>
                                    <input type="file"name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Caption </label>
                                    <input type="text" class="form-control" name="heading" value="{{ old('caption') }}">
                                </div>                               
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Ekle</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection