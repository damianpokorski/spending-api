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
            $table->string('display_name');
            $table->string('photo_url', 512);
            $table->string('currency');
            $table->text('auth_token');
        });

        // Regular spending table - for rent, bills etc.
        Schema::create('expense', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('recurrence', ['none', 'weekly', 'monthly', 'querterly', 'yearly']);
            $table->boolean('necessary');
            $table->text('details');
            $table->decimal('delta');
            // Foreign keys
            $table->bigInteger('user_id');
            $table->bigInteger('vendor_id')->nullable(true);
        });

        // Spending Vendors, e.g. Amazon, Ebay, Asda ETC ETC
        Schema::create('vendor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // Foreign keys
            $table->bigInteger('user_id');
        });

        // Spending Label, e.g. Entertainment or Groceries
        Schema::create('label', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // Foreign keys
            $table->bigInteger('user_id');
        });

        // Pivot table
        Schema::create('expense_label', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // Foreign keys
            $table->bigInteger('expense_id');
            $table->bigInteger('label_id');
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
        Schema::dropIfExists('expense');
        Schema::dropIfExists('vendor');
        Schema::dropIfExists('label');
        Schema::dropIfExists('expense_label');
    }
}
