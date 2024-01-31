<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $ra = $_POST["ra"];
  $tel = $_POST["tel"];
  $genero = $_POST["genero"];
  $registro = $_POST["registro"];
  $capitulo = $_POST["capitulo"];
  $campus = $_POST["campus"];

  // Insert data into database
  safeInsert($conn, $nome, $email, $ra, $tel, $genero, $registro, $capitulo, $campus);

  echo "Registro de voluntário concluído com sucesso.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário IEEE</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right,rgb(255, 255, 255), rgb(255, 255, 255));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.801);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid rgb(200, 255, 0);
        }
        legend{
            border: 1px solid rgb(231, 235, 0);
            padding: 10px;
            text-align: center;
            background-color: rgb(255, 166, 0);
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: rgb(255, 255, 255);
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: rgb(255, 255, 255);
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(255, 238, 0), rgb(255, 145, 0));
            width: 100%;
            border: none;
            padding: 15px;
            color: rgb(255, 255, 255);
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(216, 213, 169), rgb(214, 146, 56));
        }
    </style>
</head>
<body>
    <img src="ieee-logo-png-3.png" alt="Logo do IEEE" style="position: absolute; bottom: -35px; left: 10px; width: 15%;">
    <div class="box">
        <form action="" method="post">
            <fieldset>
                <legend><b>Submissão de voluntário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="ra" name="ra" id="ra" class="inputUser" required>
                    <label for="ra" class="labelInput">RA</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="tel" id="tel" class="inputUser" required>
                    <label for="tel" class="labelInput">Telefone (ddd+num sem espaço e hífen)</label>
                </div>
                <br><br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_registro"><b>Data de Registro:</b></label>
                <input type="date" name="registro" id="registro" required>
                <br><br>
                <label for="capitulo">Escolha um capítulo:</label>
                <select name="capitulo" id="capitulo">
                <option value="cs">CS</option>
                <option value="wie">WIE</option>
                <option value="aess">AESS</option>
                <option value="embs">EMBS</option>
                <option value="eps">EPS</option>
                <option value="pes">PES</option>
                <option value="ras">RAS</option>
                <option value="tems">TEMS</option>
                </select>
                <br><br>
                <label for="campus">Escolha um campus:</label>
                <select name="campus" id="campus">
                <option value="sa">SA</option>
                <option value="sbc">SBC</option>
                </select>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
