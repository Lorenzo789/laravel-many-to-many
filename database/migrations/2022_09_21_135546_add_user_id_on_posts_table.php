<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //prima creo la colonna
            $table->unsignedBigInteger('user_id')->after('id');
            //e poi la foreign key
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //prima la relazione
            $table->dropForeign('posts_user_id_foreign');
            //e poi la colonna
            $table->dropColumn('user_id');
        });
    }
}
