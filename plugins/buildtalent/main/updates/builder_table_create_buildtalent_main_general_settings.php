<?php namespace Buildtalent\Main\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBuildtalentMainGeneralSettings extends Migration
{
    public function up()
    {
        Schema::create('buildtalent_main_general_settings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->text('global')->nullable();
            $table->text('home')->nullable();
            $table->text('about_us')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('buildtalent_main_general_settings');
    }
}
