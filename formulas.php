<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train To Win®</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style the buttons that are used to open and close the accordion panel */
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        .accordion:after {
            content: '\02795';
            /* Unicode character for "plus" sign (+) */
            font-size: 13px;
            color: #777;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2796";
            /* Unicode character for "minus" sign (-) */
        }
    </style>
</head>

<body>
    <header>
        <!-- Encabezado aquí -->
    </header>
    <main class="container mt-5">
        <button class="accordion btn btn-light">Calcula tu 1RM</button>
        <div class="panel">
            <label for="peso">Peso levantado (kg):</label>
            <input type="number" id="peso" min="0" class="form-control mb-2">
            <label for="repeticiones">Número de repeticiones:</label>
            <input type="number" id="repeticiones" min="0" class="form-control mb-2">
            <button onclick="calcular1RM()" class="btn btn-primary">Calcular</button>
            <div id="resultado1RMContainer" class="mt-3"></div>
        </div>

        <button class="accordion btn btn-light mt-3">VO2max</button>
        <div class="panel">
            <label for="distancia">Distancia recorrida (km):</label>
            <input type="number" id="distancia" min="0" class="form-control mb-2">
            <label for="tiempo">Tiempo empleado (min):</label>
            <input type="number" id="tiempo" min="0" class="form-control mb-2">
            <button onclick="calcularVO2max()" class="btn btn-primary">Calcular</button>
            <div id="resultadoVO2maxContainer" class="mt-3"></div>
        </div>

        <button class="accordion btn btn-light mt-3">IMC (Indice de Masa Corporal)</button>
        <div class="panel">
            <label for="altura">Altura (m):</label>
            <input type="number" id="altura" min="0" class="form-control mb-2">
            <label for="pesoIMC">Peso (kg):</label>
            <input type="number" id="pesoIMC" min="0" class="form-control mb-2">
            <button onclick="calcularIMC()" class="btn btn-primary">Calcular</button>
            <div id="resultadoIMCContainer" class="mt-3"></div>
        </div>
    </main>
    <footer>
        <!-- Pie de página aquí -->
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var acc = document.querySelectorAll(".accordion");

            acc.forEach(function (btn) {
                btn.addEventListener("click", function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            });
        });

        function calcular1RM() {
            var peso = parseFloat(document.getElementById("peso").value);
            var repeticiones = parseFloat(document.getElementById("repeticiones").value);
            var resultado = peso * (1 + (repeticiones / 30));
            document.getElementById("resultado1RMContainer").innerHTML = "<p class='text-success'>Tu 1RM estimada es: " + resultado.toFixed(2) + " kg</p>";
        }

        function calcularVO2max() {
            var distancia = parseFloat(document.getElementById("distancia").value);
            var tiempo = parseFloat(document.getElementById("tiempo").value);
            var resultado = (distancia / tiempo) * 3.5 + 48.5;
            document.getElementById("resultadoVO2maxContainer").innerHTML = "<p class='text-success'>Tu VO2max estimado es: " + resultado.toFixed(2) + " ml/kg/min</p>";
        }

        function calcularIMC() {
            var altura = parseFloat(document.getElementById("altura").value);
            var peso = parseFloat(document.getElementById("pesoIMC").value);
            var resultado = peso / (altura * altura);
            document.getElementById("resultadoIMCContainer").innerHTML = "<p class='text-success'>Tu IMC es: " + resultado.toFixed(2) + "</p>";
        }
    </script>
</body>

</html>
