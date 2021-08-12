<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBuildtalentCourseCourseUser extends Migration
{
    public function up()
    {
        Schema::create('buildtalent_course_course_user', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('course_id');
            $table->integer('user_id');
            $table->integer('invoice_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildtalent_course_course_user');
    }
}
