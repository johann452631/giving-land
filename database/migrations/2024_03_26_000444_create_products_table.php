<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('purpose');
            $table->string('location');
            $table->text('images');
            $table->timestamps();
        });
        $modelProduct1 = new Product();
        $modelProduct1->name = "Producto 1";
        $modelProduct1->description = "Este es un producto que será vendido a lo que sea bla bla bla";
        $modelProduct1->purpose = "Donación";
        $modelProduct1->location = "Popayán";
        $modelProduct1->images = "articulo_1.jpg";
        $modelProduct1->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
