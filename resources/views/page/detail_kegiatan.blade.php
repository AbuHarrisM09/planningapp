<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{asset('/images/lgoo.png')}}">
    <title>Detail Kegiatan</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body class="bg-primary">
    <div class="d-grid gap-2 d-md-flex m-3">
        <a href="/home" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin kembali?')">
            < Kembali</a>
    </div>
    <div class="container bg-white mb-5">
        <div class="container">
            <div class="single-table p-5">
                <div class="table-responsive">
                    <table class="table table-bordered border-dark table-hover progress-table text-center">
                        <thead>
                            <tr>
                                <td scope="col" style="width: 18%;"><img src="{{asset('images/logotutwuri.png')}}"></td>
                                <td scope="col" style="width: 82%;">
                                    <h4 style="font-family: Times New Roman;"><b>PUSAT PENGEMBANGAN DAN PEMBERDAYAAN</b></h4>
                                    <h4 style="font-family: Times New Roman;"><b>PENDIDIK DAN TENAGA KEPENDIDIKAN</b></h4>
                                    <h4 style="font-family: Times New Roman;"><b>TAMAN KANAK-KANAK DAN PENDIDIKAN LUAR BIASA</b></h4>
                                    <h5 style="font-family: Times New Roman;">Jl. Dr.Cipto No.9 Bandung,Telepon: (022) 4230068 – 4237041, Fax. (022) 4230068,</h5>
                                    <h5 style="font-family: Times New Roman;">Laman : http://p4tktkplb.kemdikbud.go.id email: p4tktkplb@kemdikbud.go.id</h5>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="container p-5 ml-5 mr-5" style="font-size: 17px; font-family: Times New Roman;">
                <div class="table-responsive">
                    <table class="table">
                        @foreach ($kegiatan as $keg)
                        <tr>
                            <td scope="col" style="width: 30%;">Jenis Program</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->jenis->jenisprogram}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">Jenis Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->nondiklat->namadiklat}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">Pembiayaan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">
                                @foreach($pembiayaan as $p)
                                    {{$p->pembiayaan->jenispembiayaan}}
                                    @if( !$loop->last), @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">Moda Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->modakegiatan->jenismodakegiatan}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">1. Nama Program/Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->namakegiatan}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">2. Lembaga Penyelenggara</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->lembagapenyelenggara}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">3. Lembaga Mitra Penyelenggara</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->lembagamitra}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">4. Lokasi Program/Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->lokasikegiatan}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">5. Waktu Program/Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{ date('d F Y', strtotime($keg->tglmulai)) }} - {{ date('d F Y', strtotime($keg->tglakhir)) }}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">6. Jumlah orang terlibat</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">
                                Narasumber Eselon / Penceramah : {{$keg->jmlpenceramah}} orang<br>
                                Narasumber / Pengajar : {{$keg->jmlpengajar}} orang<br>
                                Peserta : {{$keg->jmlpeserta}} orang<br>
                                Panitia : {{$keg->jmlpanitia}} orang<br>
                                Notulen : {{$keg->jmlnotulen}} orang<br>
                                Moderator / Host : {{$keg->jmlmoderator}} orang<br>
                                Penerjemah / Juru Bahasa Isyarat : {{$keg->jmlpenerjemah}} orang<br>
                                Total : {{$keg->totalpanitia}} orang<br>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">7. Susunan Panitia</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">
                                Pengarah : {{$keg->jmlpengarah}} orang<br>
                                Penanggungjawab : {{$keg->jmlpenanggungjawab}} orang<br>
                                Ketua : {{$keg->jmlketua}} orang<br>
                                Anggota Penjab Akademik : {{$keg->jmlanggotapenjabakademik}} orang<br>
                                Anggotapanitiakelas : {{$keg->jmlanggotapanitiakelas}} orang<br>
                                Admin Digital : {{$keg->jmladmindigital}} orang<br>
                                Petugas Keuangan : {{$keg->jmlpetugaskeuangan}} orang<br>
                                Notulen : {{$keg->jmlnotulen}} orang<br>
                                Moderator / Host : {{$keg->jmlmoderator}} orang<br>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">8. Jumlah dan Nama Narasumber Es.</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">
                                {{$keg->jmlpenceramah}} orang,<br>
                                @foreach($penceramah as $p)
                                {{$p->namapenceramah}}<br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">9. Jumlah dan Nama Narasumber / Pengajar</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">
                                {{$keg->jmlpengajar}} orang,<br>
                                @foreach($pengajar as $p)
                                {{$p->namapengajar}}<br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">10. Jumlah dan Nama Narasumber / Juru Bahasa Isyarat</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">
                                {{$keg->jmlpenerjemah}} orang,<br>
                                @foreach($penerjemah as $p)
                                {{$p->namapenerjemah}}<br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">11. Jumlah Jam Kegiatan / Jam Pelajaran</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->jmljamkegiatan}} JP; 1 JP - {{$keg->waktuperjp}} Menit</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">12. Sarana Prasarana Pendukung</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">
                                ATK Panitia : {{$keg->jmlatkpanitia}} paket kegiatan<br>
                                ATK Kegiatan : {{$keg->jmlatkkegiatan}} kelas<br>
                                Jumlah APD Orang Terlibat : {{$keg->jmlhapd}} pax (@foreach($apd as $apd) {{$apd->apd->namaapd}} @if( !$loop->last), @endif @endforeach) <br>
                                Jumlah Perlengkapan Orang Terlibat : {{$keg->jmlperlengkapan}} pax (@foreach($perlengkapan as $per) {{$per->perlengkapan->namaperlengkapan}} @if( !$loop->last), @endif @endforeach) <br>
                                Jumlah dan Rincian Konsumsi : {{$keg->jmlkonsumsi}} pax (@foreach($konsumsi as $kon) {{$kon->konsumsi->namakonsumsi}} @if( !$loop->last), @endif @endforeach) <br>
                                Sertifikat : {{$keg->jmlsertifikat}} Orang<br>
                                Spanduk/Backdrop : {{$keg->jmlspanduk}} Unit<br>
                                Fotokopi Bahan : {{$keg->jmlfotocopybahan}} <br>
                                Modul/UP : {{$keg->jmlmodul}} <br>
                                Pengiriman Modul/UP : {{$keg->pengirimanmodul}} <br>
                                Kendaraan : Kapasitas {{$keg->jmlkendaraan}} Orang<br>
                                Aula : Kapasitas {{$keg->jmlaula}} Orang<br>
                                Ruang Kelas : Kapasitas {{$keg->jmlruangkelas}} Orang<br>
                                Penginapan : Fullboard Meeting : {{$keg->jmlorangfullboard}} Orang, {{$keg->jmlkamarfullboard}} Kamar<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Room + Breakfast : {{$keg->jmlorangfullboard}} Orang, {{$keg->jmlkamarfullboard}} Kamar<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                1 Kamar : {{$keg->jmlorangperkamar}} Orang<br>
                                Fullday Meeting : {{$keg->jmlorangfullday}} Orang <br>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">13. Deskripsi Program/Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->deskripsikegiatan}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">14. Tujuan Program/Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->tujuankegiatan}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">15. Jadwal Program/Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">Format Matrix dibawah</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">16. Persyaratan Peserta :</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->persyaratanpeserta}}</td>
                        </tr>
                        <tr>
                            <td scope="col" style="width: 30%;">17. Informasi Tahapan Program/Kegiatan</td>
                            <td scope="col" style="width: 5%;">:</td>
                            <td scope="col" style="width: 65%;">{{$keg->informasitahapankegiatan}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center my-3">
                    {{ session('success') }}
                </div>
            @endif

            @foreach ($kegiatan as $keg)
            <div class="card p-3 my-3 text-center border-0 bg-light">
                <h5>Status Validasi Saat Ini:
                    @if($keg->status == 'menunggu')
                        <span class="badge badge-warning text-dark p-2">Menunggu</span>
                    @elseif($keg->status == 'diterima')
                        <span class="badge badge-success p-2">Diterima</span>
                    @else
                        <span class="badge badge-danger p-2">Ditolak</span>
                    @endif
                </h5>
            </div>

            @if(auth()->check() && auth()->user()->level === 1)
                <div class="d-flex justify-content-center gap-3">
                    <form action="/detail-rencana-kegiatan/{{$keg->idkegiatan}}/status" method="POST" class="mx-2 d-inline-block">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit" class="btn btn-rounded btn-danger mb-3" onclick="return confirm('Apakah Anda yakin ingin menolak rencana kegiatan ini?')">
                            <i class="fa fa-times"></i> Tolak Kegiatan
                        </button>
                    </form>
                    <form action="/detail-rencana-kegiatan/{{$keg->idkegiatan}}/status" method="POST" class="mx-2 d-inline-block">
                        @csrf
                        <input type="hidden" name="status" value="diterima">
                        <button type="submit" class="btn btn-rounded btn-success mb-3" onclick="return confirm('Apakah Anda yakin ingin menyetujui rencana kegiatan ini?')">
                            <i class="fa fa-check"></i> ACC Kegiatan
                        </button>
                    </form>
                </div>
            @endif
            @endforeach
        </div>

    </div>

    <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

</body>

</html>
