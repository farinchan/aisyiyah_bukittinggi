<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Pengumuman::create([
            'title' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi 2024',
            'slug' => 'pemberitahuan-rapat-kerja-tahunan-pimpinan-daerah-aisyiyah-pda-kota-bukittinggi-2024',
            'content' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi 2024. Rapat Kerja Tahunan ini diadakan pada 17 Juni 2024 di Gedung PDA Kota Bukittinggi. Seluruh pengurus Aisyiyah dan Pimpinan Cabang diharapkan hadir tepat waktu.',
            'meta_title' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi 2024',
            'meta_description' => 'Pemberitahuan Rapat Kerja Tahunan Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi 2024',
            'meta_keywords' => 'pemberitahuan, rapat kerja tahunan, rapat kerja tahunan pda, rapat kerja tahunan pda kota bukittinggi, aisyiyah',
            'user_id' => 1,
        ]);

        Pengumuman::create([
            'title' => 'Pemberitahuan Pendataan Ulang Anggota Aisyiyah Kota Bukittinggi pada Website Resmi PDA Kota Bukittinggi',
            'slug' => 'pemberitahuan-pendataan-ulang-anggota-aisyiyah-kota-bukittinggi-pada-website-resmi-pda-kota-bukittinggi',
            'content' => 'Pemberitahuan Pendataan Ulang Anggota Aisyiyah Kota Bukittinggi pada Website Resmi PDA Kota Bukittinggi. Pendataan ulang ini dilakukan untuk memperbaharui data anggota Aisyiyah Kota Bukittinggi. Seluruh anggota Aisyiyah diharapkan melakukan pendataan ulang melalui website resmi PDA Kota Bukittinggi paling lambat tanggal 30 November 2024.',
            'meta_title' => 'Pemberitahuan Pendataan Ulang Anggota Aisyiyah Kota Bukittinggi pada Website Resmi PDA Kota Bukittinggi',
            'meta_description' => 'Pemberitahuan Pendataan Ulang Anggota Aisyiyah Kota Bukittinggi pada Website Resmi PDA Kota Bukittinggi',
            'meta_keywords' => 'pemberitahuan, pendataan ulang, anggota aisyiyah, pda kota bukittinggi, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

        Pengumuman::create([
            'title' => 'Pemberitahuan Pendaftaran Anggota Baru Aisyiyah Kota Bukittinggi',
            'slug' => 'pemberitahuan-pendaftaran-anggota-baru-aisyiyah-kota-bukittinggi',
            'content' => 'Pemberitahuan Pendaftaran Anggota Baru Aisyiyah Kota Bukittinggi. Pendaftaran anggota baru Aisyiyah Kota Bukittinggi dapat dilakukan melalui website resmi PDA Kota Bukittinggi atau langsung datang ke kantor PDA Kota Bukittinggi. Syarat pendaftaran: fotokopi KTP, pas foto 3x4, mengisi formulir pendaftaran, dan mengikuti kajian pengenalan Aisyiyah.',
            'meta_title' => 'Pemberitahuan Pendaftaran Anggota Baru Aisyiyah Kota Bukittinggi',
            'meta_description' => 'Pemberitahuan Pendaftaran Anggota Baru Aisyiyah Kota Bukittinggi',
            'meta_keywords' => 'pemberitahuan, pendaftaran anggota baru, anggota baru aisyiyah, pda kota bukittinggi, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

        Pengumuman::create([
            'title' => 'Pelaksanaan Kajian Rutin Bulanan Aisyiyah Kota Bukittinggi',
            'slug' => 'pelaksanaan-kajian-rutin-bulanan-aisyiyah-kota-bukittinggi',
            'content' => 'Pelaksanaan Kajian Rutin Bulanan Aisyiyah Kota Bukittinggi akan dilaksanakan setiap Minggu kedua tiap bulan di Masjid Agung Kota Bukittinggi. Kajian ini terbuka untuk umum dan khususnya para anggota Aisyiyah. Materi kajian meliputi fiqih wanita, akhlak, dan pemberdayaan perempuan dalam Islam.',
            'meta_title' => 'Pelaksanaan Kajian Rutin Bulanan Aisyiyah Kota Bukittinggi',
            'meta_description' => 'Pelaksanaan Kajian Rutin Bulanan Aisyiyah Kota Bukittinggi setiap Minggu kedua tiap bulan',
            'meta_keywords' => 'kajian rutin, kajian bulanan, aisyiyah bukittinggi, pda kota bukittinggi',
            'user_id' => 1,
        ]);

        Pengumuman::create([
            'title' => 'Pembukaan Program Kursus Menjahit dan Memasak untuk Anggota Aisyiyah',
            'slug' => 'pembukaan-program-kursus-menjahit-dan-memasak-untuk-anggota-aisyiyah',
            'content' => 'Pimpinan Daerah Aisyiyah Kota Bukittinggi membuka program kursus menjahit dan memasak untuk anggota Aisyiyah dan masyarakat umum. Program ini bertujuan untuk pemberdayaan ekonomi perempuan dan peningkatan keterampilan. Pendaftaran dibuka mulai 1 November 2024 di kantor PDA Kota Bukittinggi.',
            'meta_title' => 'Pembukaan Program Kursus Menjahit dan Memasak untuk Anggota Aisyiyah',
            'meta_description' => 'Program kursus menjahit dan memasak Aisyiyah Kota Bukittinggi untuk pemberdayaan ekonomi perempuan',
            'meta_keywords' => 'kursus menjahit, kursus memasak, pemberdayaan perempuan, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

        Pengumuman::create([
            'title' => 'Kegiatan Santunan Anak Yatim dan Dhuafa Ramadhan 1445 H',
            'slug' => 'kegiatan-santunan-anak-yatim-dan-dhuafa-ramadhan-1445-h',
            'content' => 'Aisyiyah Kota Bukittinggi akan mengadakan kegiatan santunan anak yatim dan dhuafa dalam rangka bulan suci Ramadhan 1445 H. Kegiatan ini akan dilaksanakan di Masjid Agung Kota Bukittinggi pada hari Sabtu, 23 Maret 2024. Bagi yang ingin berpartisipasi dapat menyalurkan bantuan melalui kantor PDA Kota Bukittinggi.',
            'meta_title' => 'Kegiatan Santunan Anak Yatim dan Dhuafa Ramadhan 1445 H',
            'meta_description' => 'Kegiatan santunan anak yatim dan dhuafa Aisyiyah Kota Bukittinggi dalam rangka Ramadhan 1445 H',
            'meta_keywords' => 'santunan anak yatim, santunan dhuafa, ramadhan, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

    }
}
