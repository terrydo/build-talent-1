<?php namespace Buildtalent\Main\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentMainGeneralSettings extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->string('id', 50);
            $table->dropColumn('global');
            $table->dropColumn('home');
            $table->dropColumn('about_us');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->dropPrimary(['id']);
            $table->dropColumn('id');
            $table->text('global')->nullable();
            $table->text('home')->nullable();
            $table->text('about_us')->nullable();
        });
    }
}
