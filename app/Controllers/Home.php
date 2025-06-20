<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function inicio(){
        echo view('Views\header.php');
        echo view('Views\index.php');
        echo view('Views\footer.php');
    }

    public function quienes(){
        echo view('Views\header.php');
        echo view('Views\quienesSomos.php');
        echo view('Views\footer.php');
    }

    public function contacto(){
        echo view('Views\header.php');
        echo view('Views\contactos.php');
        echo view('Views\footer.php');  
    }
    
    public function termino(){
        echo view('Views\header.php');
        echo view('Views\terminoss.php');
        echo view('Views\footer.php');
    }

    public function comercializaciones(){
        echo view('Views\header.php');
        echo view('Views\comercializacionn.php');
        echo view('Views\footer.php');
    }

    public function registro(){
        echo view('Views\header.php');
        echo view('Views\register.php');
        echo view('Views\footer.php');
    }    

    public function login(){
        echo view('Views\header.php');
        echo view('Views\login.php');
        echo view('Views\footer.php');
    } 

    public function producto(){
        echo view('Views\header.php');
        echo view('Views\productos.php');
        echo view('Views\footer.php');
    }
}