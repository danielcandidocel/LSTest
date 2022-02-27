<?php

require "../app/bootstrap.php";

use App\Models\Detalles;
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists('detalles');
Capsule::schema()->create('detalles', function ($table) {

    $table->string('plataforma');
    $table->string('cliente');
    $table->string('articulo');
    $table->string('almacen');
    $table->string('ubicacion');
    $table->integer('id');
    $table->string('lote');
    $table->integer('unidades');

    $table->timestamps();
});

$file = json_decode(file_get_contents('../storage/01_202110281100.json'));

foreach ($file->TBL_01 as $item) {
    $detalles = new Detalles();
    $detalles->plataforma = $item->PLATAFORMA;
    $detalles->cliente = $item->CLIENTE;
    $detalles->articulo = $item->ARTICULO;
    $detalles->almacen = $item->ALMACEN;
    $detalles->ubicacion = $item->UBICACION;
    $detalles->id = $item->ID;
    $detalles->lote = $item->LOTE;
    $detalles->unidades = $item->UNIDADES;
    $detalles->save();
}
