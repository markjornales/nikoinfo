<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tproducts', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->date("expiry_date");
            $table->float("price", 8, 2);
            $table->string("unit");
            $table->integer("available_inventory");
            $table->text("product_image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tproducts');
    }
};
