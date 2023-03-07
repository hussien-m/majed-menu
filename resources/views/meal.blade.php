@extends('welcome')


@section('content')
<ul class="nav nav-tabs row flex-nowrap  g-2 d-flex">
    @foreach ( $meals as $meal )
    <li class="nav-item col-3">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-{{ $meal->id }}">
            <div class="img"  style="background-image:linear-gradient(rgba(0, 0, 0, 0.021), rgba(0, 0, 0, 0.8)),url('{{ asset('images/meals/'.$meal->image) }}'); ">
                <h4 class="mb-2">{{app()->getLocale() == 'ar' ? $meal->ar_name:$meal->en_name }}</h4>
            </div>
        </a>
    </li><!-- End tab nav item -->

    @endforeach

</ul>

<div class="tab-content">

    @foreach ( $meals as $meal )
    @php

        $comp = explode(' ', app()->getLocale()=='ar' ? $meal->ar_components:$meal->en_components);
    @endphp
    <div class="tab-pane" id="tab-{{ $meal->id }}">
        <div class="row">
            <div class="col-6  mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex justify-content-between">
                    <p class="fst-italic">
                         {{ $meal->price }} {{ app()->getLocale() == 'ar' ? 'ريال':'SAR' }}
                    </p>
                    <h3>{{app()->getLocale() == 'ar' ? $meal->ar_name:$meal->en_name }}</h3>
                </div>
                <p class="mb-1 pb-1">@lang('site.components')</p>
                <ul>
                    @foreach ($comp  as $c )
                    <li> {{ $c }} <i class="bi bi-check2-all"></i></li>
                    @endforeach

                </ul>
            </div>
            <div class="col-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/img/01.png" alt="" class="img-fluid">
            </div>
        </div>
    </div><!-- End tab content item -->
    @endforeach

</div>

@stop

<script>
    window.onload = function(){

window.scrollTo(0, Number.POSITIVE_INFINITY);

}
</script>
