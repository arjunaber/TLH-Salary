@php
    use App\Support\Periode as P;
    $rp = fn($n) => number_format($n, 0, ',', '.');
    $set = $dipilih->mapWithKeys(fn($d) => [$d->format('Y-m-d') => 1]);
    $ttd = $cfg['kota'] . ', ' . P::tanggal($p->akhir);
    $per =
        $p->awal->day .
        ' ' .
        P::BULAN[$p->awal->month] .
        ' - ' .
        $p->akhir->day .
        ' ' .
        P::BULAN[$p->akhir->month] .
        ' ' .
        $p->akhir->year;
    $info = [
        'Nama TLH' => $cfg['nama'],
        'Kategori TLH' => $cfg['kategori'],
        'Tanggal Mulai Bekerja' => $cfg['mulai'],
        'Unit / Bagian' => $cfg['unit'],
        'Direktorat/Fakultas' => $cfg['direktorat'],
        'Periode Laporan' => $per,
    ];
@endphp
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Pengajuan TLH {{ $per }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 15mm 16mm
        }

        @page honor {
            size: A4 landscape;
            margin: 16mm 20mm
        }

        * {
            box-sizing: border-box
        }

        body {
            font: 10.5pt/1.4 Arial, Helvetica, sans-serif;
            margin: 0;
            color: #000
        }

        .pg {
            page-break-after: always
        }

        .pg:last-of-type {
            page-break-after: auto
        }

        .honor {
            page: honor
        }

        .jdl {
            text-align: center;
            font-weight: 700;
            font-size: 12.5pt;
            line-height: 1.35;
            padding-bottom: 8px;
            border-bottom: 2px solid #000;
            margin-bottom: 12px
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed
        }

        td,
        th {
            border: 1px solid #000;
            padding: 5px 7px;
            vertical-align: middle;
            word-wrap: break-word
        }

        th {
            background: #ececec;
            font-size: 9.5pt;
            text-align: center
        }

        thead {
            display: table-header-group
        }

        tr {
            page-break-inside: avoid
        }

        .c {
            text-align: center
        }

        .r {
            text-align: right
        }

        table.info {
            width: auto;
            table-layout: auto;
            margin-bottom: 14px
        }

        .info td {
            border: 0;
            padding: 1.5px 0;
            vertical-align: top
        }

        .info td:first-child {
            width: 46mm
        }

        .info td:nth-child(2) {
            width: 5mm
        }

        .task td {
            height: 9.5mm
        }

        .task td.t {
            text-align: left
        }

        .tgl {
            font-size: 9pt;
            font-weight: 700;
            background: #f6f6f6;
            height: 7mm
        }

        .pr td.n {
            font-weight: 700;
            text-align: left
        }

        .pr .isi {
            height: 13mm
        }

        .off {
            background: repeating-linear-gradient(135deg, #fff 0 3px, #bdbdbd 3px 3.6px)
        }

        .x {
            background: #dcdcdc
        }

        .tot td {
            background: #ececec;
            font-weight: 700
        }

        .ket {
            font-size: 9pt;
            margin-top: 8px
        }

        .ket i {
            display: inline-block;
            width: 12px;
            height: 12px;
            vertical-align: -2px;
            border: 1px solid #000;
            margin-right: 4px
        }

        .ttd {
            width: 72mm;
            margin: 22px 0 0 auto;
            page-break-inside: avoid;
            line-height: 1.35
        }

        .ttd .sp,
        .dua .sp {
            height: 20mm
        }

        .dua {
            display: flex;
            justify-content: space-between;
            margin-top: 22px;
            page-break-inside: avoid
        }

        .dua>div {
            width: 78mm
        }

        .bar {
            position: fixed;
            top: 10px;
            right: 10px
        }

        .bar button {
            padding: 8px 14px;
            font: inherit
        }

        @media print {
            .bar {
                display: none
            }

            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact
            }
        }
    </style>
</head>

