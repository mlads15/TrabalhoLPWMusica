<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>

<style>

body {

  background-color: #121212;

}

.card {

  width: 280px;
  background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
  border-radius: 24px;
  padding: 16px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
  color: #fff;
  font-family: 'Helvetica Neue', sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;

}

.card:hover {

  transform: scale(1.03);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.5);

}

.card img {

  width: 100%;
  height: auto;
  border-radius: 16px;
  object-fit: cover;

}

.card h2 {

  font-size: 18px;
  font-weight: 600;
  margin: 0;
  text-align: center;

}

.card p {

  font-size: 14px;
  color: #aaa;
  text-align: center;

}

.container-cards {

  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  padding: 32px;

}

.titulo-cards {

  text-align: center;
  font-size: 28px;
  color: #1db954; /* verde do Spotify */
  margin-top: 40px;
  margin-bottom: 20px;
  font-family: Arial, sans-serif;
  letter-spacing: 1px;

}

</style>

</head>
<body>
    
    <h1 class="titulo-cards">Cards</h1>
    <div class="container-cards">
        <?php
            define('BASE_PATH', __DIR__);

            require_once(BASE_PATH . "/dao/MusicaDAO.php");

            $musicaDao = new MusicaDAO();
            $arrayMus = $musicaDao->listarMusicas();

            foreach($arrayMus as $mus)
            {?>
                <div class="card" style="background: linear-gradient(145deg, <?= $mus->getCorCardDetalhado() ?>, #1e1e1e);">
                    <img src="<?= $mus->getImagem() ?>" alt="Imagem da música">
                    <h2>Título: <?= $mus->getTitulo() ?></h2>
                    <p>ID: <?= $mus->getId() ?></p>
                    <p>Gênero: <?= $mus->getGeneroDetalhado() ?></p>
                    <p>Artista: <?= $mus->getArtista() ?></p>
                    <a href="<?= $mus->getLinkMusica() ?>">Link da Música</a>
                </div>  
                
            <?php 
            } //FIM DO FOREACH 

        ?>

    </div>
</body>
</html>