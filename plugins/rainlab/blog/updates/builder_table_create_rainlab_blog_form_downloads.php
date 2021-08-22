<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRainlabBlogFormDownloads extends Migration
{
    public function up()
    {
        Schema::create('rainlab_blog_form_downloads', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->boolean('sex');
            $table->string('phone');
            $table->string('email');
            $table->string('company');
            $table->string('position');
            $table->string('company_size');
            $table->string('province');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rainlab_blog_form_downloads');
    }
}
