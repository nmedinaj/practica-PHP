<!doctype html>
<html lang="en">

<head>
    <title>Formulario PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row py-5 d-flex justify-content-center">
            <div class="col-6 bg-light p-5" id="col-form">
                <form action="" method="post">
                    <h2>Formulario de registro</h2>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required />
                        <small class="form-text text-muted">*Requerido</small>
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" required />
                        <small class="form-text text-muted">*Requerido</small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required />
                        <small class="form-text text-muted">*Requerido</small>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary">

                    <?php
                        if($_POST){
                            $nombre = $_POST["nombre"];
                            $apellido = $_POST["apellido"];
                            $email = $_POST["email"];
                            
                            //Establecer conexión con BBDD
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "cursosql";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            //Comprobar conexión
                            if($conn->connect_error){
                                die("Conexión fallida: " . $conn->connect_error);
                            }

                            $sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";

                            if($conn->query($sql) === TRUE) {
                                echo "<p class='d-flex justify-content-end'>Usuario registrado correctamente</p>";
                            } else {
                                echo "Error: " . $sql . " " . $conn->error;
                            }

                            //Cerrar conexión

                            $conn -> close();

                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <script src="myjs.js"></script>
</body>

</html>