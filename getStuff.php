<?php
function getHome()
{
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="' . BASE_URL . '">
        <title>Figuras</title>
    </head>
    <body>
    
        <h1>Figuras</h1>
    
        <a href="listar">Ver todas las figuras geométricas</a>
    
    
        <h4> <h4>
        <form action="filter" method="GET">
            <label for="area">Buscar figuras con área menor a: </label>
            <input id="area" type="number" name="area" placeholder="Introduzca área...">
            <button type="submit">Buscar</button>
        </form>
        
    </body>
    </html>';
    echo ($html);
}
function getList()
{

    // instancia la clase Figuras para acceder a las figuras
    $figuras = new Figuras();

    echo
        "<h1>Listado de figuras</h1>
    <ul>";

    foreach ($figuras->getAll() as $figura) {
        echo "<li>" .
            $figura->ToString() .
            " | <a href='detalle/" . $figura->getId() . "'>VER </a>" .
            "</li>";
    }

    echo "
    </ul>
    <a href='./'>Volver</a>";
}
function getFiltered($area){

    // instancio la clase Figuras para trabajar con las figuras del sistema
    $figuras = new Figuras();
    
    echo "Las figuras con area menor a $area son:<ul>";
    foreach($figuras->getBy(new AreaFilter($area)) as $figura) {
        echo "<li>" . 
                $figura->ToString() . 
                " | <a href='detalle/". $figura->getId() . "'>VER </a>" .
             "</li>";
    }
    echo "
        </ul>
        <a href='./'>Volver</a>";
}
function getDetailed($id){

    // instancia la clase Figuras para acceder a las figuras
    $figuras = new Figuras();
    
    // obtiene la figura según el ID pasado como parámetro
    $figura = $figuras->get($id);
    
    // imprime el detalle de la figura
    echo 
        "<ul>
            <li><strong>ID: </strong>" . $figura->getId() . "</li>
            <li><strong>Tipo: </strong>" . $figura->getName() . "</li>
            <li><strong>Perímetro: </strong>" . $figura->getPerimetro() . "</li>
            <li><strong>Área: </strong>" . $figura->getArea() . "</li>
        </ul>";
    
}