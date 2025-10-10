<?php

namespace Database\Seeders;

use App\Models\Kajian;
use App\Models\KajianComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kajian::create([
            'title' => 'Peran Wanita Muslimah dalam Dakwah dan Pendidikan Anak',
            'content' => 'Dalam Islam, wanita memiliki peran yang sangat mulia sebagai pendidik pertama bagi anak-anaknya. Rasulullah shallallahu alaihi wa sallam bersabda: "Surga itu di bawah telapak kaki ibu" (HR. An-Nasa\'i). Aisyiyah sebagai organisasi perempuan Muhammadiyah berkomitmen untuk memberdayakan wanita muslimah dalam menjalankan peran dakwah dan pendidikan yang berkualitas. Di Kota Bukittinggi, Aisyiyah terus mengembangkan program-program pendidikan Islam untuk membentuk generasi yang beriman dan bertakwa.',
            'tags' => 'wanita muslimah, dakwah, pendidikan anak, aisyiyah',
            'slug' => 'peran-wanita-muslimah-dalam-dakwah-dan-pendidikan-anak',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Peran Wanita Muslimah dalam Dakwah dan Pendidikan Anak',
            'meta_description' => 'Kajian tentang peran mulia wanita muslimah dalam dakwah dan pendidikan anak menurut ajaran Islam dan praktik Aisyiyah Bukittinggi',
            'meta_keywords' => 'wanita muslimah, dakwah, pendidikan anak, aisyiyah, bukittinggi',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Keutamaan Menuntut Ilmu bagi Wanita dalam Islam',
            'content' => 'Rasulullah shallallahu alaihi wa sallam bersabda: "Menuntut ilmu adalah wajib bagi setiap muslim" (HR. Ibnu Majah). Hadits ini menunjukkan bahwa kewajiban menuntut ilmu berlaku bagi laki-laki dan perempuan. Ummul mukminin Aisyah radhiyallahu anha adalah contoh nyata wanita muslimah yang cerdas dan berilmu. Aisyiyah Kota Bukittinggi melalui berbagai program kajian dan pendidikan, mendorong para anggotanya untuk terus menuntut ilmu agama dan umum sebagai bekal dalam menjalankan misi dakwah.',
            'tags' => 'menuntut ilmu, wanita islam, aisyah, pendidikan',
            'slug' => 'keutamaan-menuntut-ilmu-bagi-wanita-dalam-islam',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Keutamaan Menuntut Ilmu bagi Wanita dalam Islam',
            'meta_description' => 'Kajian tentang pentingnya pendidikan bagi wanita muslimah berdasarkan ajaran Islam dan teladan Ummul Mukminin Aisyah',
            'meta_keywords' => 'menuntut ilmu, wanita islam, pendidikan, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Membangun Keluarga Sakinah, Mawaddah, Warahmah',
            'content' => 'Allah SWT berfirman: "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu istri-istri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya di antaramu rasa kasih dan sayang" (QS. Ar-Rum: 21). Aisyiyah Kota Bukittinggi mengembangkan program bimbingan pra nikah dan konseling keluarga untuk membantu para anggotanya membangun rumah tangga yang harmonis sesuai dengan tuntunan Islam. Keluarga yang sakinah menjadi fondasi kuat dalam membentuk masyarakat yang Islami.',
            'tags' => 'keluarga sakinah, pernikahan islam, bimbingan keluarga',
            'slug' => 'membangun-keluarga-sakinah-mawaddah-warahmah',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Membangun Keluarga Sakinah, Mawaddah, Warahmah',
            'meta_description' => 'Panduan membangun keluarga harmonis berdasarkan Al-Quran dan Sunnah melalui program Aisyiyah Bukittinggi',
            'meta_keywords' => 'keluarga sakinah, pernikahan islam, aisyiyah, bukittinggi',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Zakat dan Infaq sebagai Pilar Ekonomi Umat',
            'content' => 'Allah SWT berfirman: "Ambillah zakat dari sebagian harta mereka, dengan zakat itu kamu membersihkan dan mensucikan mereka" (QS. At-Taubah: 103). Aisyiyah Kota Bukittinggi aktif dalam pengelolaan zakat, infaq, dan sedekah melalui program-program pemberdayaan ekonomi umat. Dengan sistem yang amanah dan transparan, dana yang terkumpul disalurkan untuk program pendidikan, kesehatan, dan pemberdayaan ekonomi masyarakat kurang mampu di Bukittinggi.',
            'tags' => 'zakat, infaq, ekonomi umat, pemberdayaan',
            'slug' => 'zakat-dan-infaq-sebagai-pilar-ekonomi-umat',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Zakat dan Infaq sebagai Pilar Ekonomi Umat',
            'meta_description' => 'Kajian tentang pentingnya zakat dan infaq dalam membangun ekonomi umat melalui program Aisyiyah Bukittinggi',
            'meta_keywords' => 'zakat, infaq, ekonomi umat, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Adab dan Etika Wanita Muslimah dalam Bermasyarakat',
            'content' => 'Islam telah mengatur dengan sempurna bagaimana seorang wanita muslimah berinteraksi dalam masyarakat. Rasulullah shallallahu alaihi wa sallam bersabda: "Sesungguhnya Allah itu indah dan menyukai keindahan" (HR. Muslim). Aisyiyah Kota Bukittinggi mengajarkan kepada anggotanya tentang adab berpakaian, berbicara, dan berperilaku yang sesuai dengan syariat Islam. Wanita muslimah dapat aktif berperan dalam masyarakat sambil tetap menjaga kehormatan dan martabatnya sebagai muslimah.',
            'tags' => 'adab muslimah, etika islam, wanita bermasyarakat',
            'slug' => 'adab-dan-etika-wanita-muslimah-dalam-bermasyarakat',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Adab dan Etika Wanita Muslimah dalam Bermasyarakat',
            'meta_description' => 'Panduan adab dan etika bagi wanita muslimah dalam berinteraksi di masyarakat sesuai ajaran Islam',
            'meta_keywords' => 'adab muslimah, etika islam, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Pentingnya Kesehatan Ibu dan Anak dalam Perspektif Islam',
            'content' => 'Islam sangat memperhatikan kesehatan ibu dan anak. Rasulullah shallallahu alaihi wa sallam bersabda: "Allah tidak menurunkan penyakit melainkan Dia turunkan pula obatnya" (HR. Bukhari). Aisyiyah Kota Bukittinggi melalui Rumah Sakit dan klinik-klinik kesehatan yang dikelolanya, memberikan pelayanan kesehatan yang berkualitas bagi masyarakat. Program posyandu, penyuluhan kesehatan ibu hamil, dan imunisasi menjadi bagian dari misi dakwah kesehatan Aisyiyah.',
            'tags' => 'kesehatan ibu, kesehatan anak, pelayanan kesehatan islam',
            'slug' => 'pentingnya-kesehatan-ibu-dan-anak-dalam-perspektif-islam',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Pentingnya Kesehatan Ibu dan Anak dalam Perspektif Islam',
            'meta_description' => 'Kajian tentang pentingnya menjaga kesehatan ibu dan anak menurut ajaran Islam melalui program Aisyiyah Bukittinggi',
            'meta_keywords' => 'kesehatan ibu, kesehatan anak, aisyiyah bukittinggi, pelayanan kesehatan',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Dakwah Bil Hal: Wujud Nyata Pengamalan Islam',
            'content' => 'Dakwah tidak hanya dilakukan dengan lisan (bil lisan) dan tulisan (bil qalam), tetapi juga melalui perbuatan nyata (bil hal). Allah SWT berfirman: "Dan persiapkanlah untuk menghadapi mereka kekuatan apa saja yang kamu sanggupi" (QS. Al-Anfal: 60). Aisyiyah Kota Bukittinggi mewujudkan dakwah bil hal melalui berbagai program sosial seperti santunan anak yatim, bantuan bencana, pemberdayaan ekonomi, dan program kesehatan gratis. Melalui amal nyata ini, masyarakat dapat merasakan kehadiran Islam sebagai rahmat bagi semesta alam.',
            'tags' => 'dakwah bil hal, amal sosial, pengamalan islam',
            'slug' => 'dakwah-bil-hal-wujud-nyata-pengamalan-islam',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Dakwah Bil Hal: Wujud Nyata Pengamalan Islam',
            'meta_description' => 'Kajian tentang pentingnya dakwah melalui amal perbuatan nyata dalam program-program Aisyiyah Bukittinggi',
            'meta_keywords' => 'dakwah bil hal, amal sosial, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Kepemimpinan Wanita dalam Islam: Teladan Ummahatul Mukminin',
            'content' => 'Islam memberikan ruang bagi wanita untuk memimpin dalam berbagai bidang. Ummul Mukminin Khadijah radhiyallahu anha adalah contoh sukses wanita dalam kepemimpinan bisnis, sementara Ummul Mukminin Aisyah radhiyallahu anha memimpin dalam bidang ilmu pengetahuan dan pendidikan. Aisyiyah Kota Bukittinggi mendorong anggotanya untuk mengembangkan kemampuan kepemimpinan dalam keluarga, organisasi, dan masyarakat sesuai dengan tuntunan Islam dan dengan tetap menjaga fitrah sebagai wanita.',
            'tags' => 'kepemimpinan wanita, ummahatul mukminin, teladan islam',
            'slug' => 'kepemimpinan-wanita-dalam-islam-teladan-ummahatul-mukminin',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Kepemimpinan Wanita dalam Islam: Teladan Ummahatul Mukminin',
            'meta_description' => 'Kajian tentang peran kepemimpinan wanita dalam Islam berdasarkan teladan para Ummahatul Mukminin',
            'meta_keywords' => 'kepemimpinan wanita, ummahatul mukminin, aisyiyah bukittinggi',
            'user_id' => 1,
        ]);




        KajianComment::create([
            'kajian_id' => 1,
            'name' => 'Siti Aminah',
            'email' => 'aminah@example.com',
            'comment' => 'Jazakillahu khair, kajian yang sangat bermanfaat untuk para ibu di Aisyiyah Bukittinggi.',
            'status' => 'approved',
        ]);

        KajianComment::create([
            'kajian_id' => 1,
            'name' => 'Fatimah Az-Zahra',
            'email' => 'fatimah@example.com',
            'comment' => 'Semoga program-program Aisyiyah semakin berkembang dalam mendidik generasi Islam yang berkualitas.',
            'status' => 'approved',
            'parent_id' => 1,
        ]);

        KajianComment::create([
            'kajian_id' => 2,
            'name' => 'Khadijah',
            'email' => 'khadijah@example.com',
            'comment' => 'Subhanallah, mengingatkan kita akan pentingnya menuntut ilmu sebagai muslimah.',
            'status' => 'approved',
        ]);

        KajianComment::create([
            'kajian_id' => 3,
            'name' => 'Aisyah Nur',
            'email' => 'aisyah@example.com',
            'comment' => 'Program bimbingan pra nikah di Aisyiyah Bukittinggi sangat membantu para calon pengantin.',
            'status' => 'approved',
        ]);

        KajianComment::create([
            'kajian_id' => 4,
            'name' => 'Ummu Salamah',
            'email' => 'ummu@example.com',
            'comment' => 'Alhamdulillah, program zakat dan infaq Aisyiyah sangat transparan dan amanah.',
            'status' => 'approved',
        ]);

        KajianComment::create([
            'kajian_id' => 5,
            'name' => 'Hafsah',
            'email' => 'hafsah@example.com',
            'comment' => 'Kajian yang bagus tentang adab wanita muslimah. Semoga bisa diamalkan dalam kehidupan sehari-hari.',
            'status' => 'approved',
        ]);

        KajianComment::create([
            'kajian_id' => 6,
            'name' => 'Zainab',
            'email' => 'zainab@example.com',
            'comment' => 'Program kesehatan Aisyiyah sangat membantu masyarakat Bukittinggi, terutama ibu dan anak.',
            'status' => 'approved',
        ]);

        KajianComment::create([
            'kajian_id' => 7,
            'name' => 'Maryam',
            'email' => 'maryam@example.com',
            'comment' => 'Dakwah bil hal memang lebih mengena di hati masyarakat. Semoga Aisyiyah istiqomah.',
            'status' => 'approved',
        ]);

        KajianComment::create([
            'kajian_id' => 8,
            'name' => 'Ruqayyah',
            'email' => 'ruqayyah@example.com',
            'comment' => 'Inspiratif sekali tentang kepemimpinan wanita dalam Islam. Terima kasih Aisyiyah Bukittinggi.',
            'status' => 'approved',
        ]);

    }
}
