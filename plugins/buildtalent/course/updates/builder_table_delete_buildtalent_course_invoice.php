<?php namespace Buildtalent\Course\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteBuildtalentCourseInvoice extends Migration
{
    public function up()
    {
        Schema::dropIfExists('buildtalent_course_invoice');
    }
    
    public function down()
    {
        Schema::create('buildtalent_course_invoice', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('payment_method');
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
}