<body>
    <div class="bar"><button onclick="print()">Cetak</button></div>

    <section class="pg">
        <div class="jdl">FORM TASK LIST TENAGA LEPAS HARIAN (TLH)<br>TELKOM UNIVERSITY</div>
        <table class="info">
            @foreach ($info as $k => $v)
                <tr>
                    <td>{{ $k }}</td>
                    <td>:</td>
                    <td>{{ $v }}</td>
                </tr>
            @endforeach
        </table>
        <table class="task">
            <colgroup>
                <col style="width:11mm">
                <col style="width:36mm">
                <col>
                <col style="width:28mm">
                <col style="width:24mm">
            </colgroup>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>HARI, TANGGAL</th>
                    <th>TASK DESCRIPTION</th>
                    <th>EVALUASI MINGGUAN</th>
                    <th>PARAF ATASAN</th>
                </tr>
            </thead>
            @foreach ($dipilih as $i => $d)
                <tr>
                    <td class="c">{{ $i + 1 }}</td>
                    <td>{{ P::label($d) }}</td>
                    <td class="t">{{ $task[$d->format('Y-m-d')] ?? '' }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </table>
        <div class="ttd">{{ $ttd }}<br>Mengetahui,<div class="sp"></div>
            <b>{{ $cfg['atasan'] }}</b><br>{{ $cfg['jabatan'] }}</div>
    </section>

    <section class="pg">
        <div class="jdl">DAFTAR HADIR TENAGA MAGANG (TLH)</div>
        <table class="info">
            <tr>
                <td>UNIT</td>
                <td>:</td>
                <td>{{ $cfg['unit_presensi'] }}</td>
            </tr>
            <tr>
                <td>PERIODE</td>
                <td>:</td>
                <td>{{ $per }}</td>
            </tr>
        </table>
        <table class="pr">
            <colgroup>
                <col style="width:34mm">
                <col span="7">
                <col style="width:20mm">
            </colgroup>
            <thead>
                <tr>
                    <th rowspan="2">NAMA</th>
                    <th colspan="7">TANGGAL DAN PARAF</th>
                    <th rowspan="2">JUMLAH HARI</th>
                </tr>
                <tr>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $h)
                        <th>{{ $h }}</th>
                    @endforeach
                </tr>
            </thead>
            @foreach ($p->minggu() as $w)
                <tr>
                    <td class="n" rowspan="2">{{ $cfg['nama'] }}</td>
                    @foreach ($w as $d)
                        <td class="c tgl {{ $p->dalam($d) ? '' : 'x' }}">{{ $p->dalam($d) ? $d->day : '' }}</td>
                    @endforeach
                    <td class="c" rowspan="2">
                        <b>{{ collect($w)->filter(fn($d) => isset($set[$d->format('Y-m-d')]))->count() }}</b></td>
                </tr>
                <tr>
                    @foreach ($w as $d)
                        <td class="isi {{ !$p->dalam($d) ? 'x' : (isset($set[$d->format('Y-m-d')]) ? '' : 'off') }}"></td>
                    @endforeach
                </tr>
            @endforeach
            <tr class="tot">
                <td colspan="8" class="c">Total Hari</td>
                <td class="c">{{ $jml }}</td>
            </tr>
        </table>
        <p class="ket"><i class="off"></i>Arsir = tidak masuk, tidak perlu paraf.</p>
    </section>

    <section class="pg honor">
        <div class="jdl">HONOR TENAGA MAGANG (TLH)<br>UNIT {{ $cfg['unit_honor'] }}<br>PERIODE {{ $per }}
        </div>
        <table>
            <colgroup>
                <col style="width:10mm">
                <col style="width:52mm">
                <col style="width:26mm">
                <col style="width:28mm">
                <col style="width:22mm">
                <col style="width:36mm">
                <col style="width:36mm">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>BULAN</th>
                    <th>TARIF</th>
                    <th>JUMLAH HARI</th>
                    <th>JUMLAH DITERIMA</th>
                    <th>TANDA TANGAN</th>
                    <th>REKENING</th>
                </tr>
            </thead>
            <tr>
                <td class="c">1</td>
                <td>{{ $cfg['nama'] }}</td>
                <td class="c">{{ P::BULAN[$p->akhir->month] }}</td>
                <td class="r">Rp {{ $rp($cfg['tarif']) }}</td>
                <td class="c">{{ $jml }}</td>
                <td class="r">Rp {{ $rp($total) }}</td>
                <td style="height:22mm"></td>
                <td style="font-size:9.5pt">Transfer ke rekening:<br><b>{{ $cfg['rekening'] }}</b>
                    {{ $cfg['bank'] }}<br>an. {{ $cfg['atas_nama'] }}</td>
            </tr>
            <tr class="tot">
                <td colspan="5" class="c">TOTAL</td>
                <td class="r">Rp {{ $rp($total) }}</td>
                <td colspan="2"></td>
            </tr>
        </table>
        <div class="ttd" style="margin-top:18px">{{ $ttd }}</div>
        <div class="dua" style="margin-top:6px">
            <div>Mengetahui<div class="sp"></div><b>{{ $cfg['atasan'] }}</b><br>{{ $cfg['jabatan'] }}</div>
            <div>Yang Mempertanggungkan<div class="sp"></div><b>{{ $cfg['nama'] }}</b></div>
        </div>
    </section>
    <script>
        addEventListener('load', () => setTimeout(print, 300))
    </script>
</body>

</html>
