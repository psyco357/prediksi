@extends('layouts.app')
@section('contents')
    @include('header.navigations')
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
            <form class="form" action="{{ route('member.store') }}" id="kt_modal_add_customer_form">
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
                            <label class="required fs-6 fw-bold mb-2" for="jekel">Jenis Kelamin</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid" name="jekel" id="jekel">
                                <option value="">-- Pilih Jenis Kelmain --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="tempatlahir">Tempat Lahir</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="Tempat Lahir"
                                name="tempatlahir" id="tempatlahir" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="tgllahir">Tanggal Lahir</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid tanggal"
                                placeholder="Tanggal Lahir" name="tgllahir" id="tgllahir" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2" for="notelp">Nomor Hp</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="Nomor Hp"
                                name="notelp" id="notelp" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2" for="email">
                                <span class="required">Email</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Email address must be active"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-solid" placeholder="example@gami.com"
                                name="email" id="email" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2" for="alamat">Alamat</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Jl. Soekarno Blok C no.78 rt2/3" name="alamat" id="alamat" />
                            <!--end::Input-->
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
@endsection
