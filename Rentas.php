<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Rentas SMS</title>
  </head>
  <body style="background-image: url('images/motivo-min.png');">
  
  <header>
      <div class="container dark-mode p-4">
        <nav class="navbar navbar-expand-lg navbar-dark dark-mode">
            <div class="container-fluid">
              <a class="navbar-brand mx-auto  mb-0" href="Rentas.php"><img src="images/logo - blanco.png"  width="280px"
                  alt="logo"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
            </div>
          
          </nav>
    </div>
  </header>

  <div class="container p-4">
  <h3 class="text-light">
       
       <?php
 
         include('httpPHPAltiria.php');
 
         $altiriaSMS = new AltiriaSMS();
  
 
    
 
         $altiriaSMS->setLogin('jeasoncues@gmail.com');
         $altiriaSMS->setPassword('hy8q3rpy');
 
         if ($_SERVER["REQUEST_METHOD"] == "GET") {
             $str = $altiriaSMS->getCredit();
             if(preg_match('/.*OK credit\(0\):(.*?)$/', $str, $match) == 1){
                 echo "Saldo disponible:  ".$match[1]." créditos";
             }
         }
         else if($_SERVER["REQUEST_METHOD"] == "POST"){
             $sDestinatario = $_POST['celular'];
             $sMessage = $_POST['mensaje'];
             $response = $altiriaSMS->sendSMS($sDestinatario,$sMessage);
 
             if(!$response)
               echo "Error al enviar";
             else 
                echo $response;
         }
       ?>
 
        </h3>
 
  </div>


   <div class="container">
    <form method="POST" action="Rentas.php">
            <div class="mb-3">
                <label class="form-label text-light">Número de celular</label>
                <input type="number" class="form-control" name="celular" >
                <div  class="form-text text-light">Agregar prefijo al número, ejemplo (+51) para Perú.</div>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Mensaje</label>
                <textarea class="form-control" name="mensaje" rows="3"></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  </body>
</html>