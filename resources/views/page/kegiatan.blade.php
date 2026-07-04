@extends('index')
@section('title','Rencana Kegiatan - ActPlan')

@section('content')
<div class="container px-6 mx-auto grid" style="padding-top: 10px;">
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border-2">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-ui-checks" viewBox="0 0 16 16">
                    <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708l-2 2zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708l-2 2zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Total Rencana Kegiatan : {{$totalkegiatan}} Rencana
                </p>
                <p>
                <table class="w-full whitespace-no-wrap">
                    <tr class="text-sm font-semibold">
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu: {{$kegiatanmenunggu}}
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Diterima: {{$kegiatanditerima}}
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Ditolak: {{$kegiatanditolak}}
                            </span>
                        </td>
                    </tr>
                </table>
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="px-4 my-4">
                <a href="/tambah-kegiatan" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium duration-150 bg-green-700 dark:bg-green-700 text-white rounded-lg hover:bg-green-100 hover:text-gray-800">
                    <span class="mr-2" aria-hidden="true">+</span>
                    Tambah Rencana Kegiatan
                </a>
            </div>
        </div>
    </div>
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs pb-16">
        <div class="w-full overflow-x-auto border-2 rounded-lg">
            <h3 class="my-6 text-center text-xl font-semibold text-gray-700 dark:text-gray-200">
                Tabel Rencana Kegiatan
            </h3>
            <table class="w-full whitespace-no-wrap text-center">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">NO</th>
                        <th class="px-4 py-3">Nama Kegiatan</th>
                        <th class="px-4 py-3">Diajukan oleh</th>
                        <th class="px-4 py-3">Tanggal Pengajuan</th>
                        <th class="px-4 py-3">Status Validasi</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($kegiatan as $index=>$keg)
                    <tr class="text-gray-700 dark:text-gray-400 text-sm">
                        <td class="px-4 py-3">{{ $index + $kegiatan->firstItem() }}</td>
                        <td class="px-4 py-3">{{$keg->namakegiatan}}</td>
                        <td class="px-4 py-3">Pak Agus Suratna</td>
                        <td class="px-4 py-3">{{$keg->created_at}}</td>
                        <td class="px-4 py-3">
                            @if($keg->status=='menunggu')
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu
                            </span>
                            @elseif($keg->status=='diterima')
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Diterima
                            </span>
                            @else
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Ditolak
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <a href="/detail-rencana-kegiatan/{{$keg->idkegiatan}}" class="text-purple-600"><u>Detail</u></a> <br>
                            <a target="_blank" href="/cetak-kegiatan/{{$keg->idkegiatan}}"><u>Cetak</u></a> |
                            <a href="/unduh-kegiatan/{{$keg->idkegiatan}}" class="text-indigo-600"><u>Unduh PDF</u></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
