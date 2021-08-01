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


            {{--            <div class="mb-3 mb-xl-0">--}}
            {{--                <div class="btn-group dropdown">--}}
            {{--                    <button type="button" class="btn btn-primary">14 Aug 2019</button>--}}
            {{--                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"--}}
            {{--                            id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--                        <span class="sr-only">Toggle Dropdown</span>--}}
            {{--                    </button>--}}
            {{--                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"--}}
            {{--                         data-x-placement="bottom-end">--}}
            {{--                        <a class="dropdown-item" href="#">2015</a>--}}
            {{--                        <a class="dropdown-item" href="#">2016</a>--}}
            {{--                        <a class="dropdown-item" href="#">2017</a>--}}
            {{--                        <a class="dropdown-item" href="#">2018</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <!-- div -->
        <div class="card" id="tabs-style4">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Vertical Tabs
                </div>
                <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                <div class="text-wrap">
                    <div class="example">
                        <div class="d-md-flex">
                            <div class="">
                                <div class="panel panel-primary tabs-style-4">
                                    <div class="tab-menu-heading">
                                        <div class="tabs-menu ">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs ml-3">
                                                <li class=""><a href="#tab1" class="active" data-toggle="tab">
                                                        عام</a></li>
                                                <li><a href="#tab2" data-toggle="tab">
                                                        التفاصيل الماديه</a></li>
                                                <li><a href="#tab3" data-toggle="tab">
                                                        التواريخ</a></li>
                                                <li><a href="#tab4" data-toggle="tab">
                                                        المرفقات</a></li>
                                            </ul>
                                        </div>
                                    </div>
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
                                                                        <span class="text-success">{{ $invoiceDetails[0]->status }}</span>
                                                                    @elseif($invoiceDetails[0]->value_status == 2)
                                                                        <span class="text-danger">{{ $invoiceDetails[0]->status }}</span>
                                                                    @else
                                                                        <span class="text-warning">{{ $invoiceDetails[0]->status }}</span>
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
                                                                       <span class="text-danger">{{ $invoiceDetails[0]->status }}</span>
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
                                                    <div class="table-responsive">
                                                        <table class="table mg-b-0 text-md-nowrap">
                                                            <tr>
                                                                <th>المرفقات</th>
                                                                <th>{{$invoice[0]->amount_collection}}</th>
                                                            </tr>
                                                        </table>
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
@endsection
