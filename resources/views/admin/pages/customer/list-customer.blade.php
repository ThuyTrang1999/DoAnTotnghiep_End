@extends('admin.layouts.master')

@section('title')
    list custommer
@endsection

@section('main_content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách khách hàng</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                    <div id="datatable-responsive_filter" class="dataTables_filter">
                            <label><i class="fa fa-search" aria-hidden="true"></i></label>
                            <input type="search" class="form-control input-sm" placeholder="Search ..."
                                    aria-controls="datatable-responsive">
                        </div>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">


                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            cellspacing="0" width="100%" role="grid"
                                            aria-describedby="datatable-responsive_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 80px;">Name</th>

                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;">Gender
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 34px;"
                                                        aria-label="Age: activate to sort column ascending">Address
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 74px;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Phone</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 60px;"
                                                        aria-label="Salary: activate to sort column ascending">Gmail
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 43px;"
                                                        aria-label="Extn.: activate to sort column ascending">Status</th>
                                                   
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">created
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 166px;"
                                                        aria-label="E-mail: activate to sort column ascending">updated
                                                    </th>
                                                    <th  tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        style="width: 81px;" aria-sort="ascending">
                                                        Function</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($listCustomer as $cus)
                                                <tr class="odd cus-{{$cus -> id}}">
                                                    <td>{{$cus -> name}}</td>
                                                    <td>{{$cus -> gender}}</td>
                                                    <td>{{$cus -> address}}</td>
                                                    <td>{{$cus -> phone}}</td>
                                                    <td>{{$cus -> email}}</td>
                                                    <td>{{$cus -> status}}</td>
                                                    <td>{{$cus -> created_at}}</td>
                                                    <td>{{$cus -> updated_at}}</td>
                                                    <td class="text-center">
                                                        
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                                @endforeach
                                           
                                            </tbody>
                                        </table>
                                        {!! $listCustomer->links() !!}
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

@endsection