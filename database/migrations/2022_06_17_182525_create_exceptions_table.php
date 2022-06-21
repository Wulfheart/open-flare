<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class CreateExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('exceptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->uuid('tracking_uuid');
            $table->string('notifier');
            $table->string('language');
            $table->string('framework_version');
            $table->string('language_version');
            $table->string('exception_class');
            $table->dateTime('seen_at');
            $table->text('message');
            $table->string('stage');
            $table->string('message_level')->nullable();
            $table->string('application_version')->nullable();
            $table->string('user_id')->nullable();
            $table->json('context');
            $table->string('similarity_hash');
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
        Schema::dropIfExists('exceptions');
    }
}
