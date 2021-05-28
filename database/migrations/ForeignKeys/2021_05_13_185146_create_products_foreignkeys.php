<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('product_specs', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
            $table->foreignId('category_spec_id')->constrained();
        });

        Schema::table('product_options', function (Blueprint $table) {
            $table->foreignId('product_spec_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_option_id')->constrained();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
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
