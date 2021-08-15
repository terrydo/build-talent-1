<?php namespace Buildtalent\Course\Updates;

use Seeder;
use Buildtalent\Course\Models\Category;

class Seeder103 extends Seeder
{    
    public function run()
    {
        Category::create([
            "name" => "Tuyển dụng"
        ]);
        Category::create([
            "name" => "C&B"
        ]);
        Category::create([
            "name" => "Phát triển bản thân"
        ]);
        Category::create([
            "name" => "Văn hóa doanh nghiệp"
        ]);
    }
}