<?php 
namespace App\Librerias;

class  Funciones  { 

    public function hola(){
        return "hola";
    }    
    
    public function subir_imagen($ruta,$nombre)
        {
            $config['upload_path'] = $ruta;
            $config['allowed_types'] = "jpeg|jpeg|Png|png|jpg|JPG";
            $config['max_size'] = 51200;
            $config['file_name'] = $nombre; 
            $this->load->library('upload', $config);
				   $this->upload->initialize($config);
				   if (!$this->upload->do_upload('imagen')) { #Aquí me refiero a "foto", el nombre que pusimos en FormData
					   $error = array('error' => $this->upload->display_errors());
					  $opimagen="error";
				   } else {
					   $opimagen="ok";
                   }
                   return $opimagen;

        }

        public function generarClaveAletoria($length, $uc, $n, $sc) {
            $cadena = "abcdefghijklmnopqrstuvwxyz";
    
            if ($uc == 1) {
                $cadena.= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            }
    
            if ($n == 1) {
                $cadena.= "1234567890";
            }
    
            if ($sc == 1) {
                $cadena.= "|@#~$%()=^*+[]{}-_";
            }
    
            if ($length > 0) {
                $rstr = "";
                $cadena = str_split($cadena, 1);
    
                for ($i = 1; $i <= $length; $i++) {
                    mt_srand((double) microtime()*1000000);
                    $num = mt_rand(1, count($cadena));
                    $rstr.= $cadena[$num-1];
                }
            }
            return $rstr;
        }

        public function formatearFecha($fecha) {
            list($dia, $mes, $anio) = explode("/", $fecha);
            return $anio."-".$mes."-".$dia;
        }
    
        public function formatearFecha2($fecha) {
            list($anio, $mes, $dia) = explode("-", $fecha);
            return $dia."/".$mes."/".$anio;
        }
    
        public function borrarArchivo($ruta, $archivo) {
            if (file_exists($ruta.$archivo)) {
                unlink($ruta.$archivo);
            }
        }
    
        public function borrarImagen($ruta, $imagen) {
            if (file_exists($ruta.$imagen)) {
                unlink($ruta.$imagen);
            }
        }
    
        public function borrarImagenes($ruta, $extension) {
            switch ($extension) {
                case ".jpg":
                    if (file_exists($ruta.".png")) {
                        unlink($ruta.".png");
                    }
                    break;
                case ".png":
                    if (file_exists($ruta.".jpg")) {
                        unlink($ruta.".jpg");
                    }
                    break;
            }
        }


        public function formatearFechaLetras($fecha) {
            $fecha_separada = explode("/", $fecha);
            $dia = $fecha_separada[0];
    
            switch ($fecha_separada[1]) {
                case "01":
                    $mes = "Enero";
                    break;
                case "02":
                    $mes = "Febrero";
                    break;
                case "03":
                    $mes = "Marzo";
                    break;
                case "04":
                    $mes = "Abril";
                    break;
                case "05":
                    $mes = "Mayo";
                    break;
                case "06":
                    $mes = "Junio";
                    break;
                case "07":
                    $mes = "Julio";
                    break;
                case "08":
                    $mes = "Agosto";
                    break;
                case "09":
                    $mes = "Setiembre";
                    break;
                case "10":
                    $mes = "Octubre";
                    break;
                case "11":
                    $mes = "Noviembre";
                    break;
                case "12":
                    $mes = "Diciembre";
                    break;
                default:
                    break;
            }
            $anio = $fecha_separada[2];
            return "$dia de $mes, $anio.";
        }
    
        public function convertirMayuscula($str) {
            return strtoupper(strtolower($str));
        }
    
        public function convertirMinuscula($str) {
            return strtolower($str);
        }
    
        public function convertirPrimeraLetraMayuscula($str) {
            return ucfirst($str);
        }
    
        public function convertirEntidadesHTML($str) {
            return str_replace(array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ"),
                array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&ntilde;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Ntilde;"), $str);
        }
    
        public function convertirEntidadesHTML3($str) {
            return str_replace(array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&ntilde;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Ntilde;"),
                array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ"), $str);
        }
    
        public function convertirCaracteresFPDF($str) {
            return utf8_decode($str);
        }
    
        public function convertirCaracteresFPDF2($str) {
            return utf8_encode($str);
        }
    
        public function convertirEntidadesHTML2($str) {
            return iconv('UTF-8', 'windows-1252', html_entity_decode($str));
        }
    
        public function formatearPrecio($precio) {
            $price = preg_replace("/[^0-9\.]/", "", str_replace(',', '.', $precio));
            if (substr($price, -3, 1) == '.') {
                $decim = '.'.substr($price, -2);
                $price = substr($price, 0, strlen($price)-3);
            } 
            elseif (substr($price, -2, 1) == '.') {
                $decim = '.'.substr($price, -1);
                $price = substr($price, 0, strlen($price)-2);
            } 
            else {
                $decim = '.00';
            }
            $price = preg_replace("/[^0-9]/", "", $price);
            return number_format($price.$decim, 2, '.', ',');
        }


        public function eliminarDobleEspacio($valor) {
            $limpia = '';
            $parts = array();
            $parts = split(' ', $valor);
    
            foreach ($parts as $subcadena) {
                $subcadena = trim($subcadena);
                if ($subcadena != '') {
                    $limpia.= $subcadena." ";
                }
            }
    
            $limpia = trim($limpia);
            return $limpia;
        }
    
        public function diasTranscurridos($fechainicial, $fechafinal) {
            $dias = (strtotime($fechainicial)-strtotime($fechafinal));
            $dias = abs($dias);
            $dias = floor($dias/60/60/24);
            return $dias;
        }
    
        public function horasTranscurridos($fechainicial, $fechafinal) {
            $horas = (strtotime($fechainicial)-strtotime($fechafinal));
            $horas = abs($horas);
            $horas = floor($horas/60/60);
            return $horas;
        }
    
        public function minutosTranscurridos($fechainicial, $fechafinal) {
            $minutos = (strtotime($fechainicial)-strtotime($fechafinal))/60;
            $minutos = abs($minutos);
            $minutos = floor($minutos);
            return $minutos;
        }
    
        public function validarEmail($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
            return true;
        }
    
        public function obtenerFecha() {
            $this->_fecha = date('d/m/Y');
            return $this->_fecha;
        }
    
        public function obtenerHora() {
            $this->_hora = date('H:i:s');
            return $this->_hora;
        }
    
        public function obtenerFechaServidor() {
            $this->_fecha = date('d/m/Y H:i:s');
            return $this->_fecha;
        }
    
        public function obtenerAnio() {
            $this->_anio = date('Y');
            return $this->_anio;
        }
    
        public function eliminarTilde($cadena) {
            $contilde = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
            $sintilde = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
            $texto = str_replace($contilde, $sintilde, $cadena);
            return $texto;
        }
    
        public function calcularEdad($fechanacimiento) {
            list($Y, $m, $d) = explode("-", $fechanacimiento);
            return (date("md") < $m.$d?date("Y")-$Y-1:date("Y")-$Y);
        }
    
    
}