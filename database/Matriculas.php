<?php

require "../app/bootstrap.php";

use App\Models\Matriculas;
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists('matriculas');
Capsule::schema()->create('matriculas', function ($table) {

    $table->string('plataforma');
    $table->string('cliente');
    $table->integer('id');
    $table->string('sscc');

    $table->timestamps();
});

$file = json_decode(file_get_contents('../storage/02_202110281102.json'));

foreach ($file->TBL_02 as $item) {
    $matriculas = new Matriculas();
    $matriculas->plataforma = $item->PLATAFORMA;
    $matriculas->cliente = $item->CLIENTE;
    $matriculas->id = $item->ID;
    $matriculas->sscc = $item->SSCC;
    $matriculas->save();

}
