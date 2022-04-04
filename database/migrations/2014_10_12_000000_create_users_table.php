<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('marital_id')->unsigned()->nullable();
            $table->bigInteger('family_id')->unsigned()->nullable();
            $table->bigInteger('family_c_id')->unsigned()->nullable();
            $table->bigInteger('rt_id')->unsigned()->nullable();

            // Auth
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            // Personal Data
            $table->string('profile')->nullable();
            $table->bigInteger('no_kk')->nullable();
            $table->bigInteger('nik')->unique()->nullable();
            $table->string('fullname', 100)->nullable();
            $table->string('phone_number', 20)->unique()->nullable();
            $table->string('place_of_birth', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ["Laki - Laki", "Perempuan"])->nullable();
            $table->string('religion', 30)->nullable();
            $table->string('education', 50)->nullable();
            $table->text('detail_address')->nullable();
            $table->enum('house_type', ["Milik Pribadi", "Bukan Milik Pribadi"])->nullable();
            $table->enum('disabilitas', ["Iya", "Tidak"])->nullable();
            $table->string('profession', 150)->nullable();
            $table->enum('level', ["Administrator", "RT", "User"])->nullable();
            $table->tinyInteger('is_complete')->default(0);

            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
