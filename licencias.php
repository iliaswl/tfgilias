<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Licencia de Boxeo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <div class="espaciado container mt-5">
        <h1 class="text-center">Solicitud de Licencia de Boxeo</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Licencia Amateur</h3>
                <form id="amateurForm">
                    <div class="form-group">
                        <label for="apellido1">1er Apellido</label>
                        <input type="text" class="form-control" id="apellido1" pattern="[A-Za-z]+" title="Solo letras"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="apellido2">2º Apellido</label>
                        <input type="text" class="form-control" id="apellido2" pattern="[A-Za-z]+" title="Solo letras"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" pattern="[A-Za-z]+" title="Solo letras"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI/Pasaporte</label>
                        <input type="text" class="form-control" id="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaNac">Fecha nac.</label>
                        <input type="date" class="form-control" id="fechaNac" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" pattern="[0-9]+" title="Solo números"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <input type="text" class="form-control" id="domicilio" required>
                    </div>
                    <div class="form-group">
                        <label for="cp">C.P.</label>
                        <input type="text" class="form-control" id="cp" pattern="[0-9]+" title="Solo números" required>
                    </div>
                    <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <input type="text" class="form-control" id="localidad" pattern="[A-Za-z]+" title="Solo letras"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="club">Club</label>
                        <input type="text" class="form-control" id="club" required>
                    </div>
                    <div class="form-group">
                        <label for="entrenador">Entrenador</label>
                        <input type="text" class="form-control" id="entrenador" pattern="[A-Za-z]+" title="Solo letras"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Licencia Profesional</h3>
                <form id="profesionalForm">
                    <div class="form-group">
                        <label for="apellido1Prof">1er Apellido</label>
                        <input type="text" class="form-control" id="apellido1Prof" pattern="[A-Za-z]+"
                            title="Solo letras" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido2Prof">2º Apellido</label>
                        <input type="text" class="form-control" id="apellido2Prof" pattern="[A-Za-z]+"
                            title="Solo letras" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreProf">Nombre</label>
                        <input type="text" class="form-control" id="nombreProf" pattern="[A-Za-z]+" title="Solo letras"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="dniProf">DNI/Pasaporte</label>
                        <input type="text" class="form-control" id="dniProf" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaNacProf">Fecha nac.</label>
                        <input type="date" class="form-control" id="fechaNacProf" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoProf">Teléfono</label>
                        <input type="tel" class="form-control" id="telefonoProf" pattern="[0-9]+" title="Solo números"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="emailProf">Email</label>
                        <input type="email" class="form-control" id="emailProf" required>
                    </div>
                    <div class="form-group">
                        <label for="domicilioProf">Domicilio</label>
                        <input type="text" class="form-control" id="domicilioProf" required>
                    </div>
                    <div class="form-group">
                        <label for="cpProf">C.P.</label>
                        <input type="text" class="form-control" id="cpProf" pattern="[0-9]+" title="Solo números"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="localidadProf">Localidad</label>
                        <input type="text" class="form-control" id="localidadProf" pattern="[A-Za-z]+"
                            title="Solo letras" required>
                    </div>
                    <div class="form-group">
                        <label for="managerProf">Manager</label>
                        <input type="text" class="form-control" id="managerProf" required>
                    </div>
                    <div class="form-group">
                        <label for="entrenadorProf">Entrenador</label>
                        <input type="text" class="form-control" id="entrenadorProf" pattern="[A-Za-z]+"
                            title="Solo letras" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('amateurForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Añadir "AB Box" to the top left
            doc.text('AB Box', 10, 10);

            // Añadir "Resguardo Solicitud Licencia"
            doc.setFontSize(16);
            doc.text('Resguardo Solicitud Licencia', 105, 20, null, null, 'center');
            doc.setFontSize(12);

            doc.text('Solicitud de Licencia de Boxeo Amateur', 10, 30);
            doc.text(`1er Apellido: ${document.getElementById('apellido1').value}`, 10, 40);
            doc.text(`2º Apellido: ${document.getElementById('apellido2').value}`, 10, 50);
            doc.text(`Nombre: ${document.getElementById('nombre').value}`, 10, 60);
            doc.text(`DNI/Pasaporte: ${document.getElementById('dni').value}`, 10, 70);
            doc.text(`Fecha nac.: ${document.getElementById('fechaNac').value}`, 10, 80);
            doc.text(`Teléfono: ${document.getElementById('telefono').value}`, 10, 90);
            doc.text(`Email: ${document.getElementById('email').value}`, 10, 100);
            doc.text(`Domicilio: ${document.getElementById('domicilio').value}`, 10, 110);
            doc.text(`C.P.: ${document.getElementById('cp').value}`, 10, 120);
            doc.text(`Localidad: ${document.getElementById('localidad').value}`, 10, 130);
            doc.text(`Club: ${document.getElementById('club').value}`, 10, 140);
            doc.text(`Entrenador: ${document.getElementById('entrenador').value}`, 10, 150);

            doc.save('Licencia_Amateur.pdf');
        });

        document.getElementById('profesionalForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Añadir "AB Box" to the top left
            doc.text('AB Box', 10, 10);

            // Añadir title "Resguardo Solicitud Licencia"
            doc.setFontSize(16);
            doc.text('Resguardo Solicitud Licencia', 105, 20, null, null, 'center');
            doc.setFontSize(12);

            doc.text('Solicitud de Licencia de Boxeo Profesional', 10, 30);
            doc.text(`1er Apellido: ${document.getElementById('apellido1Prof').value}`, 10, 40);
            doc.text(`2º Apellido: ${document.getElementById('apellido2Prof').value}`, 10, 50);
            doc.text(`Nombre: ${document.getElementById('nombreProf').value}`, 10, 60);
            doc.text(`DNI/Pasaporte: ${document.getElementById('dniProf').value}`, 10, 70);
            doc.text(`Fecha nac.: ${document.getElementById('fechaNacProf').value}`, 10, 80);
            doc.text(`Teléfono: ${document.getElementById('telefonoProf').value}`, 10, 90);
            doc.text(`Email: ${document.getElementById('emailProf').value}`, 10, 100);
            doc.text(`Domicilio: ${document.getElementById('domicilioProf').value}`, 10, 110);
            doc.text(`C.P.: ${document.getElementById('cpProf').value}`, 10, 120);
            doc.text(`Localidad: ${document.getElementById('localidadProf').value}`, 10, 130);
            doc.text(`Manager: ${document.getElementById('managerProf').value}`, 10, 140);
            doc.text(`Entrenador: ${document.getElementById('entrenadorProf').value}`, 10, 150);

            doc.save('Licencia_Profesional.pdf');
        });
    </script>
</body>

</html>