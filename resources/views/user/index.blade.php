@extends('layouts.template')
@section('Plugin')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="sky/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="sky/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" type="text/css" href="sky/js/select.dataTables.min.css">
<link rel="stylesheet" href="sky/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="card/css/style.css">
<link rel="stylesheet" href="card/css/components.css">
<!-- End plugin css for this page -->
@endsection
@section('main')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin transparent">
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-4">
                        <form action="" method="get">
                            <div class="form-group mr-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="keyword" value="{{ request('keyword') }}" aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="card-title mb-0">All File</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($user->count() > 0)
                                @forelse ($user as $a)
                                <tr>
                                    <td class="py-1">
                                        <img src="/images/{{ $a->image }}" alt="image" />
                                    </td>
                                    <td class="font-weight-bold">{{ $a->full_name }}</td>
                                    <td>
                                        {{ $a->email }}
                                        <div class="table-links">
                                            <div class="bullet"></div>
                                            <spam href="#"> {{ $a->username }}
                                            </spam>
                                        </div>
                                    </td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-success">{{ $a->status }}</div>
                                    </td>
                                    <td class="template-demo ">
                                        <button type="button" class="btn btn-warning btn-icon mb-2">
                                            <a style="color: white;" href="{{route('arsip.edit', [$a->id])}}"><i class="ti-pencil"></i></a>
                                        </button>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Move data to trash?')" action="{{route('admin.destroy', [$a->id])}}">
                                            @csrf
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-danger btn-icon mt-1" type="submit" data-toggle="tooltip" value="Delete" title=" Delete">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="">
                                    <div class="card-header">
                                        <h4>Empty Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <img src="sky/images/Empty.gif">
                                    </div>
                                </div>
                                @endforelse
                                @else
                                <div class="">
                                    <div class="card-body">
                                        <div class="empty-state" data-height="400">
                                            <img src="sky/images/Empty.gif">
                                            <h2>We couldn't find any data</h2>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Plugin js for this page -->
<script src="sky/vendors/chart.js/Chart.min.js"></script>
<script src="sky/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="sky/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="sky/js/dataTables.select.min.js"></script>
<!-- End plugin js for this page -->
<script src="sky/js/dashboard.js"></script>
<script src="sky/js/Chart.roundedBarCharts.js"></script>
<script src="sky/js/chart.js"></script>
<!-- End custom js for this page-->

@endsection