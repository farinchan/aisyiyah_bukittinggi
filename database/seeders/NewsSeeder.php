<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsCategory::create([
            'name' => 'Berita PDA',
            'slug' => 'berita-pda',
            'description' => 'Memuat berita-berita terbaru dari Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi',
            'meta_title' => 'Berita PDA Kota Bukittinggi',
            'meta_description' => 'Berita-berita terbaru dari Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi',
            'meta_keywords' => 'berita, berita terbaru, berita pda, berita pda kota bukittinggi, aisyiyah',
        ]);

        NewsCategory::create([
            'name' => 'Kegiatan Organisasi',
            'slug' => 'kegiatan-organisasi',
            'description' => 'Memuat berita-berita kegiatan dari organisasi-organisasi Aisyiyah Kota Bukittinggi',
            'meta_title' => 'Kegiatan Organisasi Aisyiyah Kota Bukittinggi',
            'meta_description' => 'Berita-berita kegiatan dari organisasi-organisasi Aisyiyah Kota Bukittinggi',
            'meta_keywords' => 'kegiatan, organisasi aisyiyah, aisyiyah kota bukittinggi',
        ]);

        NewsCategory::create([
            'name' => 'Keputusan',
            'slug' => 'keputusan',
            'description' => 'Memuat keputusan-keputusan Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi',
            'meta_title' => 'Keputusan PDA Kota Bukittinggi',
            'meta_description' => 'Keputusan-keputusan Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi',
            'meta_keywords' => 'keputusan, keputusan pda, aisyiyah kota bukittinggi',
        ]);

        News::create([
            'title' => 'Aisyiyah Tetapkan Idul Adha 1445 Jatuh Pada Senin, 17 Juni 2024. inilah Penjelasannya',
            'slug' => 'aisyiyah-tetapkan-idul-adha-1445-jatuh-pada-senin-17-juni-2024-inilah-penjelasannya',
            'content' => 'Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi telah menetapkan Idul Adha 1445 jatuh pada Senin, 17 Juni 2024. Penetapan ini berdasarkan hasil hisab dan rukyat yang dilakukan oleh Pimpinan Pusat Muhammadiyah sebagai organisasi induk.',
            'thumbnail' => 'news/example.png',
            'category_id' => 3,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'Aisyiyah Tetapkan Idul Adha 1445 Jatuh Pada Senin, 17 Juni 2024. inilah Penjelasannya',
            'meta_description' => 'Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi telah menetapkan Idul Adha 1445 jatuh pada Senin, 17 Juni 2024',
            'meta_keywords' => 'aisyiyah, idul adha, 1445, senin, 17 juni 2024',
        ]);

        News::create([
            'title' => 'Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi Gelar Rapat Kerja Tahunan',
            'slug' => 'pimpinan-daerah-aisyiyah-pda-kota-bukittinggi-gelar-rapat-kerja-tahunan',
            'content' => 'Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi menggelar rapat kerja tahunan di kantor PDA Kota Bukittinggi. Rapat kerja tahunan ini dihadiri oleh seluruh pengurus PDA Kota Bukittinggi dan membahas program kerja tahun mendatang.',
            'thumbnail' => 'news/example.png',
            'category_id' => 1,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi Gelar Rapat Kerja Tahunan',
            'meta_description' => 'Pimpinan Daerah Aisyiyah (PDA) Kota Bukittinggi menggelar rapat kerja tahunan di kantor PDA Kota Bukittinggi',
            'meta_keywords' => 'pda kota bukittinggi, rapat kerja tahunan, aisyiyah',
        ]);

        News::create([
            'title' => 'Nasyi\'atul Aisyiyah Kota Bukittinggi Gelar Kegiatan Donor Darah dan Bakti Sosial',
            'slug' => 'nasyiatul-aisyiyah-kota-bukittinggi-gelar-kegiatan-donor-darah-dan-bakti-sosial',
            'content' => 'Nasyi\'atul Aisyiyah Kota Bukittinggi menggelar kegiatan donor darah dan bakti sosial di kantor PDA Kota Bukittinggi. Kegiatan ini dihadiri oleh seluruh anggota Nasyi\'atul Aisyiyah Kota Bukittinggi dan masyarakat sekitar.',
            'thumbnail' => 'news/example.png',
            'category_id' => 2,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'Nasyi\'atul Aisyiyah Kota Bukittinggi Gelar Kegiatan Donor Darah dan Bakti Sosial',
            'meta_description' => 'Nasyi\'atul Aisyiyah Kota Bukittinggi menggelar kegiatan donor darah dan bakti sosial di kantor PDA Kota Bukittinggi',
            'meta_keywords' => 'nasyiatul aisyiyah kota bukittinggi, donor darah, bakti sosial',
        ]);

        News::create([
            'title' => 'Aisyiyah Kota Bukittinggi Gelar Kegiatan Pengajian Akbar dan Santunan Anak Yatim',
            'slug' => 'aisyiyah-kota-bukittinggi-gelar-kegiatan-pengajian-akbar-dan-santunan-anak-yatim',
            'content' => 'Aisyiyah Kota Bukittinggi menggelar kegiatan pengajian akbar dan santunan anak yatim di Masjid Agung Kota Bukittinggi. Kegiatan ini dihadiri oleh seluruh anggota Aisyiyah dan masyarakat umum.',
            'thumbnail' => 'news/example.png',
            'category_id' => 2,
            'user_id' => 1,
            'status' => 'published',
            'meta_title' => 'Aisyiyah Kota Bukittinggi Gelar Kegiatan Pengajian Akbar dan Santunan Anak Yatim',
            'meta_description' => 'Aisyiyah Kota Bukittinggi menggelar kegiatan pengajian akbar dan santunan anak yatim di Masjid Agung Kota Bukittinggi',
            'meta_keywords' => 'aisyiyah kota bukittinggi, pengajian akbar, santunan anak yatim',
        ]);



        NewsComment::create([
            'name' => 'User Test 1',
            'email' => 'test1@example.com',
            'comment' => 'Berita yang sangat menarik, semoga PDA Kota Bukittinggi semakin maju',
            'status' => 'approved',
            'news_id' => 1,
        ]);

        NewsComment::create([
            'name' => 'User Test 2',
            'email' => 'test2@example.com',
            'comment' => 'Aamiiin, semoga PDA Kota Bukittinggi semakin maju dan sukses',
            'status' => 'approved',
            'parent_id' => 1,
            'news_id' => 1,
        ]);

        NewsComment::create([
            'name' => 'User Test 2',
            'email' => 'test2@example.com',
            'comment' => 'Semoga Aisyiyah Kota Bukittinggi semakin sukses dan semakin banyak kegiatan positif',
            'status' => 'approved',
            'news_id' => 2,
        ]);

        NewsComment::create([
            'name' => 'Office Gariskode',
            'email' => 'office@gariskode.com',
            'comment' => 'Semoga PDA Kota Bukittinggi Semakin Maju dan semakin sukses',
            'status' => 'approved',
            'news_id' => 1,
            'user_id' => 1,
        ]);
    }
}
