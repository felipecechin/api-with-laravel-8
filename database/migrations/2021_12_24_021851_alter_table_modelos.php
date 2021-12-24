<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableModelos extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('modelos', function (Blueprint $table) {
            $table->dropForeign('modelos_marca_id_foreign');
            $table->foreign('marca_id')
                ->references('id')->on('marcas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('modelos', function (Blueprint $table) {
            $table->dropForeign('modelos_marca_id_foreign');
            $table->foreign('marca_id')
                ->references('id')->on('marcas');
        });
    }
}
