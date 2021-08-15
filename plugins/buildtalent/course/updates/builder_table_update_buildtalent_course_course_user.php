<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseCourseUser extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->integer('payment_method');
            $table->integer('payment_status');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_status');
        });
    }
}
