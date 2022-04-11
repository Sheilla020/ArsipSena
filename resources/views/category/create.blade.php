@extends('layouts.template')
@section('Plugin')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('sky/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('sky/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                <div class="row">
                    <div class="card-body m-2">
                        <h4 class="card-title">Add Category</h4>
                        <form class="form-inline" action="{{ route('storecategory') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class=" ti-folder"></i></div>
                                </div>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Nama Category" value="{{ old('category') }}" required>
                            </div>
                            <label class="sr-only" for="inlineFormInputName2">Keterangan</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Keterangan" required>
                            <button class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                    <div class="card col-4  ms-card-light-danger">
                        <div class="card-body">
                            <h4 class="mb-4">Jumlah Category</h4>
                            <h3 class="fs-30 mb-2">{{ $category->count() }}</h3>
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
                    <p class="card-title mb-0">All Category</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>keterangan</th>
                                    <th>Jumlah File</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @if ($page->count() > 0)
                                @forelse ($page as $a)
                                <tr>
                                    <td>{{ $a->category }}</td>
                                    <td class="font-weight-bold">
                                        {{ $a->keterangan }}
                                    </td>
                                    <td class="font-weight-bold">
                                        {{ $a->arsip->count() }}
                                    </td>
                                    <!-- <td class="template-demo ">
                                        <button type="button" class="btn btn-warning btn-icon mb-2" data-bs-toggle="modal" data-id="{{$a->id}}" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                            <a style="color: white;"><i class="ti-pencil"></i></a>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                </div>
                <div class="modal-body">
                    @foreach($category as $categorys)
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Category:</label>
                            <input type="text" class="form-control" id="recipient-name" value="{{ old('category', $categorys->category) }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Keterangan:</label>
                            <input type="text" class="form-control" id="recipient-name" value="{{ old('keterangan', $categorys->keterangan) }}">
                        </div>
                    </form>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Update</button>
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
<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })
</script>
<!-- End custom js for this page-->
@endsection