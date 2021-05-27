<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained();
        });

        Schema::table('category_specs', function (Blueprint $table) {
            $table->foreignId( 'category_id')->constrained();
        });

        Schema::table('category_options', function (Blueprint $table) {
            $table->foreignId('category_spec_id')->constrained();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
