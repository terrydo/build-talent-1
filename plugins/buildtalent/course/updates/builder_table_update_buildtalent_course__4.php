<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourse4 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->text('excerpt')->nullable();
            $table->string('author')->nullable();
            $table->smallInteger('category_id');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_', function($table)
        {
            $table->dropColumn('excerpt');
            $table->dropColumn('author');
            $table->dropColumn('category_id');
        });
    }
}
