<?php namespace Buildtalent\Main\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBuildtalentMainGeneralSettings5 extends Migration
{
    public function up()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->text('values')->nullable();
            $table->string('display_name', 255);
            $table->increments('id')->nullable(false)->unsigned()->default(null)->change();
            $table->dropColumn('general');
            $table->dropColumn('home');
        });
    }
    
    public function down()
    {
        Schema::table('buildtalent_main_general_settings', function($table)
        {
            $table->dropColumn('values');
            $table->dropColumn('display_name');
            $table->string('id', 50)->nullable(false)->unsigned(false)->default(null)->change();
            $table->text('general')->nullable();
            $table->text('home')->nullable();
        });
    }
}
