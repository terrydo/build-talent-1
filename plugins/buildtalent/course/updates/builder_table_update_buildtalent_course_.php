<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourse extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
