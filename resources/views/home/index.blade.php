@extends('layouts.app')

@section('content')

    {{--<div class="topnav" id="myTopnav">--}}
        {{--<a href="#home" class="active">Identificación Personal</a>--}}
        {{--<a href="#news">Formación Académica</a>--}}
        {{--<a href="#contact">Ingreso o Reingreso</a>--}}
        {{--<a href="#about">Trayectoria Laboral</a>--}}
        {{--<a href="#">Asignaciones e incentivos temporales, retenciones judiciales y pagos indebidos</a>--}}
        {{--<a href="#">Retiro y régimen pensionario</a>--}}
        {{--<a href="#">Permisos y estímulos</a>--}}
        {{--<a href="#">Sanciones</a>--}}
        {{--<a href="#">Licencias y Vacaciones</a>--}}
        {{--<a href="#">Otros</a>--}}
    {{--</div>--}}

@endsection

@section('styles')
    <style>
        /* Add a black background color to the top navigation */
        .topnav {
            background-color: #333;
            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #fff;
            color: black;
        }

        /* Hide the link that should open and close the topnav on small screens */
        .topnav .icon {
            display: none;
        }
    </style>
@endsection