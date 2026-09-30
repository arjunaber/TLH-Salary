<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('Form Pencairan Honor TLH')
            ->assertSee('images/telkom-university-logo.png', false)
            ->assertSee('Cetak formulir pencairan');
    }

    public function test_print_view_uses_expected_pages_and_signatures(): void
    {
        $response = $this->post('/cetak', [
            'bulan' => '2026-09',
            'tgl' => ['2026-08-19', '2026-08-20'],
            'task' => [
                '2026-08-19' => 'Pengecekan dokumen',
                '2026-08-20' => 'Verifikasi data',
            ],
            'nama' => 'Samuel Arjuna Queen Bernard',
            'tarif' => 180000,
            'atasan' => 'Dr. Toufan Diansyah Tambunan, S.T., M.T',
            'atasan_nip' => '15850031-1',
            'jabatan' => 'Kabag Pengembangan SDM',
            'penanggung_jawab' => 'Firjatullah Nastari',
            'penanggung_jawab_nip' => '22970014',
        ]);

        $response
            ->assertOk()
            ->assertSee('class="pg task-page"', false)
            ->assertSee('class="pg attendance"', false)
            ->assertSee('DAFTAR HADIR TENAGA LEPAS HARIAN (TLH)')
            ->assertSee('FORM PENCAIRAN HONOR TENAGA LEPAS HARIAN (TLH)')
            ->assertSee('Pertanggungan oleh,')
            ->assertSee('Dr. Toufan Diansyah Tambunan, S.T., M.T')
            ->assertSee('NIP. 15850031-1')
            ->assertSee('Firjatullah Nastari')
            ->assertSee('NIP. 22970014')
            ->assertSee('--task-row-height:', false);
    }
}
