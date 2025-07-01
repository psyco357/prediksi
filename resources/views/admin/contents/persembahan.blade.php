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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Data Persembahan</h1>
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
                        <li class="breadcrumb-item text-muted">Data Persembahan</li>
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
                                        <th class="min-w-125px">Jenis Persembahan</th>
                                        <th class="min-w-125px">Nominal</th>
                                        <th class="min-w-100px">Bukti Bayar</th>
                                        <th class="min-w-100px">Status</th>
                                        <th class="text-end min-w-100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data rows akan dimasukkan di sini -->
                                    @foreach ($persembahan as $index => $member)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $member->namalengkap }}</td>
                                            <td>{{ $member->namabaptis }}</td>
                                            <td>{{ $member->jenis->nama_jenis ?? '-' }}</td>
                                            <td>Rp. {{ number_format($member->nominal, 0, ',', '.') }} </td>
                                            <td>
                                                @if ($member->bukti_bayar)
                                                    <img src="{{ asset('storage/' . $member->bukti_bayar) }}"
                                                        alt="Bukti Bayar" width="60" height="60"
                                                        style="object-fit: cover; cursor: pointer; border-radius: 4px;"
                                                        onclick="showImageViewer('{{ asset('storage/' . $member->bukti_bayar) }}')" />
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $status = $member->status;
                                                    $badgeClass = match ($status) {
                                                        'pending' => 'badge-warning',
                                                        'diterima' => 'badge-success',
                                                        'ditolak' => 'badge-danger',
                                                        default => 'badge-secondary',
                                                    };
                                                @endphp

                                                <span class="badge {{ $badgeClass }}">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($member->status === 'pending')
                                                    <!-- Tombol Setuju -->
                                                    <button type="button" class="btn btn-sm btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $member->id }}">
                                                        Setuju
                                                    </button>

                                                    <!-- Tombol Tolak -->
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $member->id }}">
                                                        Tolak
                                                    </button>
                                                @else
                                                    <!-- Tombol Detail -->
                                                    <button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $member->id }}">
                                                        Detail
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- detail --}}
                                        <div class="modal fade" id="detailModal{{ $member->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Detail Persembahan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Nama:</strong> {{ $member->namalengkap }}</p>
                                                        <p><strong>Nominal:</strong>
                                                            {{ number_format($member->nominal, 0, ',', '.') }}</p>
                                                        <p><strong>Status:</strong> {{ ucfirst($member->status) }}</p>
                                                        <!-- Tambahkan informasi lain jika perlu -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel{{ $member->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('persembahan.status', $member->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="diterima">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $member->id }}">
                                                                Setujui Persembahan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin Menyetujui Persembahan
                                                            <strong>{{ $member->namalengkap }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Setuju</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $member->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('persembahan.status', $member->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="ditolak">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $member->id }}">
                                                                Tolak Persembahan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin Menolak Persembahan
                                                            <strong>{{ $member->namalengkap }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Tolak</button>
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
    {{-- view Images --}}
    <div id="imageViewerOverlay"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999;">
        <span onclick="closeImageViewer()"
            style="position:absolute; top:20px; right:30px; color:#fff; font-size:30px; cursor:pointer;">&times;</span>
        <img id="imageViewerImg" src="" style="max-width:90%; max-height:90%; border-radius:8px;" />
    </div>
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
    <script>
        function showImageViewer(src) {
            const overlay = document.getElementById('imageViewerOverlay');
            const image = document.getElementById('imageViewerImg');
            image.src = src;
            overlay.style.display = 'flex';
        }

        function closeImageViewer() {
            const overlay = document.getElementById('imageViewerOverlay');
            overlay.style.display = 'none';
            document.getElementById('imageViewerImg').src = '';
        }

        // Close viewer when clicking outside the image
        window.addEventListener('click', function(e) {
            const viewer = document.getElementById('imageViewerOverlay');
            const img = document.getElementById('imageViewerImg');
            if (e.target === viewer) {
                closeImageViewer();
            }
        });
    </script>

    {{-- <script src="assets/js/custom/apps/customers/add.js"></script> --}}
@endsection
