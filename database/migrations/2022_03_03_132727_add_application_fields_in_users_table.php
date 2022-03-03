<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApplicationFieldsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Creating applicant's information columns
            $table->string("social_url")->nullable($value = true); 
            $table->text("cover_letter")->nullable($value = true); 
            $table->string("resume_path")->nullable($value = true); 
            $table->enum("application_status", ['Pending_review', 'Ready_to_interview', 'Archived'])->nullable($value = true);
            $table->boolean("is_admin")->default($value = false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('social_url');
            $table->dropColumn('cover_letter');
            $table->dropColumn('resume_path');
            $table->dropColumn('application_status');
            $table->dropColumn('is_admin');

        });
    }
}
