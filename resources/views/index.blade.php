<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hitung gaji TLH</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700;900&family=Instrument+Sans:wght@400;500;600&display=swap">
    <style>
        :root {
            --paper: #e4e7ec;
            --tile: #f4f6f9;
            --ink: #0e1116;
            --dim: #667080;
            --line: #c2c8d2;
            --cobalt: #2433ff;
            --cut: 12px
        }

        * {
            box-sizing: border-box;
            margin: 0
        }

        body {
            font: 15px/1.5 'Instrument Sans', system-ui, sans-serif;
            background: var(--paper);
            color: var(--ink);
            min-height: 100vh
        }

        h1,
        .num {
            font-family: 'Big Shoulders Display', 'Arial Narrow', sans-serif;
            font-weight: 900;
            line-height: .9
        }

        .wrap {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 340px;
            gap: 28px;
            max-width: 1180px;
            margin: 0 auto;
            padding: 32px 24px
        }

        .cal {
            grid-column: 1
        }

        .side {
            grid-column: 2;
            grid-row: 1/3;
            position: sticky;
            top: 24px;
            align-self: start
        }

        .bar {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 16px;
            margin-bottom: 18px;
            flex-wrap: wrap
        }

        h1 {
            font-size: 44px;
            letter-spacing: .01em
        }

        input {
            font: inherit;
            color: inherit
        }

        input[type=month] {
            background: var(--tile);
            border: 1px solid var(--line);
            padding: 8px 10px
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 6px
        }

        .dn {
            font-weight: 600;
            color: var(--dim);
            font-size: 13px;
            padding: 0 2px
        }

        .t,
        .g {
            aspect-ratio: 1/.86;
            min-height: 54px
        }

        .t {
            position: relative;
            border: 1px solid var(--line);
            background: var(--tile);
            cursor: pointer;
            text-align: left;
            padding: 6px 8px;
            font: inherit;
            clip-path: polygon(0 0, calc(100% - var(--cut)) 0, 100% var(--cut), 100% 100%, 0 100%);
            transition: background .12s, color .12s
        }

        .t.we {
            background: repeating-linear-gradient(135deg, var(--tile) 0 5px, #e8ebf0 5px 6px)
        }

        .t .num {
            font-size: 30px;
            display: block
        }

        .t small {
            color: var(--dim);
            font-size: 12px
        }

        .t:hover {
            border-color: var(--ink)
        }

        .t.on {
            background: var(--cobalt);
            border-color: var(--cobalt);
            color: #fff
        }

        .t.on small {
            color: #c9ceff
        }

        .t:focus-visible,
        button:focus-visible,
        input:focus-visible {
            outline: 2px solid var(--cobalt);
            outline-offset: 2px
        }

        .hint {
            color: var(--dim);
            font-size: 13px;
            margin-top: 12px
        }

        .q {
            display: flex;
            gap: 8px;
            margin-top: 14px
        }

        .q button {
            border: 1px solid var(--ink);
            background: none;
            padding: 7px 12px;
            font: inherit;
            cursor: pointer
        }

        .q button:hover {
            background: var(--ink);
            color: #fff
        }

        .panel {
            background: var(--ink);
            color: #fff;
            padding: 24px;
            clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 28px, 100% 100%, 0 100%)
        }

        .panel .num {
            font-size: 170px;
            letter-spacing: -.02em
        }

        .panel .u {
            font-size: 18px;
            color: #9aa4b4;
            margin: 6px 0 20px
        }

        .rp {
            font: 900 34px 'Big Shoulders Display', sans-serif;
            border-top: 1px solid #2a323e;
            padding-top: 14px
        }

        .panel label {
            display: block;
            margin-top: 14px;
            color: #9aa4b4;
            font-size: 13px
        }

        .panel input {
            width: 100%;
            background: #171c25;
            border: 1px solid #2a323e;
            padding: 8px 10px;
            margin-top: 4px;
            color: #fff
        }

        #go {
            width: 100%;
            margin-top: 22px;
            background: var(--cobalt);
            color: #fff;
            border: 0;
            padding: 14px;
            font: 600 16px 'Instrument Sans', sans-serif;
            cursor: pointer
        }

        #go:disabled {
            background: #2a323e;
            color: #6b7480;
            cursor: not-allowed
        }

        .tasks {
            grid-column: 1
        }

        .tasks h2 {
            font: 900 26px 'Big Shoulders Display', sans-serif;
            margin-bottom: 10px
        }

        .r {
            display: grid;
            grid-template-columns: 34px 92px 1fr;
            align-items: center;
            gap: 10px;
            padding: 5px 0;
            border-bottom: 1px solid var(--line)
        }

        .r b {
            font-family: 'Big Shoulders Display', sans-serif;
            color: var(--dim);
            font-size: 18px
        }

        .r input {
            background: transparent;
            border: 0;
            padding: 6px 0;
            width: 100%
        }

        .empty {
            color: var(--dim);
            padding: 14px 0
        }

        @media(max-width:900px) {
            .wrap {
                grid-template-columns: 1fr
            }

            .side {
                grid-column: 1;
                grid-row: auto;
                position: static;
                order: -1
            }

            .panel .num {
                font-size: 110px
            }
        }

        @media(prefers-reduced-motion:reduce) {
            * {
                transition: none !important
            }
        }
    </style>
</head>

