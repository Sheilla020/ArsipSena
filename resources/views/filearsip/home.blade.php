@extends('layouts.template')
@section('Plugin')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('sky/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('sky/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('sky/js/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('sky/vendors/mdi/css/materialdesignicons.min.css') }}">

<!-- End plugin css for this page -->
@endsection
@section('main')
<div class="content-wrapper">
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
                                    <th>Status</th>
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
                                        <div class="badge badge-success">{{ $a->status }}</div>
                                    </td>
                                    <td class="font-weight-medium">
                                        <div class="badge badge-info"> <a style="color: white;" href="{{route('arsip.show', [$a->id])}}">View</a></div>
                                        <div class="badge badge-warning"><a style="color: white;" href="{{route('arsip.edit', [$a->id])}}">Edit</a></div>
                                        <div class="badge badge-danger"><a style="color: white;" href="{{ route('arsip.index') }}">Delete</a></div>
                                    </td>
                                </tr>
                                @empty
                                <div class="">
                                    <div class="card-header">
                                        <h4>Empty Data</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                                @endforelse
                                @else
                                <div class="">
                                    <div class="card-header">
                                        <h4>Empty Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="empty-state" data-height="400">
                                            <div class="empty-state-icon">
                                                <i class="fas fa-question"></i>
                                            </div>
                                            <h2>We couldn't find any data</h2>
                                            <p class="lead">
                                                Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                            </p>
                                            <a href="#" class="btn btn-primary mt-4">Create new One</a>
                                        </div>
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
<script src="{{ asset('sky/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('sky/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('sky/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('sky/js/dataTables.select.min.js') }}"></script>
<!-- End plugin js for this page -->
<script src="{{ asset('sky/js/dashboard.js') }}"></script>
<script src="{{ asset('sky/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->
@endsection