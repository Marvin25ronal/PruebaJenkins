<?php
class Compartir{
  public function CompartirGrafica($correos,$grafica,$contenido){
    $data = explode(',', $grafica);
    $content = base64_decode($data[1]);

    $file = fopen("imagen.png", "wb");
    fwrite($file, $content);
    fclose($file);
    $listacorreos = explode(",", $correos);
    $nombre = "Sistema de Votaciones en Linea USAC";
    $correox = "ingenieria.analisisydiseno@gmail.com";
    $filename="imagen.png";
    $file = "./imagen.png";
    $content = file_get_contents( $file);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);

    // header
    $header = "From: ".$nombre." <".$correox.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

    // message & attachment
    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $contenido."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
    $exacto=false;
    for($i=0;$i<count($listacorreos);$i++){
      $exacto=mail($listacorreos[$i],"Se compartio informacion",$nmessage,$header);
      if($exacto==false){return $exacto;}
    }
    return $exacto;
  }
  public function CompartirCandidato($correos,$grafica,$nombred,$informacion,$contenido){

    $listacorreos = explode(",", $correos);
    $nombre = "Sistema de Votaciones en Linea USAC";
    $correox = "ingenieria.analisisydiseno@gmail.com";
    $filename=$grafica;
    $file = $grafica;
    $content = file_get_contents( $file);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);

    // header
    $header = "From: ".$nombre." <".$correox.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

    // message & attachment

    $contenidopersonalizado="El nombre de candidato ".$nombred."\r\n\r\n";
    $contenidopersonalizado.="Informacion: \r\n\r\n".$informacion."\r\n\r\n";
    $contenidopersonalizado.="-----------------------------------------\r\n\r\n";
    $contenidopersonalizado.=$contenido;

    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $contenidopersonalizado."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
    $exacto=false;
    for($i=0;$i<count($listacorreos);$i++){
      $exacto=mail($listacorreos[$i],"Se compartio informacion",$nmessage,$header);
      if($exacto==false){return $exacto;}
    }
    return $exacto;
  }
  public function CompartirNoticia($titulo,$noticia,$correo,$contenido,$img){
    $listacorreos = explode(",", $correo);
    $nombre = "Sistema de Votaciones en Linea USAC";
    $correox = "ingenieria.analisisydiseno@gmail.com";
    //$filename="../img/CompartirNoticia".$img;
    $filename="Compartir.png";
    //$file = "../img/CompartirNoticia/Compartir.png";
    $file = __DIR__."\../img/CompartirNoticia/Compartir.png"; 
    $content = file_get_contents( $file);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);

    // header
    $header = "From: ".$nombre." <".$correox.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

    // message & attachment

    $contenidopersonalizado="Titulo de la historia ".$titulo."\r\n\r\n";
    $contenidopersonalizado.="Informacion: \r\n\r\n".$noticia."\r\n\r\n";
    $contenidopersonalizado.="-----------------------------------------\r\n\r\n";
    $contenidopersonalizado.=$contenido;

    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $contenidopersonalizado."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
    $exacto=false;
    for($i=0;$i<count($listacorreos);$i++){
      $exacto=mail($listacorreos[$i],"Se compartio noticia",$nmessage,$header);
      if($exacto==false){return $exacto;}
    }
    return $exacto;
  }
}

?>
