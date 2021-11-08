<?php


    require_once "../conexiones/conexionBD2.php";
    require_once __DIR__ . '/vendor/autoload.php';

    $idVenta = $_GET["id"];

    $mysqli = new mysqli('localhost', 'root', '', 'dbproyecto');

    $query = $mysqli -> query ("SELECT p.nombre, d.cantidad, p.precio_venta, d.subtotal
        FROM detalleventas d
        INNER JOIN producto p ON d.id_producto = p.id_producto
        WHERE 
        d.id_pedidos = $idVenta");

    
    $mpdf = new \Mpdf\Mpdf();

    $mpdf->AliasNbPages();

    $mpdf->SetMargins(10, 10, 10);
    $mpdf->AddPage();

    

    //------------------------------------------------------
    $mpdf->SetFont("Arial", "B", 25);
    $mpdf->Cell(70, 6, "Yosuko Delivery", 0, 1, "C");
    $mpdf->Ln(2);

    //------------------------------------------------------

    $mpdf->SetFont("Arial", "", 9);
    $mpdf->Cell(70, 6, "Calle Pepe Perez 3679", 0, 1, "C");


    //------------------------------------------------------

    $mpdf->SetFont("Arial", "", 9);
    $mpdf->Cell(70, 6, "Posadas-Misiones 3300", 0, 1, "C");


    //------------------------------------------------------


    $mpdf->SetFont("Arial", "", 9);
    $mpdf->Cell(70, 6, "Tel: 3764-548754", 0, 1, "C");
    $mpdf->Ln(15);
    
    
    //------------------------------------------------------    


    $mpdf->SetFont("Arial", "B", 11);

    $mpdf->Cell(30, 6, "N° Factura: ", 0, 0, "L");
    $mpdf->SetFont("Arial", "", 10);
    $mpdf->Cell(5, 6,"#000". $idVenta, 0, 1, "C");

    $mpdf->Ln(5);
    //------------------------------------------------------

    $fecha =date("Y-m-d");

    $mpdf->SetFont("Arial", "B", 11);
    $mpdf->Cell(30, 6, "Fecha de Emisión: ", 0, 0, "L");
    $mpdf->SetFont("Arial", "", 10);
    $mpdf->Cell(40, 6, $fecha, 0, 1, "C");

    $mpdf->Ln(5);
    //------------------------------------------------------
    $mpdf->SetFont("Arial", "B", 11);

    $mpdf->Cell(30, 6, "Cliente: ", 0, 0, "L");
    $mpdf->SetFont("Arial", "", 10);
    $mpdf->Cell(5, 6, "Consumidor Final", 0, 1, "C");

    $mpdf->Ln(5);
    //------------------------------------------------------
 
    $mpdf->SetFont("Arial", "B", 9);


    $mpdf->Cell(40, 5, "Producto", 1, 0, "C");
    $mpdf->Cell(20, 5, "Cantidad", 1, 0, "C");
    $mpdf->Cell(30, 5, "Precio Unit.", 1, 0, "C");
    $mpdf->Cell(20, 5, "Subtotal", 1, 0, "C");
    $mpdf->Cell(20, 5, "Total", 1, 1, "C");
    
    $mpdf->SetFont("Arial", "", 9);

    $total=0;
    while($fila = $query ->fetch_assoc()){

        
        $mpdf->Cell(40, 5, $fila['nombre'], 1, 0, "C");
        $mpdf->Cell(20, 5, $fila['cantidad'], 1, 0, "C");
        $mpdf->Cell(30, 5, $fila['precio_venta'], 1, 0, "C");
        $mpdf->Cell(20, 5, $fila['subtotal'], 1, 0, "C");
        $mpdf->Cell(20, 5, "$".$total += $fila['subtotal'], 1, 1, "C");
        
        
         
    
    }

    $mpdf->Ln(5);
    $mpdf->SetFont("Arial", "B", 10);
                
    $mpdf->Cell(30, 5, "Importe Total: ",0 , 0, "C");
    $mpdf->Cell(25, 5,"$" .$total, 0, 1, "C");


 

    $mpdf->Output('reporte.pdf','I');
?>
