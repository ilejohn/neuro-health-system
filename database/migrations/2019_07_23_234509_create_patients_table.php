<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phoneNumber')->nullable();
            $table->string('passport')->default('null.jpg');
            $table->string('scan')->default('null.jpg');
            $table->integer('age');
            $table->string('sex');
            $table->string('mul-preg');
            $table->string('ill-preg');
            $table->string('typ-ill')->nullable();
            $table->string('med-preg');
            $table->string('typ-med')->nullable();
            $table->string('herb-mix');
            $table->string('typ-herb')->nullable();
            $table->string('exp-rad');
            $table->string('bleed');
            $table->string('loss-wat');
            $table->string('anything');
            $table->text('any-describe')->nullable();
            $table->string('urinary');
            $table->string('admit');
            $table->string('neu-deform');
            $table->string('dis-fam')->nullable();
            $table->string('side-deform')->nullable();
            $table->integer('age-ill');
            $table->string('med-apply');
            $table->string('treat-meth')->nullable();
            $table->string('pat-think');
            $table->string('response')->nullable();
            $table->string('reaction')->nullable();
            $table->string('trauma');
            $table->string('assoc-deform');
            $table->text('deform-describe')->nullable();
            $table->text('cli-exam');
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
        Schema::dropIfExists('patients');
    }
}
