<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStacktracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('stacktraces', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('exception_id')->constrained();
            $table->string('ordinal_number');
            $table->string('file');
            $table->string('line_number');
            $table->string('method');
            $table->string('class');
            $table->json('code_snippet');
            $table->string('application_frame');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stacktraces');
    }
}
