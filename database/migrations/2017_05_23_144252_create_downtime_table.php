<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDowntimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downtime', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });

        Schema::table('sites', function (Blueprint $table) {
            $table->timestamp('down_from')->nullable()->after('checked_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downtime');

        Schema::table('sites', function (Blueprint $table) {
            $table->dropColumn('down_from');
        });
    }
}
