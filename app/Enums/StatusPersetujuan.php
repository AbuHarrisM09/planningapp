<?php

namespace App\Enums;

enum StatusPersetujuan: string
{
    case Menunggu = 'menunggu';
    case Diterima = 'diterima';
    case Ditolak  = 'ditolak';
}
