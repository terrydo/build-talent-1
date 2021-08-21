<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseCourseUser6 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->text('learning_tracking')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->text('learning_tracking')->nullable(false)->change();
        });
    }
}
