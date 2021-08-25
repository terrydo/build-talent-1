<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBuildtalentCourseEnterprise extends Migration
{
    public function up()
    {
        Schema::create('buildtalent_course_enterprise', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('logo');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildtalent_course_enterprise');
    }
}
