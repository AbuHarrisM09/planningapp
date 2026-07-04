(function ($) {
    "use strict";

    /*================================
    Preloader
    ==================================*/

    var preloader = $("#preloader");
    $(window).on("load", function () {
        setTimeout(function () {
            preloader.fadeOut("slow", function () {
                $(this).remove();
            });
        }, 300);
    });

    /*================================
    sidebar collapsing
    ==================================*/
    if (window.innerWidth <= 1364) {
        $(".page-container").addClass("sbar_collapsed");
    }
    $(".nav-btn").on("click", function () {
        $(".page-container").toggleClass("sbar_collapsed");
    });

    /*================================
    Start Footer resizer
    ==================================*/
    var e = function () {
        var e =
            (window.innerHeight > 0 ? window.innerHeight : this.screen.height) -
            5;
        ((e -= 67) < 1 && (e = 1),
            e > 67 && $(".main-content").css("min-height", e + "px"));
    };
    ($(window).ready(e), $(window).on("resize", e));

    /*================================
    sidebar menu
    ==================================*/
    $("#menu").metisMenu();

    /*================================
    slimscroll activation
    ==================================*/
    $(".menu-inner").slimScroll({
        height: "auto",
    });
    $(".nofity-list").slimScroll({
        height: "435px",
    });
    $(".timeline-area").slimScroll({
        height: "500px",
    });
    $(".recent-activity").slimScroll({
        height: "calc(100vh - 114px)",
    });
    $(".settings-list").slimScroll({
        height: "calc(100vh - 158px)",
    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop(),
            mainHeader = $("#sticky-header"),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover();

    /*------------- Start form Validation -------------*/
    window.addEventListener(
        "load",
        function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                    form.addEventListener(
                        "submit",
                        function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        },
                        false,
                    );
                },
            );
        },
        false,
    );

    /*================================
    datatable active
    ==================================*/
    if ($("#dataTable").length) {
        $("#dataTable").DataTable({
            responsive: true,
        });
    }
    if ($("#dataTable2").length) {
        $("#dataTable2").DataTable({
            responsive: true,
        });
    }
    if ($("#dataTable3").length) {
        $("#dataTable3").DataTable({
            responsive: true,
        });
    }

    /*================================
    Slicknav mobile menu
    ==================================*/
    $("ul#nav_menu").slicknav({
        prependTo: "#mobile_menu",
    });

    /*================================
    login form
    ==================================*/
    $(".form-gp input").on("focus", function () {
        $(this).parent(".form-gp").addClass("focused");
    });
    $(".form-gp input").on("focusout", function () {
        if ($(this).val().length === 0) {
            $(this).parent(".form-gp").removeClass("focused");
        }
    });

    /*================================
    slider-area background setting
    ==================================*/
    $(".settings-btn, .offset-close").on("click", function () {
        $(".offset-area").toggleClass("show_hide");
        $(".settings-btn").toggleClass("active");
    });

    /*================================
    Owl Carousel
    ==================================*/
    function slider_area() {
        var owl = $(".testimonial-carousel").owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                },
                450: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 2,
                },
                1360: {
                    items: 1,
                },
                1600: {
                    items: 2,
                },
            },
        });
    }
    slider_area();

    /*================================
    Fullscreen Page
    ==================================*/

    if ($("#full-view").length) {
        var requestFullscreen = function (ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log("Fullscreen API is not supported.");
            }
        };

        var exitFullscreen = function () {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log("Fullscreen API is not supported.");
            }
        };

        var fsDocButton = document.getElementById("full-view");
        var fsExitDocButton = document.getElementById("full-view-exit");

        fsDocButton.addEventListener("click", function (e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $("body").addClass("expanded");
        });

        fsExitDocButton.addEventListener("click", function (e) {
            e.preventDefault();
            exitFullscreen();
            $("body").removeClass("expanded");
        });
    }
    var today = new Date().toISOString().split("T")[0];
    document.getElementsByName("tglmulai")[0].setAttribute("min", today);
    document.getElementsByName("tglakhir")[0].setAttribute("min", today);
})(jQuery);

function prntCheck(that) {
    if (that.value == "yes") {
        document.getElementById("ftkp").style.display = "block";
    } else {
        document.getElementById("ftkp").style.display = "none";
    }
}

function mdlCheck(that) {
    if (that.value == "yes") {
        document.getElementById("modul").style.display = "block";
    } else {
        document.getElementById("modul").style.display = "none";
    }
}

//totalpanitia
$(".form-group").on("input", ".pnt", function () {
    var total = 0;
    $(".form-group .pnt").each(function () {
        var inputVal = $(this).val();
        if ($.isNumeric(inputVal)) {
            total += parseFloat(inputVal);
        }
    });
    document.getElementById("result").value = total;
});

//totalorang
$(".form-group").on("input", ".ttl", function () {
    var total = 0;
    $(".form-group .ttl").each(function () {
        var inputVal = $(this).val();
        if ($.isNumeric(inputVal)) {
            total += parseFloat(inputVal);
        }
    });
    document.getElementById("ttlorg").value = total;
    document.getElementById("ttlapd").value = total;
    document.getElementById("ttlperlengkapan").value = total;
    document.getElementById("ttlkonsumsi").value = total;
});

