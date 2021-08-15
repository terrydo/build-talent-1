<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseCourseUser3 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->dropColumn('invoice_id');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->integer('invoice_id');
        });
    }
}
