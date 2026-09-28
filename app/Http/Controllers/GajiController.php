<?php
namespace App\Http\Controllers;
use App\Support\Periode;
use Carbon\CarbonImmutable as C;
use Illuminate\Http\Request;

class GajiController extends Controller {
  public function index(Request $r){
    $now=C::now();
    $bulan=$r->query('bulan',($now->day>18?$now->addMonthNoOverflow():$now)->format('Y-m'));
    abort_unless(preg_match('/^\d{4}-\d{2}$/',$bulan),404);
    return view('index',['p'=>new Periode($bulan),'bulan'=>$bulan,'cfg'=>config('tlh')]);
  }
  public function cetak(Request $r){
    $v=$r->validate(['bulan'=>'required|date_format:Y-m','tgl'=>'required|array|min:1','tgl.*'=>'date_format:Y-m-d',
      'task'=>'nullable|array','task.*'=>'nullable|string|max:300','nama'=>'required|string|max:100',
      'tarif'=>'required|integer|min:0','rekening'=>'nullable|string|max:40']);
    $p=new Periode($v['bulan']);
    $dipilih=collect($v['tgl'])->unique()->map(fn($d)=>C::parse($d))->filter(fn($d)=>$p->dalam($d))
      ->sortBy(fn($d)=>$d->timestamp)->values();
    $cfg=array_merge(config('tlh'),['nama'=>$v['nama'],'tarif'=>(int)$v['tarif'],'rekening'=>$v['rekening']?:config('tlh.rekening')]);
    return view('cetak',['p'=>$p,'cfg'=>$cfg,'dipilih'=>$dipilih,'task'=>$v['task']??[],
      'jml'=>$dipilih->count(),'total'=>$dipilih->count()*$cfg['tarif']]);
  }
}
