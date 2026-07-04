@extends('index')
@section('title','Dashboard - ActPlan')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Selamat Datang {{auth()->user()->namapegawai}}
    </h2>
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
                    Total Rencana Kegiatan
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
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border-2">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                    <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Total Rencana Belanja Barang
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
    </div>

    <!-- Charts Section -->
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Rencana Kegiatan Chart -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border-2">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300 text-center">
                Statistik Status Rencana Kegiatan
            </h4>
            <div class="relative h-64" style="height: 250px;">
                <canvas id="chartKegiatan" data-menunggu="{{$kegiatanmenunggu}}" data-diterima="{{$kegiatanditerima}}" data-ditolak="{{$kegiatanditolak}}"></canvas>
            </div>
        </div>

        <!-- Rencana Belanja Chart -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border-2">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300 text-center">
                Statistik Status Rencana Belanja
            </h4>
            <div class="relative h-64" style="height: 250px;">
                <canvas id="chartBelanja" data-menunggu="{{$rencanabbmenunggu}}" data-diterima="{{$rencanabbditerima}}" data-ditolak="{{$rencanabbditolak}}"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart Kegiatan
        var canvasKegiatan = document.getElementById('chartKegiatan');
        var kMenunggu = parseInt(canvasKegiatan.getAttribute('data-menunggu')) || 0;
        var kDiterima = parseInt(canvasKegiatan.getAttribute('data-diterima')) || 0;
        var kDitolak = parseInt(canvasKegiatan.getAttribute('data-ditolak')) || 0;

        var ctxKegiatan = canvasKegiatan.getContext('2d');
        var chartKegiatan = new Chart(ctxKegiatan, {
            type: 'pie',
            data: {
                labels: ['Menunggu', 'Diterima', 'Ditolak'],
                datasets: [{
                    data: [kMenunggu, kDiterima, kDitolak],
                    backgroundColor: ['#ff9800', '#2bc06c', '#f44336'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: '#718096',
                        fontSize: 12
                    }
                }
            }
        });

        // Chart Belanja
        var canvasBelanja = document.getElementById('chartBelanja');
        var bMenunggu = parseInt(canvasBelanja.getAttribute('data-menunggu')) || 0;
        var bDiterima = parseInt(canvasBelanja.getAttribute('data-diterima')) || 0;
        var bDitolak = parseInt(canvasBelanja.getAttribute('data-ditolak')) || 0;

        var ctxBelanja = canvasBelanja.getContext('2d');
        var chartBelanja = new Chart(ctxBelanja, {
            type: 'doughnut',
            data: {
                labels: ['Menunggu', 'Diterima', 'Ditolak'],
                datasets: [{
                    data: [bMenunggu, bDiterima, bDitolak],
                    backgroundColor: ['#ff9800', '#2bc06c', '#f44336'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: '#718096',
                        fontSize: 12
                    }
                }
            }
        });
    });
</script>
@endsection
