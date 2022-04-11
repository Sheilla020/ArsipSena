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
                <embed src="" height="100%" width="100%" frameborder="0" scrolling="auto" class="doc-preview">
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Document</h4>
                    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control form-control-lg" id="status" name="status" placeholder="" value="On Process" required>

                        <div class="form-group">
                            <label for="no_dokumen" class="form-label">No Dokumen</label>
                            <input type="text" class="form-control form-control-lg" id="no_dokumen" name="no_dokumen" placeholder="" value="{{ old('no_dokumen') }}" required>
                            <div class="invalid-feedback">
                                Valid No Dokumen is required.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_pengirim" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-lg" id="nama_pengirim" name="nama_pengirim" placeholder="" value="{{ old('nama_pengirim') }}" required>
                            <div class="invalid-feedback">
                                Valid Sumber Dokumen is required.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="perusahaan_pengirim" class="form-label">Asal Perusahaan</label>
                            <input type="text" class="form-control form-control-lg" id="perusahaan_pengirim" name="perusahaan_pengirim" value="{{ old('perusahaan_pengirim') }}" placeholder="PT. XXY">

                            <div class="invalid-feedback">
                                Please enter a valid Nama Perusahaan address.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="prihal" class="form-label">Prihal</label>
                            <input type="text" class="form-control form-control-lg" id="prihal" name="prihal" value="{{ old('prihal') }}" placeholder="prihal Document">
                            <div class="invalid-feedback">
                                Please enter a title Document.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file_name">Upload File</label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control file-upload-info" id="file_name" name="file" value="{{ old('file') }}" placeholder="file.pdf|jpg|png|xlsx" onchange="previewDoc()" required>
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="unit_kerja_id" class="form-label">Unit kerja</label>
                                <select class="form-control form-control-lg" name="unit_kerja_id" value="{{ old('unit_kerja_id') }}">
                                    @foreach ($unit as $u)
                                    <option value="{{ $u->id }}">{{ $u->unit}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Unit Kerja is required
                                </div>
                            </div>

                            <div class="col">
                                <label for="type_file_id" class="form-label">Type File</label>
                                <select class="form-control form-control-lg" name="category_id" value="{{ old('type_file_id') }}">
                                    @foreach ($category as $t)
                                    <option value="{{ $t->id }}">{{ $t->category}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Type file is required
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" rows="4" id="keterangan" name="keterangan" placeholder="1234 Main St" required></textarea>
                            <div class="invalid-feedback">
                                Please enter your description.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_upload" class="form-label">Tanggal Upload</label>
                            <input type="date" class="form-control form-control-lg" id="tgl_upload" name="tgl_upload" placeholder="">
                            <small class="text-muted">Enter the data according to the delivery date</small>
                            <div class="invalid-feedback">
                                Tanggal required
                            </div>
                        </div>

                        <button class="w-100 btn btn-primary btn-lg">Submit</button>
                    </form>
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