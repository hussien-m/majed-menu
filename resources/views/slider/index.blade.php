@extends('layouts.dashboard.dashboard')

@section('styles')
<link href="{{asset('dashboard/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>#</th>
                <th>الصورة</th>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>أنشئت في</th>
                <th>الخيارات</th>
            </thead>
            <tbody>
                @foreach($sliders as $key => $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td><a class="image-popup-no-margins" href="{{asset("/images/sliders/".$slider->image)}}">
                        <img class="img-fluid rounded img-thumbnail" alt="" src="{{asset("/images/sliders/".$slider->image)}}" width="90">
                    </a></td>

                    <td>{{ $slider->ar_title }}</td>
                    <td>{{ $slider->en_desc }}</td>
                    <td>{{ $slider->created_at->diffForHumans()}}</td>
                    <td>
                        <div class="btn-group btn-group-md" id="tooltip-container">
                            <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل">
                                <i class="fa fa-edit"></i>
                            </a>



                             <form action="{{ route('slider.destroy',$slider->id) }}" method="post" id="" >
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Are you sure delete section?')" type="submit" data-id="#" data-name="#" class="btn btn-dark del"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('scripts')
        <!-- Magnific Popup-->
        <script src="{{asset('dashboard/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

        <!-- Tour init js-->
        <script src="{{asset('dashboard/assets/js/pages/lightbox.init.js')}}"></script>
@endsection
