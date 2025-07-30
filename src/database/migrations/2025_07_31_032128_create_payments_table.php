<?php

// database/migrations/xxxx_xx_xx_create_payments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Vehicle;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vehicle::class);
            $table->timestamp('entry_time');
            $table->timestamp('exit_time')->nullable();
            $table->decimal('fee', 10, 2)->nullable();
            $table->enum('method', ['cash', 'Card', 'ewallet'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};



