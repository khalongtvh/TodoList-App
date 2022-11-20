<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cards', function (Blueprint $table) {
      // $table->id();
      $table->foreignId('task_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
      $table->string('title');
      $table->date('dates');
      $table->int('status');
      $table->string('background');
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
    Schema::dropIfExists('cards');
  }
}
