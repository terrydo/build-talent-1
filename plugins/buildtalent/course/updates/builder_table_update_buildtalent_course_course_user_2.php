<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseCourseUser2 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->text('learning_tracking');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->dropColumn('learning_tracking');
        });
    }
}
