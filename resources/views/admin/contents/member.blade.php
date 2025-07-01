@extends('admin.layouts.appadmin')
@section('style')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />
    {{-- <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection
@section('contents')
    @if (session('success'))
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Data Members</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/admin/member" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Data Members</li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end: :Page title-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-10px">No</th>
                                        <th class="min-w-125px">Nama Lengkap</th>
                                        <th class="min-w-125px">Nama Baptis</th>
                                        <th class="min-w-125px">Jenis Kelamin</th>
                                        <th class="min-w-125px">Tempat Tanggal Lahir</th>
                                        <th class="min-w-125px">No Hp</th>
                                        <th class="min-w-100px">Email</th>
                                        <th class="min-w-100px">Alamat</th>
                                        <th class="text-end min-w-100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data rows akan dimasukkan di sini -->
                                    @foreach ($members as $index => $member)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $member->namalengkap }}</td>
                                            <td>{{ $member->namabaptis }}</td>
                                            <td>{{ $member->jekel == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $member->tempatlahir }},{{ $member->tgllahir }} </td>
                                            <td>{{ $member->notelp }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->alamat }}</td>
                                            <td> <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $member->id }}">
                                                    Edit
                                                </button>

                                                <!-- Tombol Delete -->
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $member->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel{{ $member->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('member.update', $member->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $member->id }}">
                                                                Edit Member</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form fields -->
                                                            <div class="mb-3">
                                                                <label for="namalengkap{{ $member->id }}"
                                                                    class="form-label">Nama Lengkap</label>
                                                                <input type="text" name="namalengkap"
                                                                    class="form-control"
                                                                    id="namalengkap{{ $member->id }}"
                                                                    value="{{ $member->namalengkap }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="namabaptis{{ $member->id }}"
                                                                    class="form-label">Nama Baptis</label>
                                                                <input type="text" name="namabaptis" class="form-control"
                                                                    id="namabaptis{{ $member->id }}"
                                                                    value="{{ $member->namabaptis }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jekel{{ $member->id }}"
                                                                    class="form-label">Jenis Kelamin</label>
                                                                <select name="jekel" id="jekel{{ $member->id }}"
                                                                    class="form-select" required>
                                                                    <option value="L"
                                                                        {{ $member->jekel == 'L' ? 'selected' : '' }}>
                                                                        Laki-laki</option>
                                                                    <option value="P"
                                                                        {{ $member->jekel == 'P' ? 'selected' : '' }}>
                                                                        Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tempatlahir{{ $member->id }}"
                                                                    class="form-label">Tempat Lahir</label>
                                                                <input type="text" name="tempatlahir"
                                                                    class="form-control"
                                                                    id="tempatlahir{{ $member->id }}"
                                                                    value="{{ $member->tempatlahir }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgllahir{{ $member->id }}"
                                                                    class="form-label">Tanggal Lahir</label>

                                                                <input type="text" name="tgllahir"
                                                                    class="form-control tanggal"
                                                                    id="tgllahir{{ $member->id }}"
                                                                    value="{{ $member->tgllahir }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="notelp{{ $member->id }}"
                                                                    class="form-label">No Hp</label>
                                                                <input type="text" name="notelp" class="form-control"
                                                                    id="notelp{{ $member->id }}"
                                                                    value="{{ $member->notelp }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email{{ $member->id }}"
                                                                    class="form-label">Email</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    id="email{{ $member->id }}"
                                                                    value="{{ $member->email }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="alamat{{ $member->id }}"
                                                                    class="form-label">Alamat</label>
                                                                <textarea name="alamat" id="alamat{{ $member->id }}" class="form-control" rows="3">{{ $member->alamat }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $member->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('member.destroy', $member->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $member->id }}">
                                                                Hapus Member</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus member
                                                            <strong>{{ $member->namalengkap }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $member->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('member.destroy', $member->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $member->id }}">Hapus Member</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus member
                                                            <strong>{{ $member->namalengkap }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <!-- JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    {{-- <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            // Swal.fire('Hello!')
            flatpickr('.tanggal', {
                dateFormat: 'd-m-Y'
            });
            $('#kt_table_users').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    },
                    zeroRecords: "Tidak ada data ditemukan"
                }
            });
        });
    </script>

    {{-- <script src="assets/js/custom/apps/customers/add.js"></script> --}}
@endsection
