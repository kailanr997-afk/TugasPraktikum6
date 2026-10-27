<?php

namespace Tests\Feature;

use App\Models\Laporan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LaporanTest extends TestCase
{
    use RefreshDatabase;

    public function test_warga_can_submit_a_flood_report(): void
    {
        $response = $this->post('/laporan', [
            'nama_pelapor' => 'Budi',
            'alamat_lokasi' => 'Jl. Melati No. 10',
            'keterangan' => 'Air mulai masuk ke rumah warga.',
        ]);

        $response->assertRedirect(route('laporan.create'));
        $response->assertSessionHas('success', 'Laporan berhasil dikirim!');

        $this->assertDatabaseHas('laporans', [
            'nama_pelapor' => 'Budi',
            'alamat_lokasi' => 'Jl. Melati No. 10',
            'keterangan' => 'Air mulai masuk ke rumah warga.',
            'foto' => null,
        ]);

        $this->assertSame(1, Laporan::count());
    }

    public function test_warga_can_submit_a_flood_report_with_a_photo(): void
    {
        Storage::fake('public');

        $response = $this->post('/laporan', [
            'nama_pelapor' => 'Siti',
            'alamat_lokasi' => 'Jl. Kenanga No. 5',
            'keterangan' => 'Air menggenangi jalan.',
            'foto' => UploadedFile::fake()->create('banjir.jpg', 10, 'image/jpeg'),
        ]);

        $response->assertRedirect(route('laporan.create'));

        $laporan = Laporan::where('nama_pelapor', 'Siti')->firstOrFail();
        Storage::disk('public')->assertExists($laporan->foto);
    }
}
