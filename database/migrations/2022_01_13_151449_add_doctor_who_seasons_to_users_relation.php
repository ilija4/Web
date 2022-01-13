<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorWhoSeasonsToUsersRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_who_season', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_who_season', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
