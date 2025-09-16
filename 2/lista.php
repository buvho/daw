<?php
    $file = fopen("lista.txt", "r");
?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="text-center">Lista Aluno</h1>
            <table class="table">
                <tr>
                    <th scope="col">nome</th>
                    <th scope="col">cpf</th>
                    <th scope="col">matricula</th>
                    <th scope="col"></th>
                </tr >
                <?php 
                    while(!feof($file)){
                        $line = fgets($file);
                        $c = explode(";",$line);
                        echo "<tr scope=\"row\"> <th> $c[0] </th>";
                        echo "<th> $c[1] </th>";
                        echo "<th> $c[2] </th>";
                        echo "<th> <button type=\"button\" class=\"btn btn-danger\">Ação</button> </th> </tr>";
                    };
                ?>
            </table>
        </div>
    </body>
</html>
