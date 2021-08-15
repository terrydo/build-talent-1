<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseSections2 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_sections', function($table)
        {
            $table->text('document')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_sections', function($table)
        {
            $table->dropColumn('document');
        });
    }
}
