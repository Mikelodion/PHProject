<?php //Añadimos la cabecera y el sesionStart.
      session_start();
			require_once("conf/database.php");
			require_once("objects/consulta.php");
			require_once("objects/results.php");
			require_once("objects/user.php");
    require_once("resources/cabecera.php");
?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="img/slide1.png" alt="First slide" width="1400" height="514">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="img/comunidad4.jpg" alt="Second slide" width="1400" height="514" overflow="hidden">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="img/comunidad.png" alt="Third slide" width="1400" height="514">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		<div id="contenido">
			<h2>The best manager site</h2><br><h2> for your community</h2><br>
			<img src="img/gente.png"><img src="img/gente.png"><img src="img/flecha.png"><img src="img/village.png"><img src="img/village.png"><br><img src="img/village.png"><img src="img/village.png"><img src="img/flecha.png"><img src="img/grafico.png"><img src="img/grafico.png"><br><br><p>Organize all your users and admins easily</p> <br><p> and keep them controlled as you want.</p>
		</div>
		<style type="text/css">
			#contenido{
				position: absolute;
				bottom: 0;
				margin-bottom: 5%;
				right: 0;
				margin-right: 4%;
				background-color: #f8f9fa;
				padding: 20px;
				border-radius: 20px;
			}
			#contenido h2, #contenido p{
				text-align: center;
			}
			#contenido img{
				width: 60px;
			}
			#contenido p{
				font-weight: bold;
				margin: 0;
			}
		</style>
<?php
    require_once("resources/footer.php");
?>