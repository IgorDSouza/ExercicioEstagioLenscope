<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Exercicio Lenscope</title>
</head>
<body>
    <form method="post"> 
         <img id = "imgOculos"src="img/oculosincon.png" alt="icone Oculos">
    <h2>Consulta para lentes ideais</h2></br>
       
        <h3>Insira o grau cilindrico do seu olho esquerdo</h3>
        <input type="number" name="grauCilEsq" id="grauCilEsq" value="0" step="0.25" min="-6" max="0">
        <h3>Insira o grau cilindrico do seu olho direito</h3>
        <input type="number" name="grauCilDir" id="grauCilDir" value="0" step="0.25" min="-6" max="0">
        <h3>Insira o grau esferico do seu olho esquerdo</h3>
        <input type="number" name="grauEsfEsq" id="grauEsfEsq" value="0" step="0.25" min="-15" max="0">
        <h3>Insira o grau esferico do seu olho direito</h3>
        <input type="number" name="grauEsfDir" id="grauEsfDir" value="0" step="0.25" min="-15" max="0"> <br> <br>
        <input type="submit" name="enviar" class="enviar" id="enviar">     
        </form>
    <?php      
        if(isset($_POST['enviar']))
        {
            $grauCilEsq = $_POST['grauCilEsq'];
            $grauCilDir = $_POST['grauCilDir'];
            $grauEsfEsq = $_POST['grauEsfEsq'];
            $grauEsfDir = $_POST['grauEsfDir'];
            // DEFINA AQUI A QUANTIDADE DE LENTES PRIME DISPONÍVEIS!!
            $qtdLentePrime = 0;
            //GRAU LIMITE É DE 0 A -15 ESFERICO E ATÉ -5 CILINDRICO
            if ($grauEsfEsq <= 0 && $grauEsfEsq >= -15 || $grauEsfDir <= 0 && $grauEsfDir >= -15
                || $grauCilDir <=0  && $grauCilDir >=-5 || $grauCilDir <= 0 && $grauCilDir >= -5)
            {   
                // APENAS GRAU ESFERICO DE -3 A -12 = LENTE PRIME
                    if ($qtdLentePrime>0 && 
                        ($grauEsfEsq <= -3 && $grauEsfEsq >= -12 || $grauEsfDir <= -3 && $grauEsfDir >= -12) &&
                        $grauCilDir==0 && $grauCilEsq==0)  
                    { 

                    echo "<div id='alert'> A melhor lente para você é a Lente Prime! </br>
                    <a href='exercicioLenscope.php'><input type='button' class='fechar'value='Fechar'></a></div>";

                    }
                    // SE CILINDRICA FOR ATE -2 LINHA PRIME PRIORIDADE, VISION DEPOIS
                    else if($qtdLentePrime!=0 &&
                        ($grauCilEsq <= 0 && $grauCilEsq >= -2 || $grauCilDir <= 0 && $grauCilDir >= -2))

                    {   
                    // SE CILINDRICA FOR ATE -2 , PRIME SÓ ATENDE ESFERICA  DE -3 A -10
                        if($grauEsfEsq <= -3 && $grauEsfEsq >= -10 || $grauEsfDir <= -3 && $grauEsfDir >= -10)
                        {
                            echo"<div id='alert'> melhor lente para você é a Lente Prime!</br>
                            <a href='exercicioLenscope.php'><input type='button' class='fechar'value='Fechar'></a></div>";

                        }
                    // PRIORIDADE LENTE PRIME
                        else if ($grauEsfEsq == 0 && $grauEsfDir == 0)
                        {
                            echo"<div id='alert'>A melhor lente para você é a Lente Prime!</br>
                            <a href='exercicioLenscope.php'><input type='button' class='fechar'value='Fechar'></a></div>";

                        }
                    // SE PRIME ACABOU, VISION
                        else
                        {
                            echo"<div id='alert'>A melhor lente para você é a Lente Vision!</br>
                            <a href='exercicioLenscope.php'><input type='button' class='fechar'value='Fechar'></a></div>";

                        }
                    }
                // SE PRIME ACABOU, VISION

                    else
                    {
                      echo"<div id='alert'>A melhor lente para você é a Lente Vision!</br>
                      <a href='exercicioLenscope.php'><input type='button' class='fechar'value='Fechar'></a></div>";
        
                     }
            }  
            
        }

    ?>
       
</body>
</html>