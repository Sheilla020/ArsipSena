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
        <div class="col-md-12 grid-margin stretch-card">
            <div class=" card">
                <embed src="/stored/{{ $arsip->file }}" height="550px" width="100%" frameborder="0" scrolling="auto" class="doc-preview">
            </div>
        </div>
    </div>
</div>
<script>
    function previewDoc() {
        const doc = document.querySelector('#file_name');
        const docPreview = document.querySelector('.doc-preview');

        docPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(doc.files[0]);

        oFReader.onload = function(oFREvent) {
            docPreview.src = oFREvent.target.result;
        }
    }
</script>
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