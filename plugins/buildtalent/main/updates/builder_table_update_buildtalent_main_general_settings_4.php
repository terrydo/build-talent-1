<?php namespace Buildtalent\Main\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentMainGeneralSettings4 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->text('home')->nullable();
            $table->renameColumn('values', 'general');
            $table->dropColumn('display_name');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->dropColumn('home');
            $table->renameColumn('general', 'values');
            $table->string('display_name', 255);
        });
    }
}
