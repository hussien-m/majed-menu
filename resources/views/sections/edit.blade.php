@extends('layouts.dashboard.dashboard')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <form action="{{ route('section.update',$section->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="ar_name">العنوان بالعربية</label>
                                <input type="text" id="ar_name" class="form-control" name="ar_name" value="{{ $section->ar_name }}">
                            </div>

                            <div class="mb-3">
                                <label class="en_name">العنوان بالانجيلزية</label>
                                <input type="text" id="en_title" class="form-control" name="en_name" value="{{ $section->en_name }}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">الصورة</label>
                                <input type="file" type="text" rows="2" style="resize: none" name="image" id="image" class="form-control"></ه>
                            </div>

                            <div class="mb-3">
                                <label class="parent_id">القسم الرئيسي</label>
                                <select type="text" id="parent_id" class="form-control" name="parent_id">
                                    @foreach ( $parents as $parent  )
                                        <option value="{{ $parent->id  }}" {{ $section->parent_id == $parent->id ? 'selected':'' }}>{{ $parent->ar_name }}</option>
                                    @endforeach
                                    <option  value=0>لا يوجد</option>

                                </select>
                            </div>

                            <div class="col-xl-2 col-md-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> حفظ
                                    القسم <i class="fas fa-save"></i></button>
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
