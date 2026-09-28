<?php

namespace App\Http\Controllers;

use App\Support\Periode;
use Carbon\CarbonImmutable as C;
use Illuminate\Http\Request;

class GajiController extends Controller
{
  public function index(Request $r)
  {
    $now = C::now();
    $bulan = $r->query('bulan', ($now->day > 18 ? $now->addMonthNoOverflow() : $now)->format('Y-m'));
    abort_unless(preg_match('/^\d{4}-\d{2}$/', $bulan), 404);
    return view('index', ['p' => new Periode($bulan), 'bulan' => $bulan, 'cfg' => config('tlh')]);
  }
  public function cetak(Request $r)
  {
    $v = $r->validate([
      'bulan' => 'required|date_format:Y-m',
      'tgl' => 'required|array|min:1',
      'tgl.*' => 'date_format:Y-m-d',
      'task' => 'nullable|array',
      'task.*' => 'nullable|string|max:300',
      'nama' => 'required|string|max:100',
      'tarif' => 'required|integer|min:0',
      'rekening' => 'nullable|string|max:40',
      'atas_nama' => 'nullable|string|max:100',
      'bank' => 'nullable|string|max:40',
      'atasan' => 'nullable|string|max:100',
      'jabatan' => 'nullable|string|max:100',
      'kota' => 'nullable|string|max:60',
      'tgl_ttd' => 'nullable|date_format:Y-m-d'
    ]);
    $p = new Periode($v['bulan']);
    $dipilih = collect($v['tgl'])->unique()->map(fn($d) => C::parse($d))->filter(fn($d) => $p->dalam($d))
      ->sortBy(fn($d) => $d->timestamp)->values();
    $isi = array_filter(collect($v)->only(['rekening', 'atas_nama', 'bank', 'atasan', 'jabatan', 'kota'])->all(), 'filled');
    $cfg = array_merge(config('tlh'), ['nama' => $v['nama'], 'tarif' => (int)$v['tarif']], $isi);
    $tglTtd = filled($v['tgl_ttd'] ?? null) ? C::parse($v['tgl_ttd']) : $p->akhir;
    return view('cetak', [
      'p' => $p,
      'cfg' => $cfg,
      'tglTtd' => $tglTtd,
      'dipilih' => $dipilih,
      'task' => $v['task'] ?? [],
      'jml' => $dipilih->count(),
      'total' => $dipilih->count() * $cfg['tarif']
    ]);
  }
}
