<!--begin::Header Section-->
<div class="mb-0" id="home">
    <!--begin::Wrapper-->
    <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg">
        @include('header.navigations')
        <div class="landing-dark-bg"
            style="background-image: url('{{ asset('images/gereja.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: 100vh;
            margin-top: 80;
            padding: 0;">
            <!--begin::Landing hero-->
            <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                <!--begin::Heading-->
                <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                    <!--begin::Title-->
                    <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">GEREJA KEMENANGAN IMAN INDONESIA
                        <br />
                        {{-- with --}}
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                            <span id="kt_landing_hero_text">YI SHUN SHIN</span>
                        </span>
                    </h1>
                    <!--end::Title-->
                    <!--begin::Action-->
                    {{-- <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_customer">Add Customer</a> --}}

                    <a href="/member" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_customer">Daftar
                        Member</a>
                    {{-- <a href="../../demo1/dist/index.html" class="btn btn-primary">Try Metronic</a> --}}
                    <!--end::Action-->
                </div>
                <!--end::Heading-->

            </div>
            <!--end::Landing hero-->
        </div>

    </div>
    <!--end::Wrapper-->
    <!--begin::Curve bottom-->
    <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
        <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d=" M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500
        11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor">
            </path>
        </svg>
    </div>
    <!--end::Curve bottom-->
</div>
<!--end::Header Section-->

{{-- Modal --}}
@include('contents.member')
{{-- End Modal --}}

@section('script')
    <script src="assets/js/custom/apps/customers/add.js"></script>
@endsection
