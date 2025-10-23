<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('urgencies', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('color');

        });
        Schema::table('task',function (Blueprint $table){

           $table->foreignId('urgency_id')->nullable()->constrained('urgencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('task', function (Blueprint $table){
            $table->dropColumn('urgency_id');
      
        });
        Schema::dropIfExists('urgencies');
    }
};
