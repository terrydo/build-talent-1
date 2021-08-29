<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourse3 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->decimal('average_rating', 10, 1)->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->decimal('average_rating', 10, 2)->change();
        });
    }
}
