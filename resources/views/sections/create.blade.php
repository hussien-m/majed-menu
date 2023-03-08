@extends('layouts.dashboard.dashboard')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">قسم جديد</h4>


                <div class="row">
                    <form action="{{ route('section.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="ar_name">الاسم بالعربية</label>
                                <input type="text" id="ar_name" class="form-control" name="ar_name" value="">
                            </div>

                            <div class="mb-3">
                                <label class="en_name">الاسم بالانجيلزية</label>
                                <input type="text" id="en_name" class="form-control" name="en_name" value="">
                            </div>

                            <div class="mb-3">
                                <label class="parent_id">القسم الرئيسي</label>
                                <select type="text" id="parent_id" class="form-control" name="parent_id">
                                    <option selected value=0>لا يوجد</option>
                                    @foreach ( $parents as $parent  )
                                        <option value="{{ $parent->id }}">{{ $parent->ar_name }}</option>
                                    @endforeach
                                </select>
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
