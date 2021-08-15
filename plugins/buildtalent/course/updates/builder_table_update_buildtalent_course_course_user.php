<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseCourseUser extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->string('tracking_id', 255);
        });
    }

    public function down()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->dropIfExists('tracking_id');
        });
    }
}
