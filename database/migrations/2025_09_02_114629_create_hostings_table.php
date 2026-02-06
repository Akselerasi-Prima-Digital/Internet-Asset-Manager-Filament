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
        Schema::create('hostings', function (Blueprint $table) {
            $table->uuid()->primary()->unique();
            $table->string('package_name');
            $table->string('main_domain');
            $table->string('server_ip');
            $table->string('username')->nullable();
            $table->text('password')->nullable();
            $table->foreignUuid('provider_id')->references('uuid')->on('providers')->onDelete('restrict');
            $table->date('purchase_date');
            $table->date('expiry_date');
            $table->decimal('renewal_cost', 10, 2);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostings');
    }
};
