<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourse10 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->integer('joined_user')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->integer('joined_user')->nullable(false)->change();
        });
    }
}
