<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourse8 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
