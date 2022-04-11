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
        <div class="col-md-6 grid-margin stretch-card">
            <div class=" card">
                <embed src="/stored/{{ $arsip->file }}" height="100%" width="100%" frameborder="0" scrolling="auto" class="doc-preview">
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Document</h4>
                    <div class="form-group row">
                        <div class="col">
                            <label for="no_dokumen" class="form-label">No Dokumen : </label>
                            <small class="text-muted">{{ $arsip->no_dokumen }}</small>
                        </div>

                        <div class="col">
                            <label for="nama_pengirim" class="form-label">Nama Lengkap : </label>
                            <small class="text-muted">{{ $arsip->nama_pengirim }}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="perusahaan_pengirim" class="form-label">Asal Perusahaan : </label>
                            <small class="text-muted">{{ $arsip->perusahaan_pengirim }}</small>
                        </div>

                        <div class="col">
                            <label for="prihal" class="form-label">Prihal : </label>
                            <small class="text-muted">{{ $arsip->prihal }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file_name">Nama File :</label>
                        <small class="text-muted">{{ $arsip->file }}</small>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="unit_kerja_id" class="form-label">Unit kerja : </label>
                            <small class="text-muted">{{ $arsip->unit->unit }}</small>
                        </div>

                        <div class="col">
                            <label for="type_file_id" class="form-label">Category : </label>
                            <small class="text-muted">{{ $arsip->category->category }}</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan" class="form-label">Keterangan : </label>
                        <small class="text-muted">{{ $arsip->keterangan }}</small>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="tgl_upload" class="form-label">Tanggal Upload : </label>
                            <small class="text-muted">{{ $arsip->tgl_upload }}</small>
                        </div>

                        <div class="col">
                            <label for="tgl_upload" class="form-label">Status: </label>
                            <div class="badge badge-success">{{ $arsip->status }}</div>
                        </div>
                    </div>
                    <a class="btn btn-light" href="{{ route('admin.index') }}">Back</a>
                </div>
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