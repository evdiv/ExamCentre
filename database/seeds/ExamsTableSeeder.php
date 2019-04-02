<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('exams')->insert([
            'title' => 'Demo Exam',
            'src' => 'demo.mp4',
            'intervals' => '765,855,915,983,1038,1089,1156,1230,1285,1332,1390,1444,1506',
            'secondPartStart' => 1600,
            'length' => 1599,
            'preview' => 'demo-exam.jpg',
            'description' => 'This is a free demo exam',
            'views' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

       DB::table('exams')->insert([
            'title' => 'IELTS Exam #1',
            'src' => '7rtgddcfvgw7.mp4',
            'intervals' => '50,276,364,437,493,556,639,705,760,830,876,931,994,1059,1122,1856,2012,2130,2208,2282,2359,2441',
            'secondPartStart' => 1856,
            'length' => 2507,  
            'preview' => 'first-exam.jpg',
            'description' => 'This is the first IELTS Virtual Exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(8)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'IELTS Exam #2',
            'src' => '6gfbhnhjuy46.mp4',
            'intervals' => '50,276,369,421,479,534,592,662,746,799,865,921,978,1714,1859,1943,2030,2109,2190,2277',
            'secondPartStart' => 1714,
            'length' => 2346,            
            'preview' => 'second-exam.jpg',
            'description' => 'This is the second IELTS Virtual Exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(9)->format('Y-m-d H:i:s')
        ]);


        DB::table('exams')->insert([
            'title' => 'IELTS Exam #3',
            'src' => '3hjkui5ttggt3.mp4',
            'intervals' => '50,270,358,394,440,495,544,609,658,703,783,832,890,960,1024,1783,1939,2038,2096,2178,2252,2320',
            'secondPartStart' => 1783,
            'length' => 2390,
            'preview' => 'third-exam.jpg',
            'description' => 'This is the third IELTS Virtual Exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(12)->format('Y-m-d H:i:s')
        ]);

        DB::table('exams')->insert([
            'title' => 'IELTS Exam #4',
            'src' => '1uji54hjth7r61.mp4',
            'intervals' => '50,270,377,469,539,622,711,799,874,944,1021,1091,1860,2015,2099,2190,2264,2368,2459',
            'secondPartStart' => 1860,
            'length' => 2545,
            'preview' => 'fourth-exam.jpg',
            'description' => 'This is the fourth IELTS Virtual Exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(15)->format('Y-m-d H:i:s')
        ]);



        DB::table('exams')->insert([
            'title' => 'IELTS Exam #5',
            'src' => '4ygtbhnyy44.mp4',
            'intervals' => '50,270,368,439,521,566,633,697,765,810,857,921,976,1038,1796,1967,2066,2160,2258,2375,2473',
            'secondPartStart' => 1796,
            'length' => 2568,            
            'preview' => 'fifth-exam.jpg',
            'description' => 'This is the fifth IELTS Virtual Exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(11)->format('Y-m-d H:i:s')
        ]);


        DB::table('exams')->insert([
            'title' => 'IELTS Exam #6',
            'src' => '5gfbhhyyetr5.mp4',
            'intervals' => '50,270,378,450,513,582,705,775,830,899,952,1012,1063,1828,1990,2063,2156,2232,2315,2380',
            'secondPartStart' => 1828,
            'length' => 2438,   
            'preview' => 'sixth-exam.jpg',
            'description' => 'This is the sixth IELTS Virtual Exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(10)->format('Y-m-d H:i:s')
        ]);


        DB::table('exams')->insert([
            'title' => 'IELTS Exam #7',
            'src' => '2u44rfgtbnh2.mp4',
            'intervals' => '50,270,383,467,544,642,732,799,874,962,1060,1164,1247,2015,2190,2269,2355,2468,2550,2654',
            'secondPartStart' => 2015,
            'length' => 2740,
            'preview' => 'seventh-exam.jpg',
            'description' => 'This is the seventh IELTS Virtual Exam',
            'views' => 0,
            'created_at' => Carbon::now()->subHours(13)->format('Y-m-d H:i:s')
        ]);




    }
}
