<?php
    require_once 'helado.php';

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion)
    {
        case 'POST':    
            Helado::leerJSON();
            $objHelado=new Helado(-1,$_POST['sabor'],$_POST['tipo'],1,"Cucurucho",1);
            if($objHelado->buscarHelado()<0)
            {
                echo "No existe sabor o tipo.<br>";
            }
            else
            {
                echo "Si, hay stock.<br>";
            } 
            break;
        default:
            echo "ERROR, petición no esperada.<br>";
            break;
    }
?>