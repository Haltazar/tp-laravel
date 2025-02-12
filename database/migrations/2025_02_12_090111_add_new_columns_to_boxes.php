<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToBoxes extends Migration
{
    public function up()
    {
        Schema::table('boxes', function (Blueprint $table) {
            $table->string('name')->default('Box'); // Nom par défaut
        });
    }

    public function down()
    {
        Schema::table('boxes', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'daily_price',
                'status',
                'ref',
                'weekly_price',
                'monthly_price'
            ]);
        });
    }
}
