<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseExpert extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_expert', function($table)
        {
            $table->text('introduce');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_expert', function($table)
        {
            $table->dropColumn('introduce');
        });
    }
}
