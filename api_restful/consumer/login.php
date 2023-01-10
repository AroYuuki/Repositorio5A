<?php 

// Agregar el codigo para verificar en la BD que el usuario y pass sean validos
    if ($_SERVER["REQUEST_METHOD"]=="POST")
      {
            $us=$_POST['user'];
            $ps=$_POST['pwd'];

            $ins = json_encode(array("user" => "$us", "pwd" => "$ps"));
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://127.0.0.1/parcial2/api_restful/controllers/usuarios.php?op=sesion',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_POSTFIELDS =>$ins,
                    CURLOPT_HTTPHEADER => array(
                      'Content-Type: text/plain'
                    ),
                  ));
            
            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);

            if (count($data)>0)
            {
                echo "<script>
                         alert('.:: - B I E N V E N I D O - :: ');
                         location.href='../consumer/index.php'; //redireccionar a otro archivo 
                       </script>";
            }
            else
            {
                echo "<script>
                        alert('.:: - Verificar Usuario y Contraseña - :: ');
                        location.href='login.php';
                      </script>";
            }    
            
      }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <div class="si">
        <div class="log">
            <div class="loginform">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input name="user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>