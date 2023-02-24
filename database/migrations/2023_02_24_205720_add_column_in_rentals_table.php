<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {

            $table->dateTime('start_date')->nullable(false);
            $table->dateTime('end_date')->nullable(false);
            $table->dateTime('effective_end_date')->nullable();
            $table->float('daily_value')->nullable(false);
            $table->integer('km_initial')->nullable(false);
            $table->integer('km_final')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->
                references('id')->on('clients')->onDelete('cascade');

            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->
                references('id')->on('vehicles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign('rentals_client_id_foreign');
            $table->dropForeign('rentals_vehicle_id_foreign');

            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('effective_end_date');
            $table->dropColumn('daily_value');
            $table->dropColumn('km_initial');
            $table->dropColumn('km_final');
            $table->dropColumn('client_id');
            $table->dropColumn('vehicle_id');
            //
        });
    }
};
