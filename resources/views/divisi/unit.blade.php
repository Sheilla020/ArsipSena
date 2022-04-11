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

        <div class="row">
            <!-- <div class="col-md-7 stretch-card transparent" style="height: 100%">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Total Dokumen dalam Unit</p>
                        </div>
                        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="bar1-chart"></canvas>
                    </div>
                </div>
            </div> -->
            <div class="col-md-3 mb-4 stretch-card transparent" style="height: 150px;width:300px">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Total File in {{ $title }}</p>
                        <p class="fs-30 mb-2">{{ $arsip->count() }}</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
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
                                    <th>No Dokumen</th>
                                    <th>Prihal</th>
                                    <th>Category</th>
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
                                    <td class="font-weight-bold">
                                        {{ $a->category->category }}
                                        <div class="table-links">
                                            <div class="bullet"></div>
                                            <spam href="#"> {{ $a->category->keterangan }}
                                            </spam>
                                        </div>
                                    </td>
                                    <td>{{ $a->tgl_upload }}</td>
                                    <td class="font-weight-medium">
                                        @if($a->status == 'On Process')
                                        <div class="badge badge-warning">{{ $a->status }}</div>
                                        @elseif($a->status == 'Fix')
                                        <div class="badge badge-info">{{ $a->status }}</div>
                                        @elseif($a->status == 'Publish')
                                        <div class="badge badge-success">{{ $a->status }}</div>
                                        @elseif($a->status == 'Decline')
                                        <div class="badge badge-danger">{{ $a->status }}</div>
                                        @endif
                                    </td>
                                    <td class="template-demo ">
                                        <button type="button" class="btn btn-secondary btn-icon mb-2">
                                            <a style="color: white;" href="{{route('download', $a->id)}}"><i class=" ti-file"></i></a>
                                        </button>
                                        <button type="button" class="btn btn-success btn-icon mb-2">
                                            <a style="color: white;" href="{{route('arsip.show', [$a->id])}}"><i class="ti-eye"></i></a>
                                        </button>
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
<script src="sky/vendors/chart.js/Chart.min.js"></script>
<script src="sky/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="sky/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="sky/js/dataTables.select.min.js"></script>
<!-- End plugin js for this page -->
<script src="sky/js/dashboard.js"></script>
<script src="sky/js/Chart.roundedBarCharts.js"></script>
<script src="sky/js/chart.js"></script>
<!-- End custom js for this page-->

<?php
$kon = mysqli_connect("localhost", "root", "", "arsip_sena");

$nama_category = "";
$count = null;
$sql = "select category,COUNT(*) as 'total' from categories inner JOIN arsip_senas ON arsip_senas.category_id=categories.id WHERE arsip_senas.unit_kerja_id=1";
$hasil = mysqli_query($kon, $sql);
while ($data = mysqli_fetch_array($hasil)) {
    //Mengambil nilai jurusan dari database
    $jur = $data['category'];
    $nama_category .= "'$jur'" . ", ";
    //Mengambil nilai total dari database
    $jum = $data['total'];
    $count .= "$jum" . ", ";
}
?>
<script>
    var ctx = document.getElementById("bar1-chart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $nama_category; ?>],
            datasets: [{
                label: '',
                data: [<?php echo $count; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection