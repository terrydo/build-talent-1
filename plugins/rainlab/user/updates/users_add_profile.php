<?php namespace RainLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UsersAddProfile extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->boolean('sex')->nullable();
            $table->text('phone')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('sex');
            $table->dropColumn('phone');
        });
    }
}
