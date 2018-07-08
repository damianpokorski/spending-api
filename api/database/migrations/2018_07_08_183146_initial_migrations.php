<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('currency');
        });

        // Regular spending table - for rent, bills etc.
        Schema::create('spending_regular', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('recurrence', ['weekly', 'monthly', 'querterly', 'yearly']);
            $table->bigInteger('user_id');
            $table->bigInteger('spending_vendor_id')->nullable(true);
            $table->bigInteger('spending_type_id')->nullable(true);
            $table->bigInteger('spending_subtype_id')->nullable(true);
            $table->boolean('necessary');
            $table->string('label');
            $table->string('details');
            $table->decimal('delta');
        });

        // Irregular Spending table - for groceries, heavy drinking etc.
        Schema::create('spending_irregular', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('spending_vendor_id')->nullable(true);
            $table->bigInteger('spending_type_id')->nullable(true);
            $table->bigInteger('spending_subtype_id')->nullable(true);
            $table->boolean('necessary');
            $table->string('label');
            $table->string('details');
            $table->decimal('delta');
        });

        // Spending Vendors, e.g. Amazon, Ebay, Asda ETC ETC
        Schema::create('spending_vendor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        // Spending type, e.g. Entertainment or Groceries
        Schema::create('spending_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        // Spending type, e.g. Entertainment or Groceries
        Schema::create('spending_subtype', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('users');
        Schema::dropIfExists('regular_spending');
        Schema::dropIfExists('spending_irregular');
        Schema::dropIfExists('spending_vendor');
        Schema::dropIfExists('spending_type');
        Schema::dropIfExists('spending_subtype');
    }
}
