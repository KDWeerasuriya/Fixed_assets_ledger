<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToControllerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controller_accounts', function (Blueprint $table) {
            $table->foreign(['category_name_id'], 'fk_controller_accounts_category_names')->references(['id'])->on('category_names')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controller_accounts', function (Blueprint $table) {
            $table->dropForeign('fk_controller_accounts_category_names');
        });
    }
}
