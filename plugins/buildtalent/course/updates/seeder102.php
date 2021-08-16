<?php namespace Buildtalent\Course\Updates;

use Seeder;
use Buildtalent\Course\Models\Tag;

class Seeder102 extends Seeder
{
    public function run()
    {
        Tag::create([
            'name' => 'Bán chạy nhất',
        ]);

        Tag::create([
            'name' => 'Khóa học mới',
        ]);
    }
}