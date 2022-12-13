<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MicroSmallAndMediumEnterprisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('micro_small_and_medium_enterprises')->delete();
        
        DB::table('micro_small_and_medium_enterprises')->insert(array (
            0 => 
            array (
                'id' => 1,
                'demografis_id' => 1,
                'user_id' => 1,
                'nib' => NULL,
                'name' => 'Bratang Kids Dance',
                'slug' => 'bratang-kids-dance',
                'pic' => 'Kak Anwar',
                'image' => '/uploads/umkm/umkm-dance-static.jpeg',
                'thumbnail' => '/uploads/umkm/thumbnail/umkm-dance-static.jpeg',
                'address' => 'Balai RW 11 Bratang Perintis Raya',
                'business_type' => 'Jasa Kesenian',
                'short_desc' => 'Sanggar tari BRATANG kids di bentuk oleh Andwar Kinarya di RW 11 Bratang Perintis Raya Kelurahan Ngagelrejo Surabaya',
                'description' => '<p>Sanggar tari BRATANG kids di bentuk oleh Andwar Kinarya di RW 11 Bratang Perintis Raya Kelurahan Ngagelrejo Surabaya. Sanggar ini dibentuk untuk mengajarkan peserta didiknya di Rw.11 Ngagelrejo agar mahir dalam manari. Adapun peserta didiknya sebagian besar merupakan anak-anak usia Sekolah Dasar (SD). Sanggar BRATANG kids juga telah sering tampil di beberapa Event di Kota Surabaya.<br><br>Narahubung<br>Kak Anwar&nbsp;081336862975<br></p>',
                'status' => 'created',
                'created_at' => '2022-12-13 08:26:41',
                'updated_at' => '2022-12-13 08:26:53',
            ),
        ));
        
    }
}