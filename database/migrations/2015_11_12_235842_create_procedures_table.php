<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {

            # Increments method will make a Primary, Auto-Incrementing field.
            # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();
            $table->date('date');
            $table->string('title');
            $table->text('symptoms');
            $table->text('comments');

            # Add a new INT field called `animal_id` that has to be unsigned (i.e. positive)
            $table->integer('animal_id')->unsigned();

            # This field `animal_id` is a foreign key that connects to the `id` field in the `animals` table
            $table->foreign('animal_id')->references('id')->on('animals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('procedures');
    }
}
