<?php
//carrega as categorias do banco para o index
require 'database.php';

$categorias = DBRead('categoria',null,'catnome');

  foreach($categorias as $key => $values){
    echo "<a class='dropdown-item' href='index.html'>{$values['catnome']}</a>";
  }

?>