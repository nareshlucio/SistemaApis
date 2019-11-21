<?php 
$api_nasa ='{"name":"Luna","data":"{\"date\":\"2019-11-17\",\"explanation\":\"How do stars form? To help find out, astronomers created this tantalizing false-color composition of dust clouds and embedded newborn stars in infrared wavelengths with WISE, the Wide-field Infrared Survey Explorer. The cosmic canvas features one of the closest star forming regions, part of the Rho Ophiuchi cloud complex some 400 light-years distant near the southern edge of the pronounceable constellation Ophiuchus. After forming along a large cloud of cold molecular hydrogen gas, young stars heat the surrounding dust to produce the infrared glow. Stars in the process of formation, called young stellar objects or YSOs, are embedded in the compact pinkish nebulae seen here, but are otherwise hidden from the prying eyes of optical telescopes. An exploration of the region in penetrating infrared light has detected emerging and newly formed stars whose average age is estimated to be a mere 300,000 years. That\'s extremely young compared to the Sun\'s age of 5 billion years. The prominent reddish nebula at the lower right surrounding the star Sigma Scorpii is a reflection nebula produced by dust scattering starlight. This view from WISE, released in 2012, spans almost 2 degrees and covers about 14 light-years at the estimated distance of the Rho Ophiuchi cloud.\",\"hdurl\":\"https:\/\/apod.nasa.gov\/apod\/image\/1911\/RhoOph_WISE_1600.jpg\",\"media_type\":\"image\",\"service_version\":\"v1\",\"title\":\"Young Stars in the Rho Ophiuchi Cloud\",\"url\":\"https:\/\/apod.nasa.gov\/apod\/image\/1911\/RhoOph_WISE_960.jpg\"}\n","fecha":"2019-11-18 01: 32:09"}';
if(isset($_POST)){
	$url = $_POST['url'];
	switch ($url) {
		case 'https://deezer-api.webcindario.com/track/':
		$json= file_get_contents("https://deezer-api.webcindario.com/track/");
		$array1= json_decode($json, true);
		$array= json_decode($array1["data"], true);
		?>
	<div class="container-fluid">
		<div class="row align-content-center">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
  					<img src="<?php echo $array["contributors"][0]["picture_medium"]; ?>" class="img-fluid">
  					<div class="card-body">
    					<h5 class="card-title">Informacion de la Cancion</h5>
    					<p class="card-text">Titulo: <?php echo $array["title"]; ?></p>
    					<p class="card-text">Duracion: <?php echo round(($array["duration"]/60)*100) / 100;?></p>
    					<p class="card-text">Autor: <?php echo $array["contributors"][0]["name"]; ?></p>
    					<p class="card-text">Fecha de Lanzamiento: <?php echo $array["release_date"]; ?>	</p>
    					<p class="card-text">Id_Cancion: <?php echo $array["id"]; ?></p>
  					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		break;
		case 'https://deezer-api.webcindario.com/album/':
			$json= file_get_contents("https://deezer-api.webcindario.com/album/");
			$array1= json_decode($json, true);
			$array= json_decode($array1["data"], true);
			?>
	<div class="container-fluid">
		<div class="row align-content-center">
			<div class="card" style="width: 18rem;">
  				<img src="<?php echo $array["cover_medium"]; ?>" class="img-fluid">
  				<div class="card-body">
    					<h5 class="card-title">Informacion del Album</h5>
    					<p class="card-text">Titulo: <?php echo $array["title"]; ?></p>
    					<p class="card-text">Duracion Total del Album: <?php echo round(($array["duration"]/60)*100) / 100;?></p>
    					<p class="card-text">Autor: <?php echo $array["contributors"][0]["name"]; ?></p>
    					<p class="card-text">Fecha de Lanzamiento: <?php echo $array["release_date"]; ?>	</p>
    					<p class="card-text">Lista de Canciones:</p>
    					<p class="card-text">
    						<ul class="list-group list-group-flush">
    							<li class="list-group-item"><?php echo $array["tracks"]["data"][0]["title"]; ?></li>
    							<li class="list-group-item"><?php echo $array["tracks"]["data"][1]["title"]; ?></li>
    							<li class="list-group-item"><?php echo $array["tracks"]["data"][2]["title"]; ?></li>
    							<li class="list-group-item"><?php echo $array["tracks"]["data"][3]["title"]; ?></li>
    							<li class="list-group-item">...</li>
    						</ul>
    					</p>
  				</div>
			</div>
		</div>
	</div>
			<?php
			break;
		case 'https://deezer-api.webcindario.com/artist/':
			$json= file_get_contents("https://deezer-api.webcindario.com/artist/");
			$array1= json_decode($json, true);
			$array= json_decode($array1["data"], true);
			?>
	<div class="container-fluid">
		<div class="row align-content-center">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
  					<img src="<?php echo $array["picture_medium"]; ?>" class="img-fluid">
  					<div class="card-body">
    					<h5 class="card-title">Informacion del Artista</h5>
    					<p class="card-text">Nombre: <?php echo $array["name"]; ?></p>
    					<p class="card-text">Id del Artista: <?php echo $array["id"];?></p>
    					<p class="card-text">Numero de Albums: <?php echo $array["nb_album"]; ?></p>
    					<p class="card-text">numero de Fans: <?php echo $array["nb_fan"]; ?>	</p>
  					</div>
				</div>
			</div>
		</div>
	</div>
			<?php
		break;
		case 'https://apiclima2.000webhostapp.com/':
		$json= file_get_contents("https://apiclima2.000webhostapp.com/");
		$array1= json_decode($json, true);
		$array= json_decode($array1["data"], true);
			?>
	<div class="container-fluid">
		<div class="row align-content-center">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
  					<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png" class="img-fluid">
  					<div class="card-body">
    					<h5 class="card-title">Informacion del Tiempo actual en <?php echo $array["name"]; ?></h5>
    					<p class="card-text"><?php echo "Pais: ".$array["sys"]["country"]." Traduccion: Reino Unido"; ?></p>
    					<p class="card-text">Temperatura: <?php echo $array["main"]["temp"];?></p>
    					<p class="card-text">Presion: <?php echo $array["main"]["pressure"]; ?></p>
    					<p class="card-text">Humedad: <?php echo $array["main"]["humidity"]; ?>	</p>
    					<p class="card-text">Temperatura Minima: <?php echo $array["main"]["temp_min"]; ?>	</p>
    					<p class="card-text">Temperatura Maxima: <?php echo $array["main"]["temp_max"]; ?>	</p>
  					</div>
				</div>
			</div>
		</div>
	</div>
			<?php
		break;
		case 'http://gabrielaoceguera.andocodeando.net/api/':
		$json= file_get_contents("http://gabrielaoceguera.andocodeando.net/api/");
		$array= json_decode($json, true);
			?>
	<div class="container-fluid">
		<div class="row align-content-center">
			<div class="col-md">
  				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  					<li class="nav-item">
    					<a class="nav-link active" id="pills-<?php echo $array["data"][0]["organization"]; ?>" data-toggle="pill" href="#<?php echo $array["data"][0]["organization"]; ?>" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo $array["data"][0]["organization"]; ?></a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" id="pills-<?php echo $array["data"][3]["organization"]; ?>" data-toggle="pill" href="#<?php echo $array["data"][3]["organization"]; ?>" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo $array["data"][3]["organization"]; ?></a>
  					</li>
  					<li class="nav-item">
    					<a class="nav-link" id="pills-<?php echo $array["data"][6]["organization"]; ?>" data-toggle="pill" href="#<?php echo $array["data"][6]["organization"]; ?>" role="tab" aria-controls="pills-contact" aria-selected="false"><?php echo $array["data"][6]["organization"]; ?></a>
  					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
  					<div class="tab-pane fade show active" id="<?php echo $array["data"][0]["organization"]; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $array["data"][0]["organization"]; ?>">
						<h5 class="card-title"><?php echo $array["name"]; ?></h5>
    					<p class="card-text">Id: <?php echo $array["data"][0]["_id"]; ?></p>
    					<p class="card-text">Fecha: <?php echo $array["data"][0]["date_insert"];?></p>
    					<p class="card-text">Dependencia: <?php echo $array["data"][0]["slug"]; ?></p>
    					<p class="card-text">Descripcion: <?php echo $array["data"][0]["fact"]; ?></p>
    					<p class="card-text">Organizacion: <?php echo $array["data"][0]["organization"]; ?>	</p>
    					<p class="card-text">Recurso: <?php echo $array["data"][0]["resource"]; ?></p>
    					<p class="card-text">URL: <?php echo $array["data"][0]["url"]; ?></p>
    					<p class="card-text">Operacion: <?php echo $array["data"][0]["operations"]; ?></p>
    					<p class="card-text">Tipo de Informacion: <?php echo $array["data"][0]["dataset"]; ?></p>
  					</div>
  					<div class="tab-pane fade" id="<?php echo $array["data"][3]["organization"]; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $array["data"][3]["organization"]; ?>">
  						<h5 class="card-title"><?php echo $array["name"]; ?></h5>
    					<p class="card-text">Id: <?php echo $array["data"][3]["_id"]; ?></p>
    					<p class="card-text">Fecha: <?php echo $array["data"][3]["date_insert"];?></p>
    					<p class="card-text">Dependencia: <?php echo $array["data"][3]["slug"]; ?></p>
    					<p class="card-text">Descripcion: <?php echo $array["data"][3]["fact"]; ?></p>
    					<p class="card-text">Organizacion: <?php echo $array["data"][3]["organization"]; ?>	</p>
    					<p class="card-text">Recurso: <?php echo $array["data"][3]["resource"]; ?></p>
    					<p class="card-text">URL: <?php echo $array["data"][3]["url"]; ?></p>
    					<p class="card-text">Operacion: <?php echo $array["data"][3]["operations"]; ?></p>
    					<p class="card-text">Tipo de Informacion: <?php echo $array["data"][3]["dataset"]; ?></p>
  					</div>
  					<div class="tab-pane fade" id="<?php echo $array["data"][6]["organization"]; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $array["data"][6]["organization"]; ?>">
  						<h5 class="card-title"><?php echo $array["name"]; ?></h5>
    					<p class="card-text">Id: <?php echo $array["data"][6]["_id"]; ?></p>
    					<p class="card-text">Fecha: <?php echo $array["data"][6]["date_insert"];?></p>
    					<p class="card-text">Dependencia: <?php echo $array["data"][6]["slug"]; ?></p>
    					<p class="card-text">Descripcion: <?php echo $array["data"][6]["fact"]; ?></p>
    					<p class="card-text">Organizacion: <?php echo $array["data"][6]["organization"]; ?>	</p>
    					<p class="card-text">Recurso: <?php echo $array["data"][6]["resource"]; ?></p>
    					<p class="card-text">URL: <?php echo $array["data"][6]["url"]; ?></p>
    					<p class="card-text">Operacion: <?php echo $array["data"][6]["operations"]; ?></p>
    					<p class="card-text">Tipo de Informacion: <?php echo $array["data"][6]["dataset"]; ?></p>
  					</div>
				</div>
			</div>
		</div>
	</div>
			<?php
			break;
		case 'http://lanasaromobrito.000webhostapp.com/':
		$array1= json_decode($api_nasa, true);
		$array= json_decode($array1["data"], true);
			?>
	<div class="container-fluid">
		<div class="row align-content-center">
			<div class="col-xl">
				<div class="card" style="width: 20rem;">
  					<img src="<?php echo $array["hdurl"]; ?>" class="img-fluid">
  					<div class="card-body">
    					<h5 class="card-title">Informacion de la NASA</h5>
    					<p class="card-text">Titulo: <?php echo $array["title"]; ?></p>
    					<p class="card-text">Descripcion: <?php echo $array["explanation"];?></p>
    					<p class="card-text">Fecha de Consulta: <?php echo $array["date"]; ?>	</p>
  					</div>
				</div>
			</div>
		</div>
	</div>
			<?php
		break;
    case 'https://api-mercadolibre.000webhostapp.com/':
      $json= file_get_contents("https://api-mercadolibre.000webhostapp.com/");
      $array1= json_decode($json, true);
      ?>
  <div class="container-fluid">
    <div class="row align-content-center">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="https://cdn.icon-icons.com/icons2/67/PNG/512/user_13230.png" class="img-fluid">
            <div class="card-body">
              <h4 class="card-title">Informacion del Usuario de Mercado Libre</h4>
              <p class="card-text">Nombre: <?php echo $array1["data"]["nickname"]; ?></p>
              <p class="card-text">Fecha de Registro: <?php echo $array1["data"]["registration_date"];?></p>
              <p class="card-text">Pais: <?php echo $array1["data"]["country_id"]; ?></p>
              <p class="card-text">Dirreccion: <?php echo $array1["data"]["address"]["city"].", ".$array1["data"]["address"]["state"]; ?></p>
              <p class="card-text">Tipo de Usuario: <?php echo $array1["data"]["user_type"]; ?></p>
              <p class="card-text">Link del Usuario: <?php echo $array1["data"]["permalink"]; ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>
    
      <?php
      break;
      case 'https://boosk-2719is.000webhostapp.com/':
      $json= file_get_contents("https://boosk-2719is.000webhostapp.com/");
      $array1= json_decode($json, true);
      $array= json_decode($array1["data"], true);
        ?>
  <div class="container-fluid">
    <div class="row align-content-center">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $array["items"][0]["volumeInfo"]["imageLinks"]["smallThumbnail"]; ?>" class="img-fluid">
            <div class="card-body">
              <h5 class="card-title">Informacion de Libre</h5>
              <p class="card-text">Titulo: <?php echo $array["items"][0]["volumeInfo"]["title"]; ?></p>
              <p class="card-text">Sub-Titulo: <?php echo $array["items"][0]["volumeInfo"]["subtitle"]; ?></p>  
              <p class="card-text">Id del libro: <?php echo $array["items"][0]["id"];?></p>
              <p class="card-text">Autores: <?php echo $array["items"][0]["volumeInfo"]["authors"][1]. ", " .$array["items"][0]["volumeInfo"]["authors"][2]; ?></p>
              <p class="card-text">Publicado por: <?php echo $array["items"][0]["volumeInfo"]["publisher"]; ?></p>
              <p class="card-text">Fecha de Publicacion: <?php echo $array["items"][0]["volumeInfo"]["publishedDate"]; ?></p>
              <p class="card-text">Descripcion: <?php echo $array["items"][0]["volumeInfo"]["description"]; ?></p>
              <p class="card-text">Pais de Venta: <?php echo $array["items"][0]["saleInfo"]["country"]; ?></p>
              <p class="card-text">Venta: <?php echo $array["items"][0]["saleInfo"]["saleability"]; ?></p>
              <p class="card-text">Preview: <?php echo $array["items"][0]["volumeInfo"]["previewLink"]; ?></p>
              <p class="card-text">Lenguaje: <?php echo $array["items"][0]["volumeInfo"]["language"]; ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>
        <?php
        break;
		default:
			echo "NO encuentro el servicio Seleccionado intente con otro";
		break;
	}
}