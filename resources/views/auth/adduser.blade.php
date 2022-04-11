@extends('layouts.template')
@section('main')
<!-- <div class="container-fluid page-body-wrapper full-page-wrapper">
    <img />
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="../../images/logo.svg" alt="logo">
                    </div>
                    <form class="pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                                <option>Unit Keja</option>
                                @foreach($unit as $u)
                                <option value="{{ $u->id }}">{{ $u->unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group col-xs-12">
                                <input type="hidden" class="form-control file-upload-info" id="file_name" name="file" value="{{ old('file') }}" placeholder="file.pdf|jpg|png|xlsx" onchange="previewDoc()" required>
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add User</h4>
                    <p class="card-description">
                        Personal info
                    </p>
                    <!-- <form action="{{ route('proses_regis') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="status" value="Active" />
                        <div class="row">
                            <div class="col-md-4 m-0">
                                <img src="{{ asset('sky/images/faces/profil.jpg') }}" alt="profile" width="250px" class="img-preview" />
                            </div>
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}" required />
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid No Dokumen is required.
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" />
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid Sumber Dokumen is required.
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" />
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter a valid Nama Perusahaan address.
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">File upload</label>
                                    <div class="input-group col-sm-9">
                                        <input type="file" name="image" class="form-control file-upload-info" id="file_name" value="{{ old('image') }}" placeholder="Upload Image" onchange="previewImg()">
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter a title Document.
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Unit Kerja</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="unit_kerja_id" value="{{ old('unit_kerja_id') }}">
                                            @foreach($unit as $u)
                                            <option value="{{ $u->id }}">{{ $u->unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="level" id="role" value="1">
                                                Admin
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="level" id="role" value="2">
                                                User
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                                    </div>
                                </div>
                            </div>
                            <button class="w-70  m-5 btn btn-primary btn-lg">Submit</button>
                    </form> -->
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control form-control-lg" id="status" name="status" placeholder="" value="active" required>
                        <div class="row">
                            <div class="col-md-4 m-0">
                                <img src="{{ asset('sky/images/default.jpg') }}" alt="profile" width="250px" class="img-preview" />
                            </div>
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control form-control-lg" id="full_name" name="full_name" placeholder="" value="{{ old('full_name') }}" required>
                                    <div class="invalid-feedback">
                                        Valid Sumber Dokumen is required.
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="PT. XXY">

                                    <div class="invalid-feedback">
                                        Please enter a valid Nama Perusahaan address.
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}" placeholder="prihal Document">
                                    <div class="invalid-feedback">
                                        Please enter a title Document.
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file_name">Image</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control file-upload-info" id="image" name="image" value="{{ old('image') }}" placeholder="file.pdf|jpg|png|xlsx" onchange="previewImg()" required>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
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
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    @foreach($role as $r)
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="level" id="role1" value="{{ $r->id }}">
                                                {{ $r->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="level" id="role2" value="2">
                                                User
                                            </label>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" value="{{ old('password') }}" placeholder="password">
                                    <div class="invalid-feedback">
                                        Please enter a title Document.
                                    </div>
                                </div>
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
    function previewImg() {
        const doc = document.querySelector('#image');
        const docPreview = document.querySelector('.img-preview');

        docPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(doc.files[0]);

        oFReader.onload = function(oFREvent) {
            docPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection