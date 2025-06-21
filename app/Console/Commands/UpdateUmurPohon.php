<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mitra;
use Carbon\Carbon;

class UpdateUmurPohon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'umur-pohon:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update umur pohon alpukat secara otomatis berdasarkan tanggal input pertama';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai update umur pohon alpukat...');

        // Ambil semua mitra yang sudah memiliki umur pohon
        $mitras = Mitra::whereNotNull('umur_pohon')
                      ->whereNotNull('tanggal_input_umur')
                      ->get();

        $updatedCount = 0;

        foreach ($mitras as $mitra) {
            // Hitung umur pohon saat ini
            $umurSekarang = $mitra->umur_pohon_sekarang;

            // Update umur pohon di database (opsional, karena sudah dihitung otomatis)
            // $mitra->update(['umur_pohon' => $umurSekarang]);

            $this->line("Mitra: {$mitra->nama_lengkap} - Umur pohon: {$umurSekarang} hari");
            $updatedCount++;
        }

        $this->info("Selesai! {$updatedCount} mitra telah diperiksa.");

        return Command::SUCCESS;
    }
}
