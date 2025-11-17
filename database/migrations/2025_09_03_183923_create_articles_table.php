<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD

            $table->date('datePublic');
            $table->string('title')->nullable();
            $table->string('image')->default('images/articles/default.jpg');
            $table->string('shortDesc');
            $table->text('desc')->nullable();

            $table->longText('content');

            $table->string('tags')->nullable();
            $table->string("status")->default("secure");

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

=======
            $table->date('datePublic');
            $table->string('title')->nullable();
            $table->string('shortDesc');
            $table->string('desc')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
>>>>>>> origin/master
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
