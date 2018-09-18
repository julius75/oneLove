<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageTwoProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_two_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('prop_id')->unique();
            $table->foreign('prop_id')->references('proposal_id')->on('stage_one_proposals');
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
        Schema::dropIfExists('stage_two_proposals');
    }
}
