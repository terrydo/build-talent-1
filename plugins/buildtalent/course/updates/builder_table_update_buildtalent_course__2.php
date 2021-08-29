<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourse2 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->decimal('average_rating', 10, 2)->nullable()->unsigned(false)->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->integer('average_rating')->nullable()->unsigned(false)->default(0)->change();
        });
    }
}
