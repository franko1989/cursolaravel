<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('imagenes', function (Blueprint $table) {
            $table->string('ruta')->nullable()->after('nombre');
        });
    }

    public function down()
    {
        Schema::table('imagenes', function (Blueprint $table) {
            $table->dropColumn('ruta');
        });
    }
};
