<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <title>registration form</title>
    <?= $this->Html->css('style') ?>

  </head>
  <body>
   
<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Who Am I?</h3>
  <?php echo $this->Html->image("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvdADuE69u7OS4R0wyGyZHzyLr60LotJX6WQWVI30G3A&s", [
      "alt" => "Brownies",
      '?' => ['height' => 100, 'width' => 150]
   
]);?>
  <h3>I'm an adventurer</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What Am I?</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Where To Find Me?</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <?php echo $this->Html->image("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvdADuE69u7OS4R0wyGyZHzyLr60LotJX6WQWVI30G3A&s", [
      "alt" => "Brownies",
      '?' => ['height' => 100, 'width' => 150]
   
]);?>
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <?php echo $this->Html->image("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvdADuE69u7OS4R0wyGyZHzyLr60LotJX6WQWVI30G3A&s", [
      "alt" => "Brownies",
      '?' => ['height' => 100, 'width' => 150]
   
]);?>
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <?php echo $this->Html->image("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvdADuE69u7OS4R0wyGyZHzyLr60LotJX6WQWVI30G3A&s", [
      "alt" => "Brownies",
      '?' => ['height' => 100, 'width' => 150]
   
]);?>
    </div>
  </div>
</div>
  </body>
</html>