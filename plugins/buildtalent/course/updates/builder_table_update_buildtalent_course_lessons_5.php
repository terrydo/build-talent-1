<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseLessons5 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_lessons', function($table)
        {
            $table->string('video')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_lessons', function($table)
        {
            $table->dropColumn('video');
        });
    }
}
