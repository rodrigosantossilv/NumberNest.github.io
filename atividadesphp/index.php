<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
  <h1>Valor do Produto</h1>
  <form id="formProduto" method="POST">
    <div class="mb-3">
      <label for="valorProduto" class="form-label">Valor do Produto:</label>
      <input type="number" class="form-control" id="valorProduto" name="valorProduto" required>
    </div>
    <button type="submit" name="stt" class="btn btn-primary">Calcular</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['stt'])) {
    // Obter o valor do produto do formulário
    $valorProduto = $_POST['valorProduto'];

    // Verificar se o valor do produto é válido
    if (!empty($valorProduto) && $valorProduto > 0) {
      // Calcular o valor com acréscimo
      $valorComAcrecimo = $valorProduto * 1.16;

      // Calcular o valor da parcela (assumindo 10 parcelas)
      $valorParcela = $valorComAcrecimo / 10;

      // Exibir os resultados
      echo "<h2>Resultados:</h2>";
      echo "<p>Valor da parcela: R$ " . number_format($valorParcela, 2) . "</p>";
      echo "<p>Valor total da compra: R$ " . number_format($valorComAcrecimo, 2) . "</p>";
    } else {
      // Se o valor do produto não for válido, exibir uma mensagem de erro
      echo "<p style='color: red;'>Por favor, insira um valor válido para o produto.</p>";
    }
  }
  ?>

  <h1>Conversor de Temperatura</h1>
  <form id="formTemperatura">
    <div class="mb-3">
      <label for="tempFahrenheit" class="form-label">Temperatura em graus Fahrenheit:</label>
      <input type="number" class="form-control" id="tempFahrenheit" required>
    </div>
    <button type="submit" class="btn btn-primary">Transformar</button>
  </form>

  <div id="resultadoTemp"></div>

  <script>
    document.getElementById("formTemperatura").addEventListener("submit", function(event) {
      event.preventDefault(); // Previne o comportamento padrão do formulário

      // Obtém o valor da temperatura em Fahrenheit do campo de entrada
      var tempFahrenheit = parseFloat(document.getElementById("tempFahrenheit").value);

      // Converte a temperatura de Fahrenheit para Celsius
      var tempCelsius = (tempFahrenheit - 32) * 5/9;

      // Exibe o resultado na div de resultado
      document.getElementById("resultadoTemp").innerHTML = "<h2>Resultado:</h2><p>Temperatura em Celsius: " + tempCelsius.toFixed(2) + " °C</p>";
    });
  </script>

  <h1>Conversor de Metros e Centímetros</h1>
  <form id="formMetrosCentimetros">
    <div class="mb-3">
      <label for="metros" class="form-label">Metros:</label>
      <input type="number" class="form-control" id="metros" required>
    </div>
    <button type="submit" class="btn btn-primary">Transformar</button>
  </form>

  <div id="resultadoMetros"></div>

  <script>
    document.getElementById("formMetrosCentimetros").addEventListener("submit", function(event) {
      event.preventDefault();

      var metros = parseFloat(document.getElementById("metros").value);

      var centimetros = metros * 100;

      document.getElementById("resultadoMetros").innerHTML = "<h2>Resultado:</h2><p>Metros em Centímetros: " + centimetros.toFixed(2) + " cm</p>";
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
