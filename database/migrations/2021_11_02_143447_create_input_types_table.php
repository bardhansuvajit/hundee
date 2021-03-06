<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInputTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('demo');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            ['name' => 'text', 'demo' => '<input type="text">'],
            ['name' => 'email', 'demo' => '<input type="email">'],
            ['name' => 'number', 'demo' => '<input type="number">'],
            ['name' => 'date', 'demo' => '<input type="date">'],
            ['name' => 'time', 'demo' => '<input type="time">'],
            ['name' => 'file', 'demo' => '<input type="file">'],
            ['name' => 'select', 'demo' => '<select><option>something here</option><option>something here</option></select>'],
            ['name' => 'checkbox', 'demo' => '<input type="checkbox"> something here'],
            ['name' => 'radio', 'demo' => '<input type="radio"> something here'],
            ['name' => 'textarea', 'demo' => '<textarea></textarea>'],
        ];

        DB::table('input_types')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_types');
    }
}
