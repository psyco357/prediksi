@extends('layouts.app')
@section('contents')
    @include('header.navigations')

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
    @if (session('error'))
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    timer: 4000,
                    showConfirmButton: true
                });
            });
        </script>
    @endif
    <!--begin::Container-->
    <div class="container" style="margin-top:50px">
        <!--begin::Heading-->
        <div class="text-center mb-17">
            <!--begin::Title-->
            <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}"
                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                Persembahan</h3>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="fs-5 text-muted fw-bold">Langakah untuk Melakukan Persembahan
            </div>
            <!--end::Text-->
        </div>
        <!--end::Heading-->
        <!--begin::Row-->
        <div class="row w-100 gy-10 mb-md-20">
            <!--begin::Col-->
            <div class="col-md-4 px-5">
                <!--begin::Story-->
                <div class="text-center mb-10 mb-md-0">
                    <!--begin::Illustration-->
                    <img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
                    <!--end::Illustration-->
                    <!--begin::Heading-->
                    <div class="d-flex flex-center mb-5">
                        <!--begin::Badge-->
                        <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">1</span>
                        <!--end::Badge-->
                        <!--begin::Title-->
                        <div class="fs-5 fs-lg-3 fw-bolder text-dark">Jane Miller</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Description-->
                    <div class="fw-bold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                        <br />by using single tool for different
                        <br />amazing and great
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Story-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-4 px-5">
                <!--begin::Story-->
                <div class="text-center mb-10 mb-md-0">
                    <!--begin::Illustration-->
                    <img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
                    <!--end::Illustration-->
                    <!--begin::Heading-->
                    <div class="d-flex flex-center mb-5">
                        <!--begin::Badge-->
                        <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span>
                        <!--end::Badge-->
                        <!--begin::Title-->
                        <div class="fs-5 fs-lg-3 fw-bolder text-dark">Setup Your App</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Description-->
                    <div class="fw-bold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                        <br />by using single tool for different
                        <br />amazing and great
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Story-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-4 px-5">
                <!--begin::Story-->
                <div class="text-center mb-10 mb-md-0">
                    <!--begin::Illustration-->
                    <img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
                    <!--end::Illustration-->
                    <!--begin::Heading-->
                    <div class="d-flex flex-center mb-5">
                        <!--begin::Badge-->
                        <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span>
                        <!--end::Badge-->
                        <!--begin::Title-->
                        <div class="fs-5 fs-lg-3 fw-bolder text-dark">Enjoy Nautica App</div>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Description-->
                    <div class="fw-bold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
                        <br />by using single tool for different
                        <br />amazing and great
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Story-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Product slider-->
        <div class="tns tns-default">
            <!--begin::Form-->
            <form class="form" action="{{ route('persembahan.store') }}" id="formpersembahan"
                enctype="multipart/form-data" method="POST">
                @csrf
                <!--begin::Modal header-->
                <div class="text-center mb-10 mb-md-0">
                    <!--begin::Modal title-->
                    <h1 class="fw-bolder"
                        style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        Persembahan</h1>
                    <!--end::Modal title-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="namalengkap">Nama Lengkap </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="Nama lengkap"
                                name="namalengkap" id="namalengkap" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="namabaptis">Nama Baptis</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="Nama Baptis"
                                name="namabaptis" id="namabaptis" />
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="jenis_persembahan_id">Jenis Persembahan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid" name="jenis_persembahan_id"
                                id="jenis_persembahan_id">
                                <option value="">-- Pilih Jenis Pesembahan --</option>
                                @foreach ($jenisPersembahan as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="nominal">Nominal</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="Nominal Persembahan"
                                name="nominal" id="nominal" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="bukti_bayar">Bukti Bayar</label><br />
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                                <!--begin::Cancel button-->
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel button-->

                                <!--begin::Remove button-->
                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove button-->
                            </div>
                            <!--end::Image input-->


                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Reset</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">Kirim</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Product slider-->
    </div>
    <!--end::Container-->

    <script>
        const inputNominal = document.getElementById('nominal');

        inputNominal.addEventListener('input', function(e) {
            // Hapus semua karakter non-angka
            let value = e.target.value.replace(/[^0-9]/g, '');

            // Format ke Rupiah
            value = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);

            e.target.value = value;
        });
    </script>
@endsection
