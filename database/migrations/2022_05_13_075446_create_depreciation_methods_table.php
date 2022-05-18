<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepreciationMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depreciation_methods', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name', 45);
            $table->integer('status')->nullable();
            $table->string('remarks', 45)->nullable();
            $table->string('created_by', 45)->nullable();
            $table->string('created_at', 45)->nullable();
            $table->string('updated_by', 45)->nullable();
            $table->string('updated_at', 45)->nullable();
            $table->integer('fixed_Ledger_accounts_id')->index('fk_depreciation_methods_fixed_Ledger_accounts1_idx');

            $table->primary(['id', 'fixed_Ledger_accounts_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depreciation_methods');
    }
}
