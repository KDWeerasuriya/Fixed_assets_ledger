<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDepreciationMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depreciation_methods', function (Blueprint $table) {
            $table->foreign(['fixed_Ledger_accounts_id'], 'fk_depreciation_methods_fixed_Ledger_accounts1')->references(['id'])->on('fixed_ledger_accounts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depreciation_methods', function (Blueprint $table) {
            $table->dropForeign('fk_depreciation_methods_fixed_Ledger_accounts1');
        });
    }
}
