<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Form pencairan honor Tenaga Lepas Harian Telkom University.">
    <title>Form Pencairan Honor TLH | Telkom University</title>
    <style>
        :root {
            color-scheme: light;
            --accent: #b3262d;
            --accent-hover: #921f25;
            --accent-soft: #f8e9ea;
            --ink: #242428;
            --muted: #65666d;
            --line: #d9dbe0;
            --line-strong: #bfc2c9;
            --canvas: #f3f4f6;
            --surface: #fefefe;
            --surface-soft: #f7f7f8;
            --radius-panel: 12px;
            --radius-control: 8px;
        }

        * { box-sizing: border-box; }

        html { background: var(--canvas); }

        body {
            margin: 0;
            min-width: 320px;
            color: var(--ink);
            background: var(--canvas);
            font-family: Aptos, "Segoe UI", Arial, sans-serif;
            line-height: 1.45;
        }

        button,
        input { font: inherit; }

        button { cursor: pointer; }

        .site-header {
            border-bottom: 1px solid var(--line);
            background: var(--surface);
        }

        .header-inner,
        .page {
            width: min(1180px, calc(100% - 40px));
            margin-inline: auto;
        }

        .header-inner {
            min-height: 84px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
        }

        .brand-logo {
            display: block;
            width: 218px;
            height: auto;
        }

        .header-context {
            max-width: 470px;
            padding-left: 24px;
            border-left: 1px solid var(--line);
            text-align: right;
        }

        .header-context span,
        .header-context strong { display: block; }

        .header-context span {
            margin-bottom: 2px;
            color: var(--muted);
            font-size: 13px;
        }

        .header-context strong {
            font-size: 15px;
            font-weight: 650;
        }

        .page { padding-block: 34px 44px; }

        .page-heading {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            align-items: end;
            gap: 28px;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            max-width: 660px;
            margin: 0;
            font-size: clamp(28px, 4vw, 38px);
            line-height: 1.12;
            letter-spacing: -0.025em;
        }

        .page-heading p {
            max-width: 620px;
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 16px;
        }

        .period-block {
            min-width: 255px;
            padding: 14px 16px;
            border: 1px solid var(--line);
            border-radius: var(--radius-control);
            background: var(--surface);
        }

        .period-block > span {
            display: block;
            margin-bottom: 2px;
            color: var(--muted);
            font-size: 12px;
        }

        .period-block strong {
            display: block;
            font-size: 14px;
            font-variant-numeric: tabular-nums;
        }

        .form-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 348px;
            gap: 20px;
            align-items: start;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: var(--radius-panel);
            background: var(--surface);
        }

        .calendar-panel,
        .tasks-panel { padding: 24px; }

        .panel-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .panel-heading h2,
        .summary-panel h2 {
            margin: 0;
            font-size: 20px;
            line-height: 1.25;
            letter-spacing: -0.01em;
        }

        .panel-heading p,
        .summary-panel header p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .month-control,
        .field {
            display: grid;
            gap: 7px;
            color: #45464c;
            font-size: 13px;
            font-weight: 600;
        }

        .month-control { min-width: 168px; }

        input {
            width: 100%;
            min-height: 42px;
            border: 1px solid var(--line-strong);
            border-radius: var(--radius-control);
            padding: 9px 11px;
            color: var(--ink);
            background: #fdfdfd;
            outline: none;
        }

        input::placeholder { color: #74757c; }

        input:hover { border-color: #979aa3; }

        input:focus-visible,
        button:focus-visible,
        summary:focus-visible {
            outline: 3px solid rgba(179, 38, 45, 0.22);
            outline-offset: 2px;
            border-color: var(--accent);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            gap: 7px;
        }

        .weekday {
            padding: 3px 2px 7px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 650;
            text-align: center;
        }

        .weekday .short { display: none; }

        .date-tile,
        .date-gap {
            min-height: 62px;
            border-radius: var(--radius-control);
        }

        .date-tile {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-between;
            border: 1px solid var(--line);
            padding: 9px 10px;
            color: var(--ink);
            background: #fdfdfd;
            text-align: left;
        }

        .date-tile:hover {
            border-color: var(--accent);
            background: var(--accent-soft);
        }

        .date-tile:active,
        .action-button:active,
        .secondary-button:active { transform: translateY(1px); }

        .date-tile.weekend {
            color: #6d6e74;
            background: var(--surface-soft);
        }

        .date-tile.selected {
            border-color: var(--accent);
            color: #fefefe;
            background: var(--accent);
        }

        .date-tile.selected small { color: #fbecee; }

        .date-number {
            font-size: 17px;
            font-weight: 700;
            font-variant-numeric: tabular-nums;
        }

        .date-tile small {
            min-height: 15px;
            color: var(--muted);
            font-size: 11px;
        }

        .calendar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 18px;
        }

        .secondary-button {
            min-height: 38px;
            border: 1px solid var(--line-strong);
            border-radius: var(--radius-control);
            padding: 7px 12px;
            color: var(--ink);
            background: var(--surface);
            font-size: 13px;
            font-weight: 650;
        }

        .secondary-button:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .calendar-help {
            margin: 0 0 0 auto;
            color: var(--muted);
            font-size: 12px;
            text-align: right;
        }

        .summary-panel {
            position: sticky;
            top: 20px;
            overflow: hidden;
        }

        .summary-panel header {
            padding: 22px 22px 18px;
            border-bottom: 1px solid var(--line);
        }

        .summary-metrics {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--surface-soft);
            border-bottom: 1px solid var(--line);
        }

        .metric {
            min-width: 0;
            padding: 17px 20px;
        }

        .metric + .metric { border-left: 1px solid var(--line); }

        .metric span,
        .metric strong { display: block; }

        .metric span {
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 12px;
        }

        .metric strong {
            overflow-wrap: anywhere;
            font-size: 19px;
            line-height: 1.2;
            font-variant-numeric: tabular-nums;
        }

        .summary-fields {
            display: grid;
            gap: 15px;
            padding: 20px 22px 22px;
        }

        details {
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            padding-block: 4px;
        }

        summary {
            padding: 10px 0;
            color: var(--ink);
            font-size: 13px;
            font-weight: 650;
            cursor: pointer;
        }

        .details-fields {
            display: grid;
            gap: 14px;
            padding: 6px 0 16px;
        }

        .action-button {
            width: 100%;
            min-height: 46px;
            border: 1px solid var(--accent);
            border-radius: var(--radius-control);
            padding: 10px 16px;
            color: #fefefe;
            background: var(--accent);
            font-weight: 700;
        }

        .action-button:hover:not(:disabled) {
            border-color: var(--accent-hover);
            background: var(--accent-hover);
        }

        .action-button:disabled {
            border-color: #c6c8cd;
            color: #777980;
            background: #e5e6e9;
            cursor: not-allowed;
        }

        .action-help {
            margin: -5px 0 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.5;
        }

        .tasks-panel { grid-column: 1 / -1; }

        .task-count {
            padding-top: 3px;
            color: var(--muted);
            font-size: 13px;
            font-variant-numeric: tabular-nums;
            white-space: nowrap;
        }

        .task-list { border-top: 1px solid var(--line); }

        .task-entry {
            display: grid;
            grid-template-columns: 32px 112px minmax(0, 1fr);
            align-items: center;
            gap: 12px;
            min-height: 63px;
            border-bottom: 1px solid var(--line);
        }

        .task-entry b {
            color: var(--muted);
            font-size: 12px;
            font-weight: 650;
            text-align: center;
            font-variant-numeric: tabular-nums;
        }

        .task-date {
            font-size: 13px;
            font-weight: 650;
            font-variant-numeric: tabular-nums;
        }

        .task-entry input {
            min-height: 40px;
            margin-block: 10px;
        }

        .task-empty { padding: 28px 4px 8px; }

        .task-empty strong,
        .task-empty span { display: block; }

        .task-empty strong {
            margin-bottom: 4px;
            font-size: 14px;
        }

        .task-empty span,
        .autosave-note {
            color: var(--muted);
            font-size: 13px;
        }

        .autosave-note {
            margin: 18px 2px 0;
            text-align: center;
        }

        @media (max-width: 900px) {
            .form-layout { grid-template-columns: 1fr; }
            .summary-panel { position: static; }
            .tasks-panel { grid-column: auto; }
        }

        @media (max-width: 680px) {
            .header-inner,
            .page { width: min(100% - 24px, 1180px); }

            .header-inner {
                min-height: 74px;
                gap: 14px;
            }

            .brand-logo { width: 160px; }
            .header-context { display: none; }
            .page { padding-block: 24px 32px; }

            .page-heading {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .period-block { min-width: 0; }

            .calendar-panel,
            .tasks-panel { padding: 16px; }

            .panel-heading {
                display: grid;
                gap: 14px;
            }

            .month-control { min-width: 0; }
            .calendar-grid { gap: 4px; }
            .weekday .long { display: none; }
            .weekday .short { display: inline; }

            .date-tile,
            .date-gap { min-height: 50px; }

            .date-tile { padding: 6px; }
            .date-number { font-size: 15px; }

            .calendar-actions {
                align-items: stretch;
                flex-wrap: wrap;
            }

            .calendar-help {
                flex-basis: 100%;
                margin-left: 0;
                text-align: left;
            }

            .task-entry {
                grid-template-columns: 26px minmax(0, 1fr);
                gap: 8px;
                padding-block: 10px;
            }

            .task-entry input {
                grid-column: 1 / -1;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <img class="brand-logo" src="{{ asset('images/telkom-university-logo.png') }}"
                alt="Telkom University" width="3347" height="1119">
            <div class="header-context">
                <span>{{ $cfg['direktorat'] }}</span>
                <strong>{{ $cfg['unit'] }}</strong>
            </div>
        </div>
    </header>

    <main class="page">
        <section class="page-heading" aria-labelledby="page-title">
            <div>
                <h1 id="page-title">Form Pencairan Honor TLH</h1>
                <p>Lengkapi kehadiran dan kegiatan harian untuk menyiapkan berkas pencairan honor.</p>
            </div>
            <div class="period-block" aria-label="Periode pengajuan">
                <span>Periode pengajuan</span>
                <strong>{{ $p->teks() }}</strong>
            </div>
        </section>

        <form id="attendance-form" method="post" action="/cetak" target="_blank">
            @csrf
            <input type="hidden" name="bulan" value="{{ $bulan }}">

            <div class="form-layout">
                <section class="panel calendar-panel" aria-labelledby="calendar-title">
                    <div class="panel-heading">
                        <div>
                            <h2 id="calendar-title">Kehadiran TLH</h2>
                            <p>Pilih tanggal kerja yang akan diajukan.</p>
                        </div>
                        <label class="month-control">
                            Bulan laporan
                            <input type="month" value="{{ $bulan }}" title="Periode berakhir tanggal 18 bulan ini"
                                onchange="if (this.value) location = '?bulan=' + this.value">
                        </label>
                    </div>

                    <div class="calendar-grid" role="grid" aria-label="Kalender kehadiran">
                        @foreach ([['Senin', 'Sen'], ['Selasa', 'Sel'], ['Rabu', 'Rab'], ['Kamis', 'Kam'], ['Jumat', 'Jum'], ['Sabtu', 'Sab'], ['Minggu', 'Min']] as [$hari, $singkat])
                            <div class="weekday" role="columnheader">
                                <span class="long">{{ $hari }}</span>
                                <span class="short">{{ $singkat }}</span>
                            </div>
                        @endforeach

                        @foreach ($p->minggu() as $w)
                            @foreach ($w as $d)
                                @if ($p->dalam($d))
                                    <button type="button" class="date-tile {{ $d->isWeekend() ? 'weekend' : '' }}"
                                        data-date="{{ $d->format('Y-m-d') }}"
                                        data-weekday="{{ $d->dayOfWeekIso }}"
                                        aria-label="{{ \App\Support\Periode::label($d) }}"
                                        aria-pressed="false" role="gridcell">
                                        <span class="date-number">{{ $d->day }}</span>
                                        <small>{{ $d->day === 1 || $d->eq($p->awal) ? \App\Support\Periode::BULAN[$d->month] : '' }}</small>
                                    </button>
                                @else
                                    <div class="date-gap" aria-hidden="true"></div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>

                    <div class="calendar-actions">
                        <button type="button" class="secondary-button" id="select-weekdays">Pilih Senin-Jumat</button>
                        <button type="button" class="secondary-button" id="clear-selection">Kosongkan pilihan</button>
                        <p class="calendar-help">Klik tanggal untuk memilih. Shift + klik untuk memilih rentang.</p>
                    </div>
                </section>

                <aside class="panel summary-panel" aria-labelledby="summary-title">
                    <header>
                        <h2 id="summary-title">Ringkasan pengajuan</h2>
                        <p>Nilai honor dihitung dari jumlah hari terpilih.</p>
                    </header>

                    <div class="summary-metrics">
                        <div class="metric">
                            <span>Hari kerja</span>
                            <strong><span id="selected-total" aria-live="polite">0</span> hari</strong>
                        </div>
                        <div class="metric">
                            <span>Estimasi honor</span>
                            <strong id="salary-total">Rp 0</strong>
                        </div>
                    </div>

                    <div class="summary-fields">
                        <label class="field">
                            Nama tenaga
                            <input name="nama" value="{{ $cfg['nama'] }}" required autocomplete="name">
                        </label>
                        <label class="field">
                            Tarif per hari (Rp)
                            <input name="tarif" type="number" min="0" value="{{ $cfg['tarif'] }}" required
                                inputmode="numeric">
                        </label>
                        <label class="field">
                            Nomor rekening
                            <input name="rekening" value="{{ $cfg['rekening'] }}" inputmode="numeric">
                        </label>

                        <details>
                            <summary>Data rekening dan tanda tangan</summary>
                            <div class="details-fields">
                                <label class="field">
                                    Nama pemilik rekening
                                    <input name="atas_nama" value="{{ $cfg['atas_nama'] }}">
                                </label>
                                <label class="field">
                                    Bank
                                    <input name="bank" value="{{ $cfg['bank'] }}">
                                </label>
                                <label class="field">
                                    Nama atasan
                                    <input name="atasan" value="{{ $cfg['atasan'] }}">
                                </label>
                                <label class="field">
                                    NIP atasan
                                    <input name="atasan_nip" value="{{ $cfg['atasan_nip'] }}">
                                </label>
                                <label class="field">
                                    Jabatan atasan
                                    <input name="jabatan" value="{{ $cfg['jabatan'] }}">
                                </label>
                                <label class="field">
                                    Penanggung jawab
                                    <input name="penanggung_jawab" value="{{ $cfg['penanggung_jawab'] }}">
                                </label>
                                <label class="field">
                                    NIP penanggung jawab
                                    <input name="penanggung_jawab_nip" value="{{ $cfg['penanggung_jawab_nip'] }}">
                                </label>
                                <label class="field">
                                    Kota
                                    <input name="kota" value="{{ $cfg['kota'] }}">
                                </label>
                                <label class="field">
                                    Tanggal tanda tangan
                                    <input type="date" name="tgl_ttd" value="{{ $p->akhir->format('Y-m-d') }}">
                                </label>
                            </div>
                        </details>

                        <button class="action-button" id="print-documents" type="submit" disabled>
                            Cetak formulir pencairan
                        </button>
                        <p class="action-help">Hasil cetak mencakup Task List, Daftar Hadir, dan Form Honor. Task List disusun dalam satu halaman A4.</p>
                    </div>
                </aside>

                <section class="panel tasks-panel" aria-labelledby="tasks-title">
                    <div class="panel-heading">
                        <div>
                            <h2 id="tasks-title">Kegiatan harian (Task List)</h2>
                            <p>Isian muncul sesuai tanggal kehadiran yang dipilih.</p>
                        </div>
                        <span class="task-count" id="task-count">0 tanggal dipilih</span>
                    </div>
                    <div class="task-list" id="task-rows"></div>
                </section>
            </div>
        </form>

        <p class="autosave-note">Isian disimpan otomatis di perangkat ini untuk setiap periode.</p>
    </main>

    <script>
        const form = document.getElementById('attendance-form');
        const tiles = Array.from(document.querySelectorAll('.date-tile'));
        const storageKey = 'tlh:{{ $bulan }}';
        const weekdays = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        const profileFields = [
            'nama', 'tarif', 'rekening', 'atas_nama', 'bank', 'atasan', 'atasan_nip',
            'jabatan', 'penanggung_jawab', 'penanggung_jawab_nip', 'kota'
        ];
        const taskRows = document.getElementById('task-rows');
        const selectedTotal = document.getElementById('selected-total');
        const salaryTotal = document.getElementById('salary-total');
        const taskCount = document.getElementById('task-count');
        const printButton = document.getElementById('print-documents');
        let selected = new Set();
        let tasks = {};
        let lastIndex = null;

        try {
            const saved = JSON.parse(localStorage.getItem(storageKey) || '{}');
            selected = new Set(saved.selected || saved.sel || []);
            tasks = saved.tasks || {};
            const profile = JSON.parse(localStorage.getItem('tlh:profile') || localStorage.getItem('tlh:p') || '{}');
            Object.keys(profile).forEach(function (key) {
                if (form.elements[key]) {
                    form.elements[key].value = profile[key];
                }
            });
        } catch (error) {
            selected = new Set();
            tasks = {};
        }

        const escapeAttribute = function (value) {
            return String(value).replace(/[&<>"']/g, function (character) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                }[character];
            });
        };
