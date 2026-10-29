<?php
require __DIR__ . "/robo.json";


abstract class Robo
{
    public $modelo;
    public $energia;
    public $potencia;
    public $funcao;

    public function __construct($modelo, $energia, $potencia, $funcao)
    {
        $this->modelo = $modelo;
        $this->energia = $energia;
        $this->potencia = $potencia;
        $this->funcao = $funcao;
    }

    public function getEnergia()
    {
        return $this->energia;
    }

    public function getPotencia()
    {
        return $this->potencia;
    }
    public function getFuncao()
    {
        return $this->funcao;
    }
    abstract public function operacao();

    abstract public function Recarregar();
}


class Explorador extends Robo
{

    public function operacao()
    {
        return "Explorando...";
    }

    public function __construct()
    {
        $this->modelo = "Explorador";
        $this->energia = 100;
        $this->potencia = 20;
        $this->funcao = "Investigar planetas";
    }

    public function Recarregar()
    {
        $novoEnergia = $this->energia + 10;
    }
}


class Engenheiro extends Robo
{

    public function operacao()
    {
        return "Arrumando...";
    }

    public function __construct()
    {
        $this->modelo = "Engenheiro";
        $this->energia = 120;
        $this->potencia = 15;
        $this->funcao = "Reparar equipamentos";
    }

    public function Recarregar()
    {
        $novoEnergia = $this->energia + 10;
    }
}

class Defensor extends Robo
{

    public function operacao()
    {
        return "Defendendo...";
    }

    public function __construct()
    {
        $this->modelo = "Defensor";
        $this->energia = 150;
        $this->potencia = 30;
        $this->funcao = "Proteger a estação";
    }

    public function Recarregar()
    {
        $novoEnergia = $this->energia + 10;
    }
}



if (!isset($_SESSION["robos"])) {
    $_SESSION["robos"] = [];
}


$mensagem = "Bem-vindo";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $modelo = "";
    $robo = 0;

    if ($modelo === "explorador") {
        $robo = new Explorador();
    } elseif ($modelo === "engenheiro") {
        $robo = new Engenheiro();
    } elseif ($modelo === "defensor") {
        $robo = new Defensor();
    }

    if ($robo != 0) {
        $_SESSION["robo"] = $robo;
        $mensagem = "robo cadastrado com successo!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="inputs">
            <form method="post">
                <select name="modelo" id="modelo">
                    <option value="explorador"> Explorador</option>
                    <option value="engenheiro"> Engenheiro</option>
                    <option value="defensor"> Defensor</option>
                </select>
                <button type="submit"> cadstrar</button>
            </form>
        </div>

        <div>
            <?php if ($mensagem != "") { ?>

                <h4> Robo cadastrado</h4>
                <p><?= $mensagem?></p>


            <?php } ?>
        </div>
    </main>
</body>

</html>