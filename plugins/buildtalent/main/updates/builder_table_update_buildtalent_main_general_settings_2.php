<?php namespace Buildtalent\Main\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentMainGeneralSettings2 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->text('values')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->dropColumn('values');
        });
    }
}
