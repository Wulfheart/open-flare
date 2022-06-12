<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->foreignUuid('project_id')->constrained();
            $table->uuid('tracking_uuid')->nullable();
            $table->string('notifier')->nullable();
            $table->string('language')->nullable();
            $table->string('framework_version')->nullable();
            $table->string('language_version')->nullable();
            $table->string('exception_class')->nullable();
            $table->dateTime('seen_at')->nullable();
            $table->string('message')->nullable();
            $table->string('stage')->nullable();
            $table->string('message_level')->nullable();
            $table->string('application_version')->nullable();
            $table->string('git_hash')->nullable();
            $table->string('git_message')->nullable();
            $table->string('git_tag')->nullable();
            $table->string('git_remote')->nullable();
            $table->boolean('git_isDirty')->nullable();
            $table->json('session')->nullable();
            $table->json('cookies')->nullable();
            $table->json('route')->nullable();
            $table->json('env')->nullable();
            $table->json('request')->nullable();
            $table->json('request_data_query_string')->nullable();
            $table->json('request_data_body')->nullable();
            $table->json('request_data_files')->nullable();
            $table->json('headers')->nullable();
            $table->string('user_id')->nullable();
            $table->json('user')->nullable();
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
