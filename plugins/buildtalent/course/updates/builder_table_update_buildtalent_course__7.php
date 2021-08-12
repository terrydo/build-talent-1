<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourse7 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->string('video_intro')->nullable();
            $table->integer('price_before_discount')->nullable();
            $table->string('include_in_course')->nullable();
            $table->text('reward')->nullable();
            $table->text('requirements')->nullable();
            $table->integer('joined_user')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->dropColumn('video_intro');
            $table->dropColumn('price_before_discount');
            $table->dropColumn('include_in_course');
            $table->dropColumn('reward');
            $table->dropColumn('requirements');
            $table->dropColumn('joined_user');
        });
    }
}
