<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatIdToNewspapers extends Migration
{
    public function up()
    {
        Schema::table('newspapers', function (Blueprint $table) {
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::table('newspapers', function (Blueprint $table) {
            $table->dropForeign(['cat_id']);
            $table->dropColumn('cat_id');
        });
    }
}
