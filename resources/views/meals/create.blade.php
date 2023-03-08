@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">وجبة جديدة</h4>


                    <div class="row">
                        <form action="{{ route('meal.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="ar_name">الاسم بالعربية</label>
                                        <input type="text" id="ar_name" class="form-control" name="ar_name"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="en_name">الاسم بالانجيلزية</label>
                                        <input type="text" id="en_name" class="form-control" name="en_name"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="ar_components">المكونات بالعربية</label>
                                        <input type="text" id="ar_components" class="form-control" name="ar_components"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="en_components">المكونات بالانجيلزية</label>
                                        <input type="text" id="en_components" class="form-control" name="en_components"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="section_id">القسم</label>
                                        <select class="form-control" id="section_id" name='section_id'>
                                            <option selected disabled>اختر قسم...</option>
                                            @forelse ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->ar_name }}</option>
                                            @empty
                                                <option selected disabled>لا يوجد اقسام</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="children_id" id="test">القسم الفرعي</label>
                                        <select class="form-control children_id" id="children_id" name='children_id'>
                                            <option selected disabled>اختر قسم...</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="price">السعر</label>
                                        <input type="text" name="price" id="price" class="form-control">
                                    </div>





                                    <div class="mb-3">
                                        <label for="image" class="form-label">الصورة</label>
                                        <input type="file" type="text" rows="2" style="resize: none"
                                            name="image" id="image" class="form-control"></ه>
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

@section('scripts')
    <script>
        $('#section_id').on("change", function() {

            var section_id = $('#section_id').val();

            $("#children_id").html(" ");

            $.ajax({

                type: 'get',
                url: "{{ route('get-sub-category') }}",
                data: {
                    'section_id': section_id
                },
                success: function(data) {
                    document.getElementById('children_id').innerHTML +=
                        '<option value="0" disabled="true" selected="true">اختر التصنيف الفرعي</option>';

                    for (var i = 0; i < data.length; i++) {
                        document.getElementById('children_id').innerHTML += '<option value="' + data[i]
                            .id + '">' + data[i]['ar_name'] + '</option>';
                    }
                },
                error: function() {}
            });

        });
    </script>
@endsection
