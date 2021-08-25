<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseEnterprise extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_enterprise', function($table)
        {
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_enterprise', function($table)
        {
            $table->dropColumn('name');
        });
    }
}
