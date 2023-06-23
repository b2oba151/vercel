<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->enum('vers', ['mali', 'maroc']);
            $table->decimal('envoye');
            $table->decimal('recu');
            $table->decimal('frais');
            $table->decimal('taux');
            $table->decimal('charges')->nullable();
            $table->enum('statut', ['effectue', 'attente', 'annulle']);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
