<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <?php
      require_once 'config.php';
      require_once 'classes/database.php';
      $database = new DBHandler();
      $stmt = $database->getFactoids($db);
    ?>

    <title><?php echo $page['title']; ?></title>
  </head>

  <body>

    <div class="container">
      <!-- Page header -->
      <div class="page-header">
        <h1><?php echo $page['title']; ?></h1>
        <p class="lead"></p>
      </div>

      <!-- Search box -->
      <form role="form">
        <div class="form-group">
          <input type="text" id="search" class="form-control" placeholder="Search">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" id="check" value="option1"> Search IDs And Titles Only
          </label>
        </div>
      </form>

      <hr>

      <!-- Factoids list start -->
      <?php while ($row = $stmt->fetch()) : ?>
        <div class="panel panel-primary factoid">
          <div class="panel-heading">
            <h3 class="panel-title"><b><?php echo $row['id']; ?></b></h3>
          </div>
          <div class="panel-body">
            <b><?php echo (!is_null($row['title']) ? $row['title'] : $row['id']); ?><br></b>
            <p><?php echo preg_replace($util['pattern'], $util['replace'], $row['factoid']); ?></p>
          </div>
        </div>
      <?php endwhile; ?>
      <!-- Factoids list end -->

      <hr>

      <footer>
        <p><?php echo $page['footer']; ?></p>
      </footer>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- Real-time search based on the searchable list of #minecrafthelp factoids (http://guru.syfaro.net/faq.php) -->
    <script>
      String.prototype.contains = function(input) {
        return this.indexOf(input) !== -1;
      };

      $("#search").keyup(function() {
        var val = $("#search").val();
        var titleonly = $("#check").is(":checked");
        if (val !== "") {
          $(".factoid").each(function() {
            if (titleonly == false && !$(this).children('div').text().toLowerCase().replace(/ /g, '').contains(val.toLowerCase().replace(/ /g, ''))) {
              $(this).slideUp('fast');
            } else if (titleonly == true && !$(this).children('div').children('h3').text().toLowerCase().replace(/ /g, '').contains(val.toLowerCase().replace(/ /g, ''))) {
              $(this).slideUp('fast');
            } else {
              $(this).slideDown('fast');
            }
          });
        } else {
          $(".factoid").each(function() {
            $(this).slideDown('fast');
          });
        }
      });
    </script>
  </body>
</html>
