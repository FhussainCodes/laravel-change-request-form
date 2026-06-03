<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('change_requests', function (Blueprint $table) {
            $table->id('request_no');
        //   $table->string('request_no'); 
            $table->string('project_module');
            $table->string('department');
            $table->string('requested_by');
            $table->string('priority');
            $table->text('problem_statement');
            $table->string('decision')->nullable();
            $table->text('comments')->nullable();
            $table->string('request_type');
            $table->string('change_type');
            $table->string('assigned_to')->nullable();
            $table->date('assigned_date')->nullable();
            $table->string('assigned_by')->nullable();
            $table->string('uat_by')->nullable();
            $table->string('version')->nullable();
            $table->string('deployed_by')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('change_requests');
    }
};
