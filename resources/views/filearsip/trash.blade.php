@extends('layouts.template')
@section('Plugin')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="sky/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="sky/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" type="text/css" href="sky/js/select.dataTables.min.css">
<link rel="stylesheet" href="sky/vendors/mdi/css/materialdesignicons.min.css">

<!-- End plugin css for this page -->
@endsection
@section('main')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <h4 class="text-light">{!! session('success') !!}</h4>
                </div>
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <h4 class="text-light"> {!! session('error') !!}</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-4">
                        <div class="form-group mr-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-title mb-0">All File</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>No Dokumen</th>
                                    <th>Prihal</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($arsip->count() > 0)
                                @forelse ($arsip as $a)
                                <tr>
                                    <td>{{ $a->no_dokumen }}</td>
                                    <td class="font-weight-bold">{{ $a->prihal }}</td>
                                    <td>{{ $a->tgl_upload }}</td>
                                    <td class="font-weight-medium">
                                        <form method="POST" action="{{route('restore', [$a->id])}}" class="d-inline">
                                            @csrf
                                            <button type="submit" value="Restore" class="btn btn-inverse-success btn-icon">
                                                <a style="color: white;"><i class="ti-export"></i></a>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{route('deletePermanent', [$a->id])}}" class="d-inline" onsubmit="return confirm('Delete this data permanently ?')">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-inverse-danger btn-icon" type="submit" data-toggle="tooltip" value="Delete" title=" Delete">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <img src="sky/images/Empty.gif">
                                    </div>
                                </div>
                                @endforelse
                                @else
                                <div class="">
                                    <div class="card-body">
                                        <img src="sky/images/Empty.gif">
                                    </div>
                                </div>
                                @endif
                            </tbody>
                        </table>
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
<!-- End custom js for this page-->
@endsection