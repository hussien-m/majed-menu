@extends('layouts.dashboard.dashboard')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">وجبة جديدة</h4>


                <div class="row">
                    <form action="{{ route('meal.update',$meal->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="ar_name">الاسم بالعربية</label>
                                <input type="text" id="ar_name" class="form-control" name="ar_name" value="{{ $meal->ar_name }}">
                            </div>

                            <div class="mb-3">
                                <label class="en_name">الاسم بالانجيلزية</label>
                                <input type="text" id="en_name" class="form-control" name="en_name" value="{{ $meal->en_name }}">
                            </div>

                            <div class="mb-3">
                                <label class="ar_components">المكونات بالعربية</label>
                                <input type="text" id="ar_components" class="form-control" name="ar_components" value="{{ $meal->ar_components }}">
                            </div>

                            <div class="mb-3">
                                <label class="en_components">المكونات بالانجيلزية</label>
                                <input type="text" id="en_components" class="form-control" name="en_components" value="{{ $meal->en_components }}">
                            </div>

                            <div class="mb-3">
                                <label class="section_id">القسم</label>
                                <select class="form-control" id="section_id" name='section_id'>

                                    @forelse ( $sections as $section )
                                    <option value="{{ $section->id }}" {{ $section->id == $meal->section_id ? 'selected':''  }} >{{ $section->ar_name }}</option>
                                    @empty
                                    <option selected disabled>لا يوجد اقسام</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="price">السعر</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{ $meal->price }}">
                            </div>





                            <div class="mb-3">
                                <label for="image" class="form-label">الصورة</label>
                                <input type="file" type="text" rows="2" style="resize: none" name="image" id="image" class="form-control"></ه>
                            </div>
                            <div class="col-xl-2 col-md-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> حفظ
                                    السلايد <i class="fas fa-save"></i></button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </form>
                    <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>



            <!-- END Your Main Content Here-->
        </div>


@endsection
