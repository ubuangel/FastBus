<!DOCTYPE html>
<html>
<head>
    <title>Panel de Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }

        .dashboard h2 {
            margin-bottom: 20px;
        }

        .dashboard ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .dashboard li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard">
            <h2>Panel de Cliente</h2>
            <ul>
                <li><a href="#">Ver pedidos</a></li>
                <li><a href="#">Historial de compras</a></li>
                <li><a href="#">Configuración</a></li>
                <li><a href="#">Ayuda</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
