<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    use HasFactory;
    static $enumPosisi = ['gelandang', 'penyerang', 'sayap kanan', 'sayap kiri', 'back', 'penjaga gawang'];
    protected $table = 'pemain';
    protected $fillable = ['nama_pemain', 'no_punggung', 'posisi'];
}
