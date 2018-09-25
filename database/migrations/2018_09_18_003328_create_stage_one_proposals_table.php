<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageOneProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_one_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('proposal_id')->unique();
            $table->foreign('proposal_id')->references('id')->on('proposals');
            $table->string('organization_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');

            $table->string('submitted_by_name');
            $table->string('title_organization');
            $table->string('summary');
            $table->string('background');
            $table->string('activities');
            $table->string('budget');
            $table->string('status')->default('not approved');
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
        Schema::dropIfExists('stage_one_proposals');
    }
}
