@extends('layouts.app')

@section('title', 'Admin')
@push('style')
    <!-- DataTables -->
    <link href="{{ asset('assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@section('main')
    <div class="page-content">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Data User</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data User</a></li>
                                <li class="breadcrumb-item active">Pendaftar</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <div class="float-end d-none d-sm-block">
                            <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                                Add Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="container-fluid">

            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body  pt-0">
                                <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="admin-tab" data-bs-toggle="tab" href="#admin"
                                            role="tab" aria-controls="admin" aria-selected="true">Admin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="operator-tab" data-bs-toggle="tab" href="#operator"
                                            role="tab" aria-controls="operator" aria-selected="false">Operator</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="siswa-tab" data-bs-toggle="tab" href="#siswa"
                                            role="tab" aria-controls="siswa" aria-selected="false">Siswa</a>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content" id="userTabContent">
                                    <!-- Admin Tab -->
                                    <div class="tab-pane fade show active" id="admin" role="tabpanel"
                                        aria-labelledby="admin-tab">
                                        <div class="table-responsive">
                                            <table class="table table-centered datatable dt-responsive nowrap "
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="ordercheck">
                                                                <label class="form-check-label"
                                                                    for="ordercheck">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>No</th>
                                                        <th>Username</th>
                                                        <th>Nama Admin</th>
                                                        <th>Status</th>
                                                        <th style="width: 120px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($admins as $key => $item)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="ordercheck1">
                                                                    <label class="form-check-label"
                                                                        for="ordercheck1">&nbsp;</label>
                                                                </div>
                                                            </td>

                                                            <td><a href="javascript: void(0);"
                                                                    class="text-dark fw-bold">#{{ $key + 1 }}</a>
                                                            </td>
                                                            <td>
                                                                {{ $item->username }}
                                                            </td>
                                                            <td>
                                                                {{ $item->name }}
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-primary">{{ $item->level }}</span>
                                                            </td>
                                                            <td id="tooltip-container1">
                                                                <a href="{{ route('users.edit', $item->id) }}"
                                                                    class="me-3 text-primary"
                                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Edit"><i
                                                                        class="mdi mdi-pencil font-size-18"></i></a>
                                                                <form action="{{ route('users.destroy', $item->id) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="javascript:void(0);" class="text-danger delete-jurusan"
                                                                        data-bs-container="#tooltip-container1"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Delete">
                                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>

                                <!-- Tab Content -->
                                <div class="tab-content" id="userTabContent">
                                    <!-- Operator Tab -->
                                    <div class="tab-pane fade show" id="operator" role="tabpanel"
                                        aria-labelledby="operator-tab">
                                        <div class="table-responsive">
                                            <table class="table table-centered datatable dt-responsive nowrap "
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="ordercheck">
                                                                <label class="form-check-label"
                                                                    for="ordercheck">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>No</th>
                                                        <th>Username</th>
                                                        <th>Nama Operator</th>
                                                        <th>Status</th>
                                                        <th style="width: 120px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($operators as $key => $item)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="ordercheck1">
                                                                    <label class="form-check-label"
                                                                        for="ordercheck1">&nbsp;</label>
                                                                </div>
                                                            </td>

                                                            <td><a href="javascript: void(0);"
                                                                    class="text-dark fw-bold">#{{ $key + 1 }}</a>
                                                            </td>
                                                            <td>
                                                                {{ $item->username }}
                                                            </td>
                                                            <td>
                                                                {{ $item->name }}
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-primary">{{ $item->level }}</span>
                                                            </td>
                                                            <td id="tooltip-container1">
                                                                <a href="{{ route('users.edit', $item->id) }}"
                                                                    class="me-3 text-primary"
                                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Edit"><i
                                                                        class="mdi mdi-pencil font-size-18"></i></a>
                                                                <form action="{{ route('users.destroy', $item->id) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="javascript:void(0);" class="text-danger delete-jurusan"
                                                                        data-bs-container="#tooltip-container1"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Delete">
                                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>

                                <!-- Tab Content -->
                                <div class="tab-content" id="userTabContent">
                                    <!-- Siswa Tab -->
                                    <div class="tab-pane fade show" id="siswa" role="tabpanel"
                                        aria-labelledby="siswa-tab">
                                        <div class="table-responsive">
                                            <table class="table table-centered datatable dt-responsive nowrap "
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="ordercheck">
                                                                <label class="form-check-label"
                                                                    for="ordercheck">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>No</th>
                                                        <th>NISN</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Status</th>
                                                        <th style="width: 120px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($siswas as $key => $item)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="ordercheck1">
                                                                    <label class="form-check-label"
                                                                        for="ordercheck1">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                            <td><a href="javascript: void(0);"
                                                                    class="text-dark fw-bold">#{{ $key+1 }}</a>
                                                            </td>
                                                            <td>
                                                                {{ $item->nisn }}
                                                            </td>
                                                            <td>
                                                                {{ $item->name }}
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-primary">{{ $item->level }}</span>
                                                            </td>
                                                            <td id="tooltip-container1">
                                                                <a href="{{ route('users.edit', $item->id) }}"
                                                                    class="me-3 text-primary"
                                                                    data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Edit"><i
                                                                        class="mdi mdi-pencil font-size-18"></i></a>
                                                                <form action="{{ route('users.destroy', $item->id) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="javascript:void(0);" class="text-danger delete-jurusan"
                                                                        data-bs-container="#tooltip-container1"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Delete">
                                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                                    </a>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>

        </div>

    </div> <!-- container-fluid -->
    </div>
@endsection
@push('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets2/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="assets2/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="assets2/js/pages/ecommerce-datatables.init.js"></script>

    <script>
        $(document).ready(function() {
            $('#adminTable').DataTable();
            $('#siswaTable').DataTable();
        });
    </script>
@endpush
