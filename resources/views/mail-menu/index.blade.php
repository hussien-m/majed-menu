@extends('layouts.dashboard.dashboard')

@section('styles')
<link href="{{asset('dashboard/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="card">
    <a href="{{ route('sendMessage') }}" class="btn btn-primary mt-2 mb-2 p-3">أرسل قائمة بريدية</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>#</th>
                <th>الاسم</th>
                <th>الاميل</th>
                <th>الهاتف</th>
                <th>أنشئت في</th>
            </thead>
            <tbody>
                @foreach($mails as $key => $mail)
                <tr>
                    <td>{{ $mail->id }}</td>
                    <td>{{ $mail->name }}</td>
                    <td>{{ $mail->email }}</td>
                    <td>{{ $mail->phone }}</td>
                    <td>{{ $mail->created_at->diffForHumans()}}</td>
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
