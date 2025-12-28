<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Login
$route['default_controller'] = 'Clogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['log-out'] = 'Clogin/logout';
$route['log-in'] = 'Clogin';
$route['admin'] = 'Cmaster';
$route['user'] = 'Cuser';
$route['members'] = 'Cmembers';

// Halaman Utama
$route['halaman_utama'] = 'Cmaster/menu_halaman_utama';


// Dewan Pengasuh
$route['dewan_pengasuh'] = 'Cdewan/dewan_pengasuh';
$route['export_dewan_pengasuh'] = 'Cdewan/export_excel';
$route['tambah_dewan_pengasuh'] = 'Cdewan/menu_tambah_dewan_pengasuh';
$route['simpan_dewan_pengasuh'] = 'Cdewan/simpan_dewan_pengasuh';

// Santri
$route['santri'] = 'Cperson/menu_santri';

// Pengurus
$route['pengurus'] = 'Cpengurus/pengurus';

// Pengajar
$route['pengajar'] = 'Cpengajar/pengajar';

// Karyawan
$route['karyawan'] = 'Ckaryawan/karyawan';

// Alumni
$route['alumni'] = 'Calumni/alumni';

// Wilayah
$route['wilayah'] = 'Cwilayah/menu_wilayah';

// Jabatan
$route['jabatan'] = 'Cjabatan/menu_jabatan';
// Block
$route['block'] = 'Cblok/menu_blok';

// Kamar
$route['kamar'] = 'Ckamar/menu_kamar';

// History Kamar
$route['history'] = 'Chistory/menu_history';

// Lembaga
$route['lembaga'] = 'Clembaga/menu_lembaga';

// Koordinator
$route['koordinator'] = 'Ckoordinator/menu_koordinator';

// approv
$route['terima'] = 'Cterima/menu_terima_santri';

// santri Perkamar
$route['laporan'] = 'Claporan/laporan';
