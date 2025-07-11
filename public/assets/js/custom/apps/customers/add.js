"use strict";
var KTModalCustomersAdd = (function () {
    var t, e, o, n, r, i;
    return {
        init: function () {
            (i = new bootstrap.Modal(
                document.querySelector("#kt_modal_add_customer")
            )),
                (r = document.querySelector("#kt_modal_add_customer_form")),
                (t = r.querySelector("#kt_modal_add_customer_submit")),
                (e = r.querySelector("#kt_modal_add_customer_cancel")),
                (o = r.querySelector("#kt_modal_add_customer_close")),
                $(r.querySelector(".tanggal")).flatpickr({
                    // enableTime: !0,
                    dateFormat: "d-m-Y",
                }),
                (n = FormValidation.formValidation(r, {
                    fields: {
                        namalengkap: {
                            validators: {
                                notEmpty: {
                                    message: "Nama Lengkap name is required",
                                },
                            },
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Member email is required",
                                },
                            },
                        },
                        alamat: {
                            validators: {
                                notEmpty: { message: "Alamat  is required" },
                            },
                        },
                        jekel: {
                            validators: {
                                notEmpty: {
                                    message: "Jenis Kelamin is required",
                                },
                            },
                        },
                        tempatlahir: {
                            validators: {
                                notEmpty: {
                                    message: "Tempat Lahir is required",
                                },
                            },
                        },
                        notelp: {
                            validators: {
                                notEmpty: {
                                    message: "Nomer Telepon is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                $(r.querySelector('[name="country"]')).on(
                    "change",
                    function () {
                        n.revalidateField("country");
                    }
                ),
                t.addEventListener("click", function (e) {
                    e.preventDefault(),
                        n &&
                            n.validate().then(function (e) {
                                console.log("validated!"),
                                    "Valid" == e
                                        ? (t.setAttribute(
                                              "data-kt-indicator",
                                              "on"
                                          ),
                                          (t.disabled = true),
                                          $.ajaxSetup({
                                              headers: {
                                                  "X-CSRF-TOKEN": document
                                                      .querySelector(
                                                          'meta[name="csrf-token"]'
                                                      )
                                                      .getAttribute("content"),
                                              },
                                          }),
                                          $.ajax({
                                              type: "POST",
                                              url: r.getAttribute("action"), // Ambil action langsung dari form
                                              data: $(r).serialize(),
                                              success: function (res) {
                                                  t.removeAttribute(
                                                      "data-kt-indicator"
                                                  );
                                                  t.disabled = false;

                                                  Swal.fire({
                                                      text: "Member berhasil ditambahkan!",
                                                      icon: "success",
                                                      buttonsStyling: false,
                                                      confirmButtonText:
                                                          "OK, got it!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary",
                                                      },
                                                  }).then(function (result) {
                                                      if (result.isConfirmed) {
                                                          i.hide(); // Tutup modal
                                                          r.reset(); // Reset form
                                                          // Optional: reload data table or page
                                                      }
                                                  });
                                              },
                                              error: function (xhr) {
                                                  t.removeAttribute(
                                                      "data-kt-indicator"
                                                  );
                                                  t.disabled = false;

                                                  let errorText =
                                                      "Terjadi kesalahan saat menyimpan.";

                                                  if (
                                                      xhr.responseJSON &&
                                                      xhr.responseJSON.errors
                                                  ) {
                                                      errorText = Object.values(
                                                          xhr.responseJSON
                                                              .errors
                                                      ).join("<br>");
                                                  }

                                                  Swal.fire({
                                                      html: errorText,
                                                      icon: "error",
                                                      buttonsStyling: false,
                                                      confirmButtonText:
                                                          "OK, mengerti!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary",
                                                      },
                                                  });
                                              },
                                          }))
                                        : Swal.fire({
                                              text: "Sorry, looks like there are some errors detected, please try again.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                            });
                }),
                e.addEventListener("click", function (t) {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light",
                            },
                        }).then(function (t) {
                            t.value
                                ? (r.reset(), i.hide())
                                : "cancel" === t.dismiss &&
                                  Swal.fire({
                                      text: "Your form has not been cancelled!.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton: "btn btn-primary",
                                      },
                                  });
                        });
                }),
                o.addEventListener("click", function (t) {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light",
                            },
                        }).then(function (t) {
                            t.value
                                ? (r.reset(), i.hide())
                                : "cancel" === t.dismiss &&
                                  Swal.fire({
                                      text: "Your form has not been cancelled!.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton: "btn btn-primary",
                                      },
                                  });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTModalCustomersAdd.init();
});
