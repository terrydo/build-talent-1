<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentCourseCourseUser2 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->string('payment_method', 10)->nullable(false)->unsigned(false)->default(null)->change();
            $table->integer('payment_status')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_course_course_user', function($table)
        {
            $table->integer('payment_method')->nullable(false)->unsigned(false)->default(null)->change();
            $table->integer('payment_status')->default(null)->change();
        });
    }
}
