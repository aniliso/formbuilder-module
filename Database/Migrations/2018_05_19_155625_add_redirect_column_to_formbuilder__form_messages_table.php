<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRedirectColumnToFormbuilderFormMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formbuilder__form_messages', function (Blueprint $table) {
            $table->string('redirect_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formbuilder__form_messages', function (Blueprint $table) {
            $table->dropColumn('redirect_to');
        });
    }
}
