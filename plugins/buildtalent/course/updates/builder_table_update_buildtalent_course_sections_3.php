<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseSections3 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_sections', function($table)
        {
            $table->renameColumn('document', 'documents');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_sections', function($table)
        {
            $table->renameColumn('documents', 'document');
        });
    }
}
