<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'ROLEX',
            'description' => 'rolex.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/jZYAAOSwUuFW0u~s/s-l225.webp',
            'price' => 698.88
        ]);

        DB::table('products')->insert([
            'name' => 'CASIO',
            'description' => 'casio.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/fnYAAOSwi7RZJXsD/s-l225.webp',
            'price' => 983.00
        ]);

        DB::table('products')->insert([
            'name' => 'OMEGA',
            'description' => 'omega.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/OiYAAOSwo25fIvIr/s-l225.webp',
            'price' => 675.00
        ]);

        DB::table('products')->insert([
            'name' => 'INVICTA',
            'description' => 'invicta.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/7CIAAMXQWzNSlNTo/s-l225.webp',
            'price' => 159.99
        ]);

        DB::table('products')->insert([
            'name' => 'CITIZEN',
            'description' => 'citizen.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/tKgAAOSw-K9ZJXhR/s-l225.webp',
            'price' => 68.00
        ]);

        DB::table('products')->insert([
            'name' => 'TAG Heuer',
            'description' => 'tag Heuer.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/W64AAOSwL29eThW8/s-l225.webp',
            'price' => 129.99
        ]);

        DB::table('products')->insert([
            'name' => 'TIMEX',
            'description' => 'timex.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/fF4AAOxygLxSVN5P/s-l225.webp',
            'price' => 129.99
        ]);

        DB::table('products')->insert([
            'name' => 'LUMINOX',
            'description' => 'luminox.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/PgwAAOSwVkBdxfFq/s-l225.webp',
            'price' => 129.99
        ]);


        DB::table('products')->insert([
            'name' => 'CARAVELLE',
            'description' => 'caravelle.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/g54AAOSwSxtePl0j/s-l225.webp',
            'price' => 129.99
        ]);


        DB::table('products')->insert([
            'name' => 'FOSSIL',
            'description' => 'fossil.',
            'photo' => 'https://i.ebayimg.com/thumbs/images/g/dHwAAOSwijhdVgoi/s-l225.webp',
            'price' => 129.99
        ]);

    }
}
