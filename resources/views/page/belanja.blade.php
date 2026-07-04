@extends('index')
@section('title','Rencana Belanja - ActPlan')

@section('content')
<div class="container px-6 mx-auto grid" style="padding-top: 10px;">
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border-2">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                    <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Total Rencana Belanja Barang : {{$totalbelanja}} Rencana
                </p>
                <p>
                <table class="w-full whitespace-no-wrap">
                    <tr class="text-sm font-semibold">
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu: {{$rencanabbmenunggu}}
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Diterima: {{$rencanabbditerima}}
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Ditolak: {{$rencanabbditolak}}
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
                <a href="/tambah-rencana-belanja" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium duration-150 bg-green-700 dark:bg-green-700 text-white rounded-lg hover:bg-green-100 hover:text-gray-800">
                    <span class="mr-2" aria-hidden="true">+</span>
                    Tambah Rencana Belanja
                </a>
            </div>
        </div>
    </div>
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs pb-16">
        <div class="w-full overflow-x-auto border-2 rounded-lg">
            <h3 class="my-6 text-center text-xl font-semibold text-gray-700 dark:text-gray-200">
                Tabel Rencana Belanja
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
                    @foreach($belanja as $index=>$bel)
                    <tr class="text-gray-700 dark:text-gray-400 text-sm">
                        <td class="px-4 py-3">{{ $index + $belanja->firstItem() }}</td>
                        <td class="px-4 py-3">{{$bel->namakegiatanbb}}</td>
                        <td class="px-4 py-3">Pak Agus Suratna</td>
                        <td class="px-4 py-3">{{$bel->created_at}}</td>
                        <td class="px-4 py-3">
                            @if($bel->status=='menunggu')
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu
                            </span>
                            @elseif($bel->status=='diterima')
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
                            <a href="/detail-rencana-belanja/{{$bel->idbelanjabarang}}" class="text-purple-600"><u>Detail</u></a> <br>
                            <a target="_blank" href="/cetak-rencana-belanja/{{$bel->idbelanjabarang}}"><u>Cetak</u></a> |
                            <a href="/unduh-rencana-belanja/{{$bel->idbelanjabarang}}" class="text-indigo-600"><u>Unduh PDF</u></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
