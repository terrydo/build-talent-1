<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseSections extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_sections', function($table)
        {
            $table->integer('course_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_sections', function($table)
        {
            $table->integer('course_id')->nullable(false)->change();
        });
    }
}
