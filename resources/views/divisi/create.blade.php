@extends('layouts.template')
@section('Plugin')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('sky/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('sky/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
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
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="row">
                    <div class="card-body">
                        <h4 class="card-title">Add Unit Kerja</h4>
                        <form class="form-inline" action="{{ route('storeunit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2 mr-sm-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class=" ti-bag"></i></div>
                                </div>
                                <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit Kerja" value="{{ old('unit') }}" required>
                            </div>
                            <label class="sr-only" for="inlineFormInputName2">Keterangan</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Keterangan" required>
                            <button class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                    <div class="card col-4  ms-card-light-danger">
                        <div class="card-body">
                            <h4 class="mb-4">Jumlah Unit </h4>
                            <h3 class="fs-30 mb-2">{{ $unit->count() }}</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-6">
                        <form action="{{ url()->current() }}" method="get">
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
                    <p class="card-title mb-0">All Unit Kerja</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Unit</th>
                                    <th>keterangan</th>
                                    <th>Jumlah File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($page->count() > 0)
                                @forelse ($page as $a)
                                <tr>
                                    <td>{{ $a->unit }}</td>
                                    <td class="font-weight-bold">
                                        {{ $a->keterangan }}
                                    </td>
                                    <td class="font-weight-bold">
                                        {{ $a->arsip->count() }}
                                    </td>
                                    <!-- <td class="template-demo ">
                                        <button type="button" class="btn btn-warning btn-icon mb-2">
                                            <a style="color: white;" href=""><i class="ti-pencil"></i></a>
                                        </button>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Move data to trash?')" action="">
                                            @csrf
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-danger btn-icon mt-1" type="submit" data-toggle="tooltip" value="Delete" title=" Delete">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </td> -->
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
                                    <div class="card-header">
                                        <h4>Empty Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <img src="sky/images/Empty.gif">
                                    </div>
                                </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 text-right">
                        <nav class="d-inline-block">
                            {{ $page->links() }}
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
<script src="{{ asset('sky/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('sky/vendors/select2/select2.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{ asset('sky/js/file-upload.js') }}"></script>
<script src="{{ asset('sky/js/typeahead.js') }}"></script>
<script src="{{ asset('sky/js/select2.js') }}"></script>
<!-- End custom js for this page-->
@endsection