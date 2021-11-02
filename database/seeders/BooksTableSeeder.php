<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'iPhuck 10',
            'authorName' => 'Victor Pelevin',
            'year' => 2018,
            'publisher' => 'Unknown',
            'description'=> 'Modern Russian Literature',
            'recommendedRetailPrice' => 40,
            'url' => 'https://www.amazon.com/Novinka-Pelevin-Viktor-Olegovich/dp/5040893949',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('books')->insert([
            'name' => 'Omon Ra',
            'authorName' => 'Victor Pelevin',
            'year' => 1998,
            'publisher' => 'New Directions',
            'description'=> 'Modern Russian Literature, Translated into English',
            'recommendedRetailPrice' => 30,
            'url' => 'https://www.amazon.com/Omon-Ra-Victor-Pelevin/dp/0811213641/ref=pd_sbs_2/133-5060432-2958034?pd_rd_w=c1NZ8&pf_rd_p=3676f086-9496-4fd7-8490-77cf7f43f846&pf_rd_r=SJZBA0HGEZY5ECDHVS7C&pd_rd_r=2a1bcb84-a66d-46ab-bc83-e298c9f2d900&pd_rd_wg=7UnZH&pd_rd_i=0811213641&psc=1',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);

        DB::table('books')->insert([
            'name' => 'Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones',
            'authorName' => 'James Clear',
            'year' => 2018,
            'publisher' => 'Penguin',
            'description'=> 'No matter your goals, Atomic Habits offers a proven framework for improving every day.',
            'recommendedRetailPrice' => 16,
            'url' => 'https://www.amazon.com/Atomic-Habits-Proven-Build-Break/dp/0735211299/ref=tmm_hrd_swatch_0?_encoding=UTF8&qid=&sr=',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);
        
        DB::table('books')->insert([
            'name' => 'Greenlights',
            'authorName' => 'Matthew McConaughey',
            'year' => 2020,
            'publisher' => 'Crown',
            'description'=> '#1 NEW YORK TIMES BESTSELLER',
            'recommendedRetailPrice' => 18.60,
            'url' => 'https://www.amazon.com/dp/B08HLW2JXD?plink=rPC938WhKQ0VFWTC&ref=adblp13nvvxx_0_1_im',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);

        DB::table('books')->insert([
            'name' => 'Indistractable: How to Control Your Attention and Choose Your Life',
            'authorName' => 'Nir Eyal',
            'year' => 2019,
            'publisher' => 'BenBella Books',
            'description'=> 'What would be possible if you followed through on your best intentions? What could you accomplish if you could stay focused? What if you had the power to become indistractable?',
            'recommendedRetailPrice' => 32.49,
            'url' => 'https://www.amazon.com/Indistractable-Control-Your-Attention-Choose/dp/194883653X/ref=tmm_hrd_swatch_0?_encoding=UTF8&qid=&sr=',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);

        DB::table('books')->insert([
            'name' => 'The 5 AM Club: Own Your Morning. Elevate Your Life',
            'authorName' => 'Robin Sharma',
            'year' => 2018,
            'publisher' => 'HarperCollins Publishers',
            'description'=> 'Personal Time management',
            'recommendedRetailPrice' => 21.61,
            'url' => 'https://www.amazon.com/AM-Club-Morning-Elevate-Life/dp/1443456624/ref=tmm_hrd_swatch_0?_encoding=UTF8&qid=&sr=',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);

        DB::table('books')->insert([
            'name' => 'Breath: The New Science of a Lost Art',
            'authorName' => 'James Nestor',
            'year' => 2021,
            'publisher' => 'HarperCollins Publishers',
            'description'=> 'Breath explores how the human species has lost the ability to breathe properly over the past several hundred thousand years and is now suffering from a laundry list of maladie',
            'recommendedRetailPrice' => 28.33,
            'url' => 'https://www.amazon.com/Breath-New-Science-Lost-Art/dp/0241289122/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=&sr=',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