<body>
    <form id="f" method="post" action="{{ route('cetak') }}" target="_blank">@csrf
        <input type="hidden" name="bulan" value="{{ $bulan }}">
        <div class="wrap">
            <section class="cal">
                <div class="bar">
                    <div>
                        <h1>Presensi<br>{{ $p->teks() }}</h1>
                    </div>
                    <input type="month" value="{{ $bulan }}" title="Periode berakhir tanggal 18 bulan ini"
                        onchange="if(this.value)location='?bulan='+this.value" aria-label="Bulan akhir periode">
                </div>
                <div class="grid">
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $h)
                        <div class="dn">{{ $h }}</div>
                    @endforeach
                    @foreach ($p->minggu() as $w)
                        @foreach ($w as $d)
                            @if ($p->dalam($d))
                                <button type="button" class="t {{ $d->isWeekend() ? 'we' : '' }}"
                                    data-d="{{ $d->format('Y-m-d') }}" data-w="{{ $d->dayOfWeekIso }}"
                                    aria-pressed="false">
                                    <span
                                        class="num">{{ $d->day }}</span><small>{{ $d->day == 1 || $d->eq($p->awal) ? \App\Support\Periode::BULAN[$d->month] : '' }}</small></button>
                            @else<div class="g"></div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="q"><button type="button" id="wd">Pilih Senin–Jumat</button><button
                        type="button" id="clr">Kosongkan</button></div>
                <p class="hint">Klik tanggal untuk menandai masuk. Shift + klik memilih rentang.</p>
            </section>
            <aside class="side">
                <div class="panel">
                    <div class="num" id="n">0</div>
                    <div class="u">hari masuk</div>
                    <div class="rp" id="rp">Rp 0</div>
                    <label>Nama<input name="nama" value="{{ $cfg['nama'] }}" required></label>
                    <label>Tarif per hari (Rp)<input name="tarif" type="number" min="0"
                            value="{{ $cfg['tarif'] }}" required></label>
                    <label>Nomor rekening<input name="rekening" value="{{ $cfg['rekening'] }}"></label>
                    <button id="go" disabled>Cetak 3 halaman</button>
                </div>
            </aside>
            <section class="tasks">
                <h2>Task harian</h2>
                <div id="rows"></div>
            </section>
        </div>
    </form>
    <script>
        const F = document.getElementById('f'),
            $ = s => document.querySelector(s),
            tiles = [...document.querySelectorAll('.t')],
            K = 'tlh:{{ $bulan }}',
            HR = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        let sel = new Set(),
            tasks = {},
            last = null;
        try {
            const s = JSON.parse(localStorage.getItem(K) || '{}');
            sel = new Set(s.sel || []);
            tasks = s.tasks || {};
            const p = JSON.parse(localStorage.getItem('tlh:p') || '{}');
            for (const k in p)
                if (F.elements[k]) F.elements[k].value = p[k];
        } catch (e) {}
        const save = () => {
            try {
                localStorage.setItem(K, JSON.stringify({
                    sel: [...sel],
                    tasks
                }));
                localStorage.setItem('tlh:p', JSON.stringify({
                    nama: F.nama.value,
                    tarif: F.tarif.value,
                    rekening: F.rekening.value
                }))
            } catch (e) {}
        };
        const esc = s => s.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;');

        function draw() {
            tiles.forEach(t => {
                const on = sel.has(t.dataset.d);
                t.classList.toggle('on', on);
                t.setAttribute('aria-pressed', on)
            });
            const ds = [...sel].sort();
            $('#n').textContent = ds.length;
            $('#rp').textContent = 'Rp ' + (ds.length * (+F.tarif.value || 0)).toLocaleString('id-ID');
            $('#rows').innerHTML = ds.length ? ds.map((d, i) =>
                `<label class="r"><b>${i+1}</b><span>${HR[new Date(d+'T00:00').getDay()]} ${d.slice(8)}/${d.slice(5,7)}</span><input name="task[${d}]" maxlength="300" placeholder="Apa yang dikerjakan hari ini" value="${esc(tasks[d]||'')}"></label><input type="hidden" name="tgl[]" value="${d}">`
            ).join('') : '<p class="empty">Pilih tanggal masuk di kalender, kolom task muncul di sini.</p>';
            $('#go').disabled = !ds.length;
            save();
        }
        tiles.forEach((t, i) => t.onclick = e => {
            const d = t.dataset.d;
            if (e.shiftKey && last !== null) {
                const on = !sel.has(d),
                    [a, b] = [last, i].sort((x, y) => x - y);
                for (let j = a; j <= b; j++) on ? sel.add(tiles[j].dataset.d) : sel.delete(tiles[j].dataset.d)
            } else sel.has(d) ? sel.delete(d) : sel.add(d);
            last = i;
            draw()
        });
        $('#wd').onclick = () => {
            tiles.forEach(t => +t.dataset.w < 6 && sel.add(t.dataset.d));
            draw()
        };
        $('#clr').onclick = () => {
            sel.clear();
            draw()
        };
        $('#rows').oninput = e => {
            if (e.target.name?.startsWith('task[')) {
                tasks[e.target.name.slice(5, -1)] = e.target.value;
                save()
            }
        };
        F.tarif.oninput = draw;
        F.nama.oninput = F.rekening.oninput = save;
        draw();
    </script>
</body>

</html>
