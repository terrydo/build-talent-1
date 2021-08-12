<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseInvoice2 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_invoice', function($table)
        {
            $table->boolean('status')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_invoice', function($table)
        {
            $table->boolean('status')->default(null)->change();
        });
    }
}
