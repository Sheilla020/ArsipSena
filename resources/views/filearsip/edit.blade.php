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
                @if($arsip->file)
                <embed src="/stored/{{ $arsip->file }}" height="100%" width="100%" frameborder="0" scrolling="auto">
                @else
                <embed src="" height="100%" width="100%" frameborder="0" scrolling="auto" class="doc-preview">
                @endif
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Document</h4>
                    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" class="form-control form-control-lg" id="status" name="oldfile" value="{{ old('file', $arsip->file) }}" required>

                        <div class="form-group">
                            <label for="no_dokumen" class="form-label">No Dokumen</label>
                            <input type="text" class="form-control form-control-lg" id="no_dokumen" name="no_dokumen" placeholder="" value="{{ old('no_dokumen', $arsip->no_dokumen) }}" required>
                            <div class="invalid-feedback">
                                Valid No Dokumen is required.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_pengirim" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-lg" id="nama_pengirim" name="nama_pengirim" placeholder="" value="{{ old('nama_pengirim', $arsip->nama_pengirim) }}" required>
                            <div class="invalid-feedback">
                                Valid Sumber Dokumen is required.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="perusahaan_pengirim" class="form-label">Asal Perusahaan</label>
                            <input type="text" class="form-control form-control-lg" id="perusahaan_pengirim" name="perusahaan_pengirim" value="{{ old('perusahaan_pengirim', $arsip->perusahaan_pengirim) }}" placeholder="PT. XXY">

                            <div class="invalid-feedback">
                                Please enter a valid Nama Perusahaan address.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="prihal" class="form-label">Prihal</label>
                            <input type="text" class="form-control form-control-lg" id="prihal" name="prihal" value="{{ old('prihal', $arsip->prihal) }}" placeholder="prihal Document">
                            <div class="invalid-feedback">
                                Please enter a title Document.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file_name">Upload File</label>
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control file-upload-info" id="file_name" name="file" value="{{ old('file', $arsip->file) }}" onchange="previewDoc()">
                                <span class="input-group-append">
                                    <input type="hidden" class="form-control file-upload-info" id="file_name" name="file" value="{{ old('file', $arsip->file) }}" placeholder="file.pdf|jpg|png|xlsx" onchange="previewDoc()" required>
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="unit_kerja_id" class="form-label">Unit kerja</label>
                                <select class="form-control form-control-lg" name="unit_kerja_id">
                                    @foreach ($unit as $u)
                                    @if(old('unit_kerja_id', $arsip->unit_kerja_id) == $u->id)
                                    <option value="{{ $u->id }}">{{ $u->unit}}</option>
                                    @else
                                    <option value="{{ $u->id }}">{{ $u->unit }} </option>
                                    @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Unit Kerja is required
                                </div>
                            </div>

                            <div class="col">
                                <label for="type_file_id" class="form-label">Category</label>
                                <select class="form-control form-control-lg" name="category_id">
                                    @foreach ($category as $t)
                                    @if(old('category_id', $arsip->category_id) == $t->id)
                                    <option value="{{ $t->id }}" selected>{{ $t->category }}</option>
                                    @else
                                    <option value="{{ $t->id }}">{{ $t->category }} </option>
                                    @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Type file is required
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" rows="4" id="keterangan" name="keterangan" placeholder="1234 Main St" value="{{ old('keterangan', $arsip->keterangan ) }}" required>{{ $arsip->keterangan }}</textarea>
                            <div class="invalid-feedback">
                                Please enter your description.
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="tgl_upload" class="form-label">Tanggal Upload</label>
                                <input type="date" class="form-control form-control-lg" id="tgl_upload" name="tgl_upload" value="{{ old('keterangan', $arsip->tgl_upload ) }}" disabled>
                                <div class="invalid-feedback">
                                    Tanggal required
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col">
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" id="status1" value=" On Process" checked>
                                            On Process
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" id="status2" value="Fix">
                                            Fix
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" id="status3" value="Decline">
                                            Decline
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" id="status4" value="Publish">
                                            Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
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