
@extends('admin.layout.app')

@section('heading','Add Slide')

@section('right_top_button')
<a href="{{ route('admin_availability_view') }}"class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
@endsection

@section('main_content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<div class="section-body">
    <div class="row">
        <div class="col-12">
            
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_availability_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">                                
                                <div class="form-group">
                                    <select name="room_id" class="form-select">
                                        <option value="">Select Room</option>
                                        @foreach($rooms as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="date-picker">
                                    <input type="date" id="start-date" name="start_date" />
                                    <span>-</span>
                                    <input type="date" id="end-date" name="end_date" />
                                    <p id="reservation-text"></p>
                                  </div>
                              <div class="mb-4">
                                <label class="form-label">Kontenjan </label>
                                <input type="text" class="form-control" name="kontenjan" >
                            </div>
                                
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
        const bookButton = document.getElementById('book-button');
        const reservationText = document.getElementById('reservation-text');
      
        bookButton.addEventListener('click', () => {
          const startDate = startDateInput.value;
          const endDate = endDateInput.value;
          if (startDate && endDate) {
            const reservationFormat = `${startDate} - ${endDate}`;
            reservationText.textContent = `Reservation booked: ${reservationFormat}`;
          } else {
            alert('Please select both start and end dates');
          }
        });
      </script>
@endsection