<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reporte extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Modelopdf');
        $this->load->library('Pdf');                
    }    

    public function excelClientePlanilla_lista() {
        $nombreArchivo = $_GET['nombreArchivo'];            
        
        $this->pdf = new Pdf();
        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();

        //margenes
        $this->pdf->SetMargins(5, 30, 20);

        $p = $this->Modelopdf->traerDatosNombre($nombreArchivo)->result();  
        
        $fecha = "";
        foreach ($p as $fila) {
            $fecha = $fila->FechaEntrega;
        }

        // Agregamos una página horizontal sin nada en entre parentesis es vertical
        $this->pdf->AddPage('L','A4');
        //HEADER
        $this->pdf->SetFont('Arial', '', 8);
        $this->pdf->Text(20, 14, '              LinaExpress', 0, 'C', 0);
        $this->pdf->Text(24, 17, 'Departamento de Gestion', 0, 'C', 0);
        #$this->pdf->Text(26, 20, 'Remuneraciones', 0, 'C', 0);
        $this->pdf->Ln(3);
        $this->pdf->Image('FOTOS/elpdf.jpg', 250, 5, 40);
        $this->pdf->SetFont('Arial', 'B', 13);
        $this->pdf->Cell(30);
        $this->pdf->Cell(220, 10, 'Lista Cartas', 0, 0, 'C');
        $this->pdf->Ln(5);
        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(30);
        $this->pdf->Cell(220, 10, 'INFORMACION DE LAS CARTAS CON FECHA: '.$fecha, 0, 0, 'C');
        $this->pdf->Ln(7);
        $depto='Cobranza';            
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Cell(0, 6, '', 0, 1);
        #$this->pdf->Cell(0, 6, 'Datos de busqueda: Por departamento', 0, 1);            
        #$this->pdf->Cell(0, 6, 'Nombre Departamento: ' . $depto , 0, 1);
        $this->pdf->Ln(4);
    //grilla
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->SetFillColor(0, 98, 147); //color de la cenlda        
        $this->pdf->SetTextColor(255); //color del texto
        //definir ancho de cada columna
        $posicionX= $this->pdf->GetX();
        $posicionY = $this->pdf->GetY();
        $this->pdf->Cell( 30, 20, $this->pdf->Image('codigBarra/22codigo.gif',$posicionX,$posicionY,30,5), 0, 0, 'L');    
        $this->pdf->SetWidths(array(15, 30, 18,25,75,40,25,15));
        for ($i = 0; $i < 1; $i++) {
            //encabezado de la grilla
            $this->pdf->Row(array(
                                'Codigo',                                 
                                'Tipo Carta',
                                'N Carta',
                                'RIT',
                                'Nombre Receptor',
                                'Direccion',
                                'Ciudad',
                                'Destino'));            
        }
        
        $c = 0;  
        $f = 60;
        foreach ($p as $fila) {           
            $posicionX= $this->pdf->GetX();
            $posicionY = $this->pdf->GetY();
            $f++;
            $c++;                  
            $this->pdf->SetFont('Arial', '', 10);                
            //contenido de cada celda
            $this->pdf->Cell( 30, 20, $this->pdf->Image($fila->RutaCode.$fila->Id_Excel.'codigo.jpg',$posicionX,$posicionY,30,5), 0, 0, 'L');                            
            #$this->pdf->Image('codigBarra/2codigo.gif',$posicionX,$posicionY,30,5);            
            if ($c % 2 == 1) {                
                #$this->pdf->SetFillColor(245, 228, 9);
                $this->pdf->SetFillColor(2455,255, 255);
                $this->pdf->SetTextColor(0);                                 
                $this->pdf->Row(array(
                                    $fila->Id_Excel,                                    
                                    $fila->TipoCarta,
                                    $fila->N_Carta,
                                    $fila->Rit,
                                    $fila->NombreReceptor,
                                    $fila->Direccion,
                                    $fila->Ciudad,
                                    $fila->TipoDestino));
            } else {
                #$this->pdf->SetFillColor(246, 158, 42);
                $this->pdf->SetFillColor(2455,255, 255);
                $this->pdf->SetTextColor(0);
                $this->pdf->Row(array(
                                    $fila->Id_Excel,                                    
                                    $fila->TipoCarta,
                                    $fila->N_Carta,
                                    $fila->Rit,
                                    $fila->NombreReceptor,
                                    $fila->Direccion,
                                    $fila->Ciudad,
                                    $fila->TipoDestino));
            }
        }
        

        /*
         * Se manda el pdf al navegador
         *
         * $this->pdf->Output(nombredelarchivo, destino);
         *
         * I = Muestra el pdf en el navegador
         * D = Envia el pdf para descarga
         *
         */
        $fecha = date("Y"). "-". date("m") . "-" . date("d")." ". date("h").":". date("m").":00";
        $this->pdf->Output("PlanillaCartas".$fecha.".pdf", 'I');
    }

    
}