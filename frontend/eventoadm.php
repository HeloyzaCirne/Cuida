<?php 

$conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=postgres','postgres', '1234');

if ($conexao) {
  $email = $_REQUEST['email'];
  $eventoId = $_REQUEST['identificador'];

  $select_usuario = "SELECT identificador FROM usuarios WHERE email='".$_REQUEST['email']."'";

  $comandoSelectUsuario = $conexao->query($select_usuario);

  $id_usuario = $comandoSelectUsuario->fetch();

  $select1 = "SELECT eventos.titulo, eventos.descricao, eventos.data_hora, usuarios.nome as adm  FROM eventos INNER JOIN usuarios ON eventos.adm = usuarios.identificador WHERE eventos.identificador = ".$_REQUEST['identificador'];
  $select2 = "SELECT usuarios.nome, usuarios.email FROM inscricoes INNER JOIN usuarios ON usuario_id = usuarios.identificador WHERE evento_id = ".$_REQUEST['identificador'];

  $comandoSelect1 = $conexao->query($select1);
  $evento         = $comandoSelect1->fetch();

  $comandoSelect2 = $conexao->query($select2);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background: #E2E6ED;">
  <nav class="navbar navbar-expand-lg bg-adm-nav shadow">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><h1 class="display-1 fw-medium text-light">Cuida!<span class="h1 fst-italic">adm</span></h1></a>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="<?php  echo "./adm.php?email=$email" ?>">Meus eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"></a>
              </li>
            </ul>
            <span class="navbar-text">
              <svg xmlns="http://www.w3.org/2000/svg" height="72" viewBox="0 0 128 129" fill="none">
                <path d="M61.4839 52.664C61.9292 52.8107 62.3852 52.9187 62.8519 52.988C63.5932 53.1747 64.3439 53.308 65.1039 53.388C65.4658 55.1294 66.4039 56.6981 67.7669 57.8409C69.1298 58.9837 70.8381 59.6339 72.616 59.6866C74.3938 59.7393 76.1376 59.1914 77.5658 58.1314C78.9941 57.0713 80.0235 55.5609 80.4879 53.844C81.3599 50.7 81.8079 47.452 81.8199 44.188C83.7302 41.5994 85.3003 38.7763 86.4919 35.788L86.5439 35.668L86.9719 34.628L87.5199 33.244C88.1053 31.7278 88.6587 30.1995 89.1799 28.66L89.2879 28.34L89.3279 28.212C89.5999 27.412 89.8719 26.524 90.1279 25.628C90.2799 25.1107 90.4252 24.588 90.5639 24.06C91.2215 21.7187 91.6528 19.3197 91.8519 16.896V16.776C91.9212 14.7922 91.2506 12.8534 89.9702 11.3365C88.6898 9.81952 86.8912 8.83278 84.9239 8.568C83.3679 8.36833 81.7878 8.64004 80.3879 9.348C79.1585 9.97054 78.1107 10.9001 77.3461 12.0466C76.5815 13.1931 76.1261 14.5177 76.0239 15.892V15.932C75.7123 18.378 75.1356 20.7828 74.3039 23.104C73.9039 24.304 73.5039 25.444 73.1039 26.464C72.2986 26.0507 71.4666 25.704 70.6079 25.424L70.5319 25.388C66.9301 24.2429 63.0221 24.5631 59.6547 26.2792C56.2873 27.9953 53.7317 30.9691 52.5415 34.5563C51.3514 38.1435 51.6226 42.0552 53.2965 45.4438C54.9703 48.8324 57.9119 51.4251 61.4839 52.66V52.664ZM76.6279 52.788C76.415 53.5777 75.96 54.2809 75.3268 54.7986C74.6936 55.3163 73.914 55.6225 73.0977 55.6742C72.2814 55.7258 71.4695 55.5203 70.776 55.0866C70.0826 54.6528 69.5426 54.0126 69.2319 53.256C69.9919 53.12 70.7372 52.928 71.4679 52.68C73.6698 51.9003 75.6945 50.6901 77.4239 49.12C77.2239 50.3573 76.9586 51.58 76.6279 52.788ZM56.1879 35.748C56.6157 34.4582 57.2934 33.2653 58.1823 32.2375C59.0713 31.2097 60.154 30.3671 61.3687 29.7579C62.5834 29.1487 63.9062 28.7848 65.2616 28.687C66.617 28.5893 67.9783 28.7595 69.2679 29.188L69.3879 29.228C70.1692 29.4787 70.9172 29.804 71.6319 30.204L71.5479 30.4V30.448C70.6551 32.5303 69.4402 34.4593 67.9479 36.164L67.8839 36.228L67.7839 36.344C67.656 36.4942 67.5226 36.6396 67.3839 36.78L66.9839 36.628L66.8639 36.588C66.2273 36.3775 65.5333 36.4277 64.9337 36.7275C64.334 37.0274 63.8775 37.5525 63.6639 38.188C63.5428 38.4974 63.4907 38.8296 63.5115 39.1613C63.5322 39.4929 63.6252 39.816 63.7839 40.108C64.0239 40.62 64.4319 41.032 64.9399 41.276C65.0732 41.308 65.2066 41.3453 65.3399 41.388C65.7026 41.5187 66.0746 41.6 66.4559 41.632C67.0648 41.668 67.6713 41.5292 68.2039 41.232C68.4839 41.088 68.7506 40.9227 69.0039 40.736C69.6786 40.208 70.2892 39.6147 70.8359 38.956L70.8759 38.916C72.6645 36.9033 74.1189 34.617 75.1839 32.144C75.3079 31.8601 75.4252 31.5734 75.5359 31.284V31.224L75.5759 31.128C75.7984 30.6067 76.0145 30.0827 76.2239 29.556L76.3599 29.208L76.4959 28.856C78.1919 24.796 79.3759 20.54 80.0279 16.188C80.0652 15.7027 80.1852 15.2373 80.3879 14.792C80.6196 14.2968 80.9505 13.8543 81.3599 13.492C82.1352 12.8027 83.1522 12.4489 84.1879 12.508C85.0479 12.556 85.8679 12.892 86.5079 13.468C86.9554 13.8604 87.3097 14.3476 87.545 14.8943C87.7802 15.441 87.8906 16.0333 87.8679 16.628C87.8252 17.268 87.7519 17.9347 87.6479 18.628C87.3279 20.6013 86.8799 22.544 86.3039 24.456L86.1359 25.016C85.4078 27.399 84.5872 29.7528 83.6759 32.072L83.5439 32.408C83.3174 32.9822 83.0854 33.5542 82.8479 34.124L82.7879 34.268L82.4439 35.1C81.0384 38.3639 79.1299 41.3873 76.7879 44.06C74.9137 46.4434 72.3596 48.201 69.4639 49.1C68.1053 49.4669 66.688 49.5647 65.2919 49.388C64.7219 49.3165 64.1578 49.2043 63.6039 49.052C63.3128 49.0235 63.0258 48.9631 62.7479 48.872C61.4552 48.4413 60.2601 47.7602 59.2307 46.8674C58.2014 45.9747 57.358 44.8879 56.7488 43.6691C56.1396 42.4504 55.7765 41.1235 55.6803 39.7644C55.584 38.4052 55.7565 37.0405 56.1879 35.748ZM48.2399 16.42C47.8212 16.7168 47.3472 16.9266 46.846 17.0371C46.3448 17.1475 45.8265 17.1564 45.3219 17.0632C44.8172 16.9699 44.3363 16.7765 43.9076 16.4942C43.479 16.212 43.1113 15.8467 42.8262 15.4199C42.5412 14.9931 42.3446 14.5135 42.248 14.0094C42.1515 13.5054 42.1569 12.9871 42.2641 12.4852C42.3713 11.9833 42.578 11.5079 42.872 11.0872C43.166 10.6666 43.5414 10.3091 43.9759 10.036C44.8225 9.50381 45.8434 9.3229 46.8214 9.53174C47.7993 9.74057 48.6572 10.3227 49.2127 11.1543C49.7681 11.9858 49.9772 13.0013 49.7956 13.9847C49.6139 14.968 49.0558 15.8417 48.2399 16.42ZM95.8719 91.804C96.2948 91.5037 96.7736 91.2912 97.2801 91.1791C97.7865 91.067 98.3103 91.0576 98.8205 91.1514C99.3306 91.2453 99.8168 91.4404 100.25 91.7254C100.684 92.0104 101.055 92.3794 101.344 92.8105C101.632 93.2417 101.831 93.7263 101.929 94.2357C102.027 94.7451 102.021 95.269 101.913 95.7763C101.805 96.2836 101.596 96.7641 101.299 97.1893C101.002 97.6145 100.623 97.9759 100.184 98.252C99.3287 98.7897 98.2976 98.9727 97.3096 98.7621C96.3217 98.5515 95.4548 97.9639 94.8932 97.1242C94.3317 96.2845 94.1198 95.2589 94.3026 94.2655C94.4853 93.272 95.0483 92.3889 95.8719 91.804ZM99.8679 36.148C101.098 36.148 102.279 35.6591 103.149 34.789C104.019 33.9188 104.508 32.7386 104.508 31.508C104.508 30.2774 104.019 29.0972 103.149 28.227C102.279 27.3569 101.098 26.868 99.8679 26.868C98.6373 26.868 97.4571 27.3569 96.5869 28.227C95.7167 29.0972 95.2279 30.2774 95.2279 31.508C95.2279 32.7386 95.7167 33.9188 96.5869 34.789C97.4571 35.6591 98.6373 36.148 99.8679 36.148ZM26.6039 35.364C26.0976 35.7178 25.5259 35.9669 24.9221 36.0968C24.3183 36.2267 23.6946 36.2347 23.0877 36.1205C22.4807 36.0062 21.9027 35.7719 21.3875 35.4314C20.8723 35.0908 20.4302 34.6508 20.0873 34.1372C19.7443 33.6235 19.5074 33.0466 19.3903 32.4402C19.2732 31.8338 19.2784 31.2101 19.4055 30.6057C19.5326 30.0013 19.779 29.4284 20.1304 28.9205C20.4818 28.4126 20.9311 27.98 21.4519 27.648C22.4756 26.9648 23.7288 26.7163 24.9358 26.9571C26.1428 27.1979 27.2047 27.9083 27.8879 28.932C28.5711 29.9557 28.8196 31.2089 28.5788 32.4159C28.338 33.6229 27.6276 34.6848 26.6039 35.368" fill="white"/>
                <path d="M117.584 60.06C117.086 60.2912 116.547 60.4215 115.999 60.4434C115.45 60.4654 114.903 60.3786 114.388 60.188C110.146 58.6023 105.569 58.126 101.091 58.8043C96.6129 59.4826 92.3823 61.293 88.7999 64.064C98.108 64.304 107.208 66.84 115.292 71.46C117.269 72.5758 118.724 74.4278 119.341 76.6123C119.958 78.7967 119.686 81.1365 118.585 83.1214C117.484 85.1063 115.642 86.5753 113.462 87.2082C111.283 87.8411 108.941 87.5865 106.948 86.5C102.163 83.7221 96.8408 81.9954 91.3363 81.4346C85.8318 80.8739 80.271 81.4921 75.0239 83.248C76.364 85.82 77.3679 88.556 78.0039 91.388C78.2319 92.232 78.3439 93.108 78.3399 93.98C78.4764 95.0855 78.3758 96.2074 78.0447 97.2709C77.7137 98.3345 77.1598 99.3153 76.4199 100.148C76.0999 100.468 75.7466 100.747 75.3599 100.984C74.1781 102.119 72.7253 102.933 71.1399 103.348L20.1879 116.988C18.5452 117.426 16.8159 117.424 15.1741 116.982C13.5324 116.54 12.0361 115.673 10.8359 114.469C9.63564 113.264 8.77377 111.765 8.33702 110.122C7.90026 108.479 7.90403 106.749 8.34794 105.108L21.9879 54.148C22.4068 52.5447 23.2337 51.0771 24.3879 49.888C24.6173 49.5173 24.8839 49.1773 25.1879 48.868C25.9952 48.1475 26.9442 47.6037 27.9741 47.2717C29.0039 46.9397 30.0918 46.8267 31.1679 46.94C32.1399 46.916 33.1119 47.04 34.0479 47.308C36.5327 47.8674 38.9417 48.7215 41.2239 49.852C42.3439 43.372 41.2639 36.7 38.1479 30.908C37.5592 29.81 37.4307 28.5231 37.7907 27.3304C38.1508 26.1376 38.9699 25.1368 40.0679 24.548C41.1659 23.9592 42.4529 23.8307 43.6456 24.1908C44.8383 24.5509 45.8392 25.37 46.4279 26.468C51.1041 35.1837 52.2828 45.3539 49.7239 54.908C52.8295 57.1116 55.7817 59.5238 58.5599 62.128C59.4026 61.2737 60.5458 60.7825 61.7455 60.7592C62.9453 60.7359 64.1066 61.1823 64.9818 62.0033C65.8571 62.8242 66.3768 63.9546 66.4303 65.1534C66.4837 66.3522 66.0666 67.5244 65.2679 68.42C65.8386 68.1933 66.4173 67.976 67.0039 67.768C72.2757 65.8735 77.7733 64.6793 83.3559 64.216C82.8642 63.8214 82.4676 63.3211 82.1956 62.7523C81.9236 62.1834 81.7832 61.5607 81.7847 60.9301C81.7863 60.2996 81.9297 59.6776 82.2045 59.1101C82.4793 58.5426 82.8783 58.0442 83.3719 57.652C88.0932 53.9181 93.6986 51.4664 99.6453 50.5344C105.592 49.6023 111.679 50.2215 117.316 52.332C118.089 52.6247 118.757 53.1391 119.239 53.8107C119.72 54.4824 119.992 55.2812 120.02 56.1069C120.049 56.9325 119.833 57.7483 119.4 58.4516C118.966 59.1549 118.334 59.7145 117.584 60.06ZM46.0319 89.488L45.3079 88.868L45.9719 89.436L46.0319 89.488ZM16.2159 113.12C17.1759 113.38 18.1919 113.38 19.1559 113.124L21.4679 112.52C18.1987 110.149 15.2619 107.351 12.7359 104.2L12.2119 106.16C11.8206 107.614 12.0225 109.164 12.7733 110.469C13.5241 111.774 14.7624 112.727 16.2159 113.12ZM22.5999 103.092C25.4477 105.716 28.6512 107.926 32.1159 109.656L43.3079 106.66C38.9524 104.087 34.8887 101.049 31.1879 97.6C26.3484 93.0291 22.1236 87.8483 18.6199 82.188L15.4439 94.064C17.3903 97.3966 19.7996 100.436 22.5999 103.092ZM36.6679 91.752C42.0061 96.6807 48.1304 100.682 54.7879 103.592L64.7519 100.92C55.6394 97.3185 47.4307 91.7564 40.7079 84.628C38.3514 82.2889 36.1292 79.8183 34.0519 77.228C33.1319 76.0867 32.2733 74.9493 31.4759 73.816C28.4861 69.7726 26.0986 65.3169 24.3879 60.588L21.5759 71.232C25.3964 78.8846 30.5011 85.8252 36.6679 91.752ZM114.804 76.112C114.408 75.6402 113.924 75.249 113.38 74.96H113.36C106.581 71.0823 99.0236 68.7628 91.2365 68.1699C83.4493 67.5769 75.6279 68.7254 68.3399 71.532L67.5719 71.812L67.6079 71.852C60.0281 74.8841 53.2616 79.6453 47.8479 85.756C48.8839 86.664 49.8879 87.496 50.8839 88.296C52.2799 89.416 53.6839 90.452 55.2839 91.496C59.6489 86.4723 65.1819 82.5986 71.396 80.216C77.455 77.8393 83.9706 76.8544 90.4614 77.3342C96.9522 77.814 103.252 79.7462 108.896 82.988C109.827 83.5465 110.925 83.7576 111.997 83.5841C113.069 83.4107 114.045 82.8637 114.752 82.0401C115.459 81.2164 115.852 80.1691 115.862 79.0835C115.871 77.9979 115.497 76.9479 114.804 76.112Z" fill="white"/>
              </svg>
            </span>
          </div>
        </div>
      </nav>
		
    <div class="vh-100 w-25 bg-adm-nav bg-gradient d-inline-flex align-items-center flex-column pt-5">
      <h1 class="display-6 fw-medium text-light text-center mb-3" style="text-shadow: -3px 2px 0px rgba(15, 15, 15, 0.2); -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: rgba(0, 0, 0, 0.08);"><?php echo $evento['titulo'] ?></h1>
      <button type="button" class="btn btn-warning text-white"><a href="../backend/apagar.php<?php echo "?identificador=$eventoId&email=$email" ?>" class="text-white">Apagar evento</a></button>
    </div>
	<div class="d-inline-flex w-50 ms-5 ps-5 gap-4 flex-wrap justify-content-center"  >
		<div class="d-flex align-items-center flex-column">
			<h1 class="text-secondary"> Data </h1>
			<ul>
				<li class=" fw-medium text-tertiary" > <?php $data = date_create($evento['data_hora']); echo date_format($data, "d/m/Y") ?> </li>
			</ul>
		</div>
		<div class="d-flex align-items-center flex-column">
			<h1 class="text-secondary"> Organização </h1>
			<ul>
				<li class=" fw-medium text-tertiary" > <?php echo $evento['adm'] ?> </li>
			</ul>
		</div>
		<div class="d-flex align-items-center flex-column">
			<h1 class="text-secondary"> Descrição </h1>
			<ul>
				<li class=" fw-medium text-tertiary" > <?php echo $evento['descricao'] ?> </li>
			</ul>
		</div>
		<div class="d-flex align-items-center flex-column">
			<h1 class="text-secondary"> Horário </h1>
			<ul>
				<li class=" fw-medium text-tertiary" > <?php $data = date_create($evento['data_hora']); echo date_format($data, "h:i:s") ?> </li>
			</ul>
		</div>
		<div class="d-flex align-items-center flex-column">
    <h1 class="text-secondary"> Inscritos </h1>
			
      <table class="table table-bordered text-light"> 
              <a href="#"><thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                </tr>
              </thead></a>
              <tbody>
              <?php
                while($inscricoes = $comandoSelect2->fetch()){
                  $nome        = $inscricoes['nome'];
                  $email       = $inscricoes['email'];
                  echo "<tr>
                          <td>
                            $nome
                          </td>
                          <td>
                            $email
                          </td>
                        </tr>";
                }
              ?>
        </tbody>
      </table>

		</div>
	</div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>