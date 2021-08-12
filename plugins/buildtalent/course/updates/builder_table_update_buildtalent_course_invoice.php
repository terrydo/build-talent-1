<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseInvoice extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_invoice', function($table)
        {
            $table->boolean('status')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_invoice', function($table)
        {
            $table->integer('status')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
