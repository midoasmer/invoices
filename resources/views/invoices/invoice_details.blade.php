@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل فاتورة</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">


        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-xl-12">
        <!-- div -->
        <div class="card mg-b-20" id="tabs-style2">
            <div class="card-body">
                <div class="text-wrap">
                    <div class="example">
                        <div class="panel panel-primary tabs-style-2">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li><a href="#tab1" class="nav-link active" data-toggle="tab">عام</a></li>
                                        <li><a href="#tab2" class="nav-link" data-toggle="tab">التفاصيل الماديه</a></li>
                                        <li><a href="#tab3" class="nav-link" data-toggle="tab">التواريخ</a></li>
                                        <li><a href="#tab4" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabs-style-4 ">
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="row row-sm">
                                                <div class="col-xl-12">
                                                    <div class="table-responsive">
                                                        <table class="table mg-b-0 text-md-nowrap">
                                                            <tr>
                                                                <th>رقم الفاتورة</th>
                                                                <th>{{$invoiceDetails[0]->invoice_number}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">القسم</th>
                                                                <td>{{$invoiceDetails[0]->section->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">المنتج</th>
                                                                <td>{{$invoiceDetails[0]->product}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">المستخدم</th>
                                                                <td>{{$invoiceDetails[0]->user}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">الحاله</th>
                                                                <td>
                                                                    @if ($invoiceDetails[0]->value_status == 1)
                                                                        <span
                                                                            class="text-success">{{ $invoiceDetails[0]->status }}</span>
                                                                    @elseif($invoiceDetails[0]->value_status == 2)
                                                                        <span
                                                                            class="text-danger">{{ $invoiceDetails[0]->status }}</span>
                                                                    @else
                                                                        <span
                                                                            class="text-warning">{{ $invoiceDetails[0]->status }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">ملاحظات</th>
                                                                <td>{{ $invoiceDetails[0]->note}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <div class="row row-sm">
                                                <div class="col-xl-12">
                                                    <div class="table-responsive">
                                                        <table class="table mg-b-0 text-md-nowrap">
                                                            <tr>
                                                                <th>المبلغ المحصل</th>
                                                                <th>{{$invoice[0]->amount_collection}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">مبلغ العموله</th>
                                                                <td>{{$invoice[0]->amount_commission}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">الخصم</th>
                                                                <td>{{$invoice[0]->discount}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">قيمه الضريبه</th>
                                                                <td>{{$invoice[0]->value_vat}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">نسبه الضريبه</th>
                                                                <td>{{$invoice[0]->rate_vat}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">الاجمالى</th>
                                                                <td>{{ $invoice[0]->total}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <div class="row row-sm">
                                                <div class="col-xl-12">
                                                    <div class="table-responsive">
                                                        <table class="table mg-b-0 text-md-nowrap">
                                                            <tr>
                                                                <th>تاريخ الفاتورة</th>
                                                                <th>{{$invoice[0]->invoice_date}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>تاريخ الاستحقاق</th>
                                                                <th>{{$invoice[0]->due_date}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">تاريخ الدفع</th>
                                                                <td>
                                                                    @if($invoiceDetails[0]->value_status == 2)
                                                                        <span
                                                                            class="text-danger">{{ $invoiceDetails[0]->status }}</span>
                                                                    @else{{$invoiceDetails[0]->payment_date}}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">تاريخ التسجيل</th>
                                                                <td>{{$invoice[0]->created_at}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">تاريخ اخر تعديل</th>
                                                                <td>{{$invoice[0]->updated_at}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <div class="row row-sm">
                                                <div class="col-xl-12">
                                                    <div class="card card-statistics">
                                                        <div class="card-body">
                                                            <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg ,
                                                                png </p>
                                                            <h5 class="card-title">اضافة مرفقات</h5>
                                                            <form method="post" action="{{ url('invoiceAttachment') }}" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="customFile" name="file_name" required>
{{--                                                                    <input type="file"  name="file_name" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"--}}
{{--                                                                           data-height="70" />--}}
                                                                    <input type="hidden" id="customFile" name="invoice_number" value="{{ $invoice[0]->invoice_number }}">
                                                                    <input type="hidden" id="invoice_id" name="invoice_id" value="{{ $invoice[0]->id }}">
                                                                    <label class="custom-file-label" for="customFile">حدد المرفق</label>
                                                                </div>
                                                                <br><br>
                                                                <button type="submit" class="btn btn-primary btn-sm "
                                                                        name="uploadedFile">تاكيد
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <br>
                                                        <div class="table-responsive">
                                                            @if($invoiceAttachments=="NON")
                                                                <span class="text-danger">لايوجد مرفقات</span>
                                                            @else
                                                                <table
                                                                    class="table center-aligned-table mb-0 table table-hover"
                                                                    style="text-align:center">
                                                                    <thead>
                                                                    <tr class="text-dark">
                                                                        <th scope="col">اسم الملف</th>
                                                                        <th scope="col">قام بالاضافة</th>
                                                                        <th scope="col">تاريخ الاضافة</th>
                                                                        <th scope="col">العمليات</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($invoiceAttachments as $invoiceAttachment)
                                                                    <tr>
                                                                            <td>{{ $invoiceAttachment->file_name }}</td>
                                                                            <td>{{ $invoiceAttachment->created_by }}</td>
                                                                            <td>{{ $invoiceAttachment->created_at }}</td>
                                                                            <td colspan="2">
                                                                                <a class="btn btn-outline-success btn-sm"
                                                                                   href="{{ url('viewFile') }}/{{ $invoiceAttachment->invoice_number }}/{{ $invoiceAttachment->file_name }}"
                                                                                   role="button"><i
                                                                                        class="fas fa-eye"></i>&nbsp;
                                                                                    عرض</a>

                                                                                <a class="btn btn-outline-info btn-sm"
                                                                                   href="{{ url('download') }}/{{ $invoiceAttachment->invoice_number }}/{{ $invoiceAttachment->file_name }}"
                                                                                   role="button"><i
                                                                                        class="fas fa-download"></i>&nbsp;
                                                                                    تحميل</a>

                                                                                {{--                                                                        @can('حذف المرفق')--}}
                                                                                <button
                                                                                    class="btn btn-outline-danger btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-file_name="{{ $invoiceAttachment->file_name }}"
                                                                                    data-invoice_number="{{ $invoiceAttachment->invoice_number }}"
                                                                                    data-id="{{ $invoiceAttachment->id }}"
                                                                                    data-target="#delete_file">حذف
                                                                                </button>
                                                                                {{--                                                                        @endcan--}}

                                                                            </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                    @endif
                                                                </table>
                                                                {{--                                                        <table class="table mg-b-0 text-md-nowrap">--}}
                                                                {{--                                                            <tr>--}}
                                                                {{--                                                                <th>المرفقات</th>--}}
                                                                {{--                                                                <td>--}}
                                                                {{--                                                                    @if($invoiceAttachment=="NON")--}}
                                                                {{--                                                                        <span--}}
                                                                {{--                                                                            class="text-danger">لايوجد مرفقات</span>--}}
                                                                {{--                                                                    @else<a--}}
                                                                {{--                                                                        href="{{ url('download') }}/{{$invoice[0]->invoice_number}}/{{ $invoiceAttachment[0]->file_name }}">{{$invoiceAttachment[0]->file_name}}</a>--}}
                                                                {{--                                                                    @endif--}}
                                                                {{--                                                                </td>--}}
                                                                {{--                                                            </tr>--}}
                                                                {{--                                                        </table>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /div -->
            </div>
        </div>
    </div>
    </div>
    <!-- /row -->
    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('deleteAttachment') }}" method="post">

                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- Internal Input tags js-->
    <script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
    <!--- Tabs JS-->
    <script src="{{URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
    <script src="{{URL::asset('assets/js/tabs.js')}}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
    <!-- Internal Prism js-->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)
            // alert('id:  '.id.'   name:   '.fail_name.'   invoice:   '.invoice_number);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>
@endsection
