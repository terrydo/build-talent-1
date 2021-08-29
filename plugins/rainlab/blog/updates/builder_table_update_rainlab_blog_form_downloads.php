<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRainlabBlogFormDownloads extends Migration
{
    public function up()
    {
        Schema::table('rainlab_blog_form_downloads', function($table)
        {
            $table->integer('post_id');
        });
    }
    
    public function down()
    {
        Schema::table('rainlab_blog_form_downloads', function($table)
        {
            $table->dropColumn('post_id');
        });
    }
}
