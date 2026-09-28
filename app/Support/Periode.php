<?php
namespace App\Support;
use Carbon\CarbonImmutable as C;

/** Periode laporan: tanggal 19 bulan lalu sampai 18 bulan yang dipilih. */
class Periode {
  const HARI=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  const BULAN=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  public C $awal; public C $akhir;
  public function __construct(string $bulan){
    $this->akhir=C::parse($bulan.'-18')->startOfDay();
    $this->awal=$this->akhir->subMonthNoOverflow()->day(19);
  }
  public function dalam(C $d): bool { return $d->between($this->awal,$this->akhir); }
  /** Minggu Senin–Minggu, termasuk hari di luar periode. */
  public function minggu(): array {
    $w=[]; for($d=$this->awal->startOfWeek(); $d<=$this->akhir; $d=$d->addWeek()){
      $w[]=array_map(fn($i)=>$d->addDays($i),range(0,6)); }
    return $w;
  }
  public static function tanggal(C $d): string { return $d->day.' '.self::BULAN[$d->month].' '.$d->year; }
  public static function label(C $d): string { return self::HARI[$d->dayOfWeek].' '.$d->format('j/m/Y'); }
  public function teks(): string {
    return $this->awal->day.' '.self::BULAN[$this->awal->month].' - '.self::tanggal($this->akhir);
  }
}
