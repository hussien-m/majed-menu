@foreach ( $meals as $count=>$meal )
<div class="tab-content">


            @php
                $comp = explode(' ', app()->getLocale()=='ar' ? $meal->ar_components:$meal->en_components);
            @endphp

            <div class="tab-pane active mt-2" id="tab-{{ $meal->section->id }}">
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
                        <img src="{{ asset('images/meals/'. $meal->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div><!-- End tab content item -->
        @endforeach
