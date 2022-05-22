<!doctype html>
<html>
<style>
  form {
    box-sizing: border-box;
    padding: 2rem;
    border-radius: 1rem;
    background-color: hsl(0, 0%, 100%);
    border: 4px solid hsl(0, 0%, 90%);

    margin-left: 200px;
    margin-right: 200px;
  }

  .container {
    display: flex;
  }

  .row {
    flex: 50%;
    padding: 10px;
    height: 70px;

    margin-left: 50px;
  }

  .button {
    display: inline-block;
    padding: 15px 25px;
    font-size: 24px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #e6d0ce;
    border: none;
    margin-left: 350px;
    border-radius: 15px;
    box-shadow: 0 9px #999;

  }

  .button:hover {
    background-color: #ddb7ab
  }

  .button:active {
    background-color: #ddb7ab;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
  }

  .inp {
    width: 70px;
  }

  h1 {
    text-align: center;
  }
</style>

<head>
  <title>Bouquet</title>
</head>

<body>

  <h1>Create Bouquet</h1>
  <?php
  if (isset($_GET["msg"])) {
    echo '<span style="color:#999b84;font-size:50px;display:block; text-align: center;margin:150px 0 50px 0">'
      . $_GET["msg"]
      . "</span>";
  }
  ?>

  <form method="post" action="app/Controller.php">
    <div class="container">
      <div class="row">

        Nb Rose : <input class="inp" type="text" value="0" id="quantityRose" name="quantityRose" min="1" max="10">
        <br>
      </div>
      <br>
      <div class="row">
        Nb Iris : <input class="inp" type="text" value="0" id="quantityIris" name="quantityIris" min="1" max="10">
      </div>
      <br>
      <div class="row">
        Nb Sun Flower : <input class="inp" type="text" value="0" id="quantitySunF" name="quantitySunF" min="1" max="10">
      </div>
      <br>
    </div>
    <input class="button" type="submit" name="envoyer" value="Envoyer" />
  </form>
</body>

</html>