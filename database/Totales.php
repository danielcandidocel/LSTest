<?php

require "../app/bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Totales;

Capsule::schema()->dropIfExists('totales');
Capsule::schema()->create('totales', function ($table) {

    $table->increments('id');
    $table->string('plataforma');
    $table->string('cliente');
    $table->string('articulo');
    $table->integer('tot_stock');
    $table->integer('total_lineas');

    $table->timestamps();
});

$file = json_decode(file_get_contents('../storage/00_202110281102.json'));

foreach ($file->TBL_00 as $item) {
    $totales = new Totales();
    $totales->plataforma = $item->PLATAFORMA;
    $totales->cliente = $item->CLIENTE;
    $totales->articulo = $item->ARTICULO;
    $totales->tot_stock = $item->TOT_STOCK;
    $totales->total_lineas = $item->TOTAL_LINEAS;
    $totales->save();
}
