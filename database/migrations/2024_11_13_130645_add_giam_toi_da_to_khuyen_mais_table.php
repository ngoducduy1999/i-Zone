<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('khuyen_mais', function (Blueprint $table) {
        $table->decimal('giam_toi_da', 8, 2)->nullable()->after('phan_tram_khuyen_mai');
    });
}

public function down()
{
    Schema::table('khuyen_mais', function (Blueprint $table) {
        $table->dropColumn('giam_toi_da');
    });
}
};
