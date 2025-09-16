<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Sigla</th>
            <th>Carga Horária</th>
            <th>Ações</th>
        </tr>
        <?php
            $file = fopen("dados.txt", "r") or die ("arquivo nao encontrado");
            $linhaNum = 0;

            while(!feof($file)){
                $linha = fgets($file);
                $valores = explode(";", $linha);

                echo "<tr>
                    <td>{$valores[0]}</td>
                    <td>{$valores[1]}</td>
                    <td>{$valores[2]}</td>
                    <td>
                        <form action='alterar.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='linha' value='{$linhaNum}'>
                            <input type='submit' value='Alterar'>
                        </form>
                    </td>
                </tr>";

                $linhaNum++;
            };
            fclose($file);
        ?>
    </table>
</body>
</html>