//totalorang
$(".form-group").on("input", ".srt", function () {
    var total = 0;
    $(".form-group .srt").each(function () {
        var inputVal = $(this).val();
        if ($.isNumeric(inputVal)) {
            total += parseFloat(inputVal);
        }
    });
    document.getElementById("sertifikat").value = total;
});

$(document).ready(function () {
    $("#alert").hide();
    $("#myWish").click(function showAlert() {
        $("#alert")
            .fadeTo(2000, 500)
            .slideUp(500, function () {
                $("#alert").slideUp(500);
            });
    });
});

function penceramah() {
    var jumlah = document.getElementById("jmlhpncrmh").value;
    var input = document.getElementById("penceramah");
    var output = "";

    for (var i = 1; i <= jumlah; i++) {
        output +=
            "<input type='text' class='form-control border border-dark mb-1' style='color:black;' name='namapenceramah[]' placeholder= 'Masukkan Nama & Jabatan Penceramah'>";
    }
    input.innerHTML = output;
}

function pengajar() {
    var jumlah = document.getElementById("jmlhpngjr").value;
    var input = document.getElementById("pengajar");
    var output = "";

    for (var i = 1; i <= jumlah; i++) {
        output +=
            "<input type='text' class='form-control border border-dark mb-1' style='color:black;' name='namapengajar[]' placeholder= 'Masukkan Nama & Jabatan Pengajar'>";
    }
    input.innerHTML = output;
}

function penerjemah() {
    var jumlah = document.getElementById("jmlhpnrjmh").value;
    var input = document.getElementById("penerjemah");
    var output = "";

    for (var i = 1; i <= jumlah; i++) {
        output +=
            "<input type='text' class='form-control border border-dark mb-1' style='color:black;' name='namapenerjemah[]' placeholder= 'Masukkan Nama & Jabatan Penerjemah'>";
    }
    input.innerHTML = output;
}

//fungsi jumlah hari form kegiatan
function totalday() {
    var date1 = document.getElementById("waktumulai").value;
    var date2 = document.getElementById("waktuselesai").value;

    var tglmulai = new Date(date1);
    var tglselesai = new Date(date2);

    return parseInt((tglselesai - tglmulai) / (24 * 3600 * 1000) + 1);
}

//fungsi table looping
function cal() {
    var outputHTML = "";
    var outputHTML2 = "";
    var nilai = totalday();
    var tglmulai = new Date(document.getElementById("waktumulai").value);

    for (var s = 1; s <= nilai; s++) {
        var hari = tglmulai.getDay();
        var tanggal = tglmulai.getDate();
        var bulan = tglmulai.getMonth();
        var tahun = tglmulai.getFullYear();

        switch (hari) {
            case 0:
                hari = "Minggu";
                break;
            case 1:
                hari = "Senin";
                break;
            case 2:
                hari = "Selasa";
                break;
            case 3:
                hari = "Rabu";
                break;
            case 4:
                hari = "Kamis";
                break;
            case 5:
                hari = "Jum'at";
                break;
            case 6:
                hari = "Sabtu";
                break;
        }

        switch (bulan) {
            case 0:
                bulan = "Januari";
                break;
            case 1:
                bulan = "Februari";
                break;
            case 2:
                bulan = "Maret";
                break;
            case 3:
                bulan = "April";
                break;
            case 4:
                bulan = "Mei";
                break;
            case 5:
                bulan = "Juni";
                break;
            case 6:
                bulan = "Juli";
                break;
            case 7:
                bulan = "Agustus";
                break;
            case 8:
                bulan = "September";
                break;
            case 9:
                bulan = "Oktober";
                break;
            case 10:
                bulan = "November";
                break;
            case 11:
                bulan = "Desember";
                break;
        }

        var tanggal = hari + ", " + tanggal + " " + bulan + " " + tahun;

        outputHTML +=
            "<tr><td>" +
            s +
            "</td><td>" +
            tanggal +
            "<input type='hidden' name='matrix_tanggal[]' value='" +
            tanggal +
            "'>" +
            "</td><td><input type='time' class='form-control border border-dark' style='color:black;' name='matrix_waktumulai[]'>" +
            "</td><td><input type='time' class='form-control border border-dark' style='color:black;' name='matrix_waktuselesai[]'>" +
            "</td><td><input type='text' class='form-control border border-dark' style='color:black;' name='matrix_agenda[]'>" +
            "</td><td><input type='text' class='form-control border border-dark' style='color:black;' name='matrix_pic[]'>" +
            "</td><td><input type='text' class='form-control border border-dark' style='color:black;' name='matrix_jamperjp[]'>" +
            "</td><td><input type='text' class='form-control border border-dark' style='color:black;' name='matrix_lokasi[]'>" +
            "</td></tr>";
        outputHTML2 +=
            "<div class='row col-sm-12 pt-1'><p class='col-sm-4'>&nbsp;&nbsp;</p><div class='row col-sm-8'><div class='col-sm-2 pt-1'>" +
            tanggal +
            "</div><input type=time>&nbsp;-&nbsp;<input type=time></div></div>";
        tglmulai.setDate(tglmulai.getDate() + 1);
    }
    document.getElementById("jp").innerHTML = outputHTML2;
    document.getElementById("looping").innerHTML = outputHTML;
}

//fungsi jumlah hari form

//fungsi fullday fullmeeting
function check(val) {
    if (val == 1) {
        document.getElementById("fullboardstyle").style.display = "none";
    }
    if (val == 2) {
        document.getElementById("fullboardstyle").style.display = "";
    }
}
