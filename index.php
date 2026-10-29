<?php
require __DIR__ . "/robo.json";


abstract class Robo
{
    public $modelo;
    public $energia ;
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

}









if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
}
?>

<!DOCTYPE html>
<html lang="en">

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
            </form>
        </div>
    </main>
</body>

</html>