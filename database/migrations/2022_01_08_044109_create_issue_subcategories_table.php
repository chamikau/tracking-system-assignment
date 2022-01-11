<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('issue_id');
            $table->foreignId('subcategory_id');
            $table->foreign('issue_id')->references('id')->on('issues');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories');
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
        Schema::dropIfExists('issue_subcategories');
    }
}
