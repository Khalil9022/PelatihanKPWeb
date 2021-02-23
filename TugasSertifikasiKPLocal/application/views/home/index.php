<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
  <div class="row mb-4 p-md-3">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?= base_url() ?>assets/img/slide1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-4">Welcome World!</h1>
          <hr class="my-4">
          <p class="lead">Berbagai macam seputaran anime & cartoon.</p>
          <a class="btn btn-primary btn-lg" href="<?= base_url() ?>posts" role="button">Learn more</a>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url() ?>assets/img/slide2.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-4">Hello, world!</h1>
          <hr class="my-4">
          <p class="lead">Berbagai macam seputaran anime manga.
          <p>"masih dalam tahap pengembangan"</p>
          </p>
        </div>
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
</div>

<h3 class="pb-4 mb-4 font-italic">LATEST UPDATE</h3>

<div class="row mb-2">
  <?php foreach ($postterbaru as $post) : ?>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Anime</strong>
          <h3 class="mb-0" style="-webkit-line-clamp:1; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;"><?= $post['judul'] ?></h3>
          <div class="mb-1 text-muted">Genre : <?= $post['genre'] ?></div>
          <p class="text-muted">Status : <?= $post['episode'] == null ?  "-" : $post['status']; ?></p>
          <p style="-webkit-line-clamp:2; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;" class="card-text mb-auto"><?= $post['isi'] ?></p>
          <a href="<?= base_url() ?>posts/detail/<?= $post['id_post'] ?>" class="stretched-link">Lihat Selengkapnya</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
          </svg>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Kata Pengantar Dari Saya
      </h3>

      <div class="blog-post">
        <h2 class="blog-post-title">Graveyard Keeper</h2>
        <p class="blog-post-meta">February 16, 2021 </p>
        <p>Graveyard Keeper is a graveyard-themed simulation role-playing video game developed by Lazy Bear Games and published by tinyBuild. The game's alpha version was released for Microsoft Windows in May 2018</p>
        <hr>
        <p>The player takes the role of a person hit by a car and awakes to find himself in an unfamiliar world with medieval fantasy setting where he is tasked to take care of the local cemetery and church.</p>
      </div><!-- /.blog-post -->

      <div class="blog-post">
        <h2 class="blog-post-title">New feature</h2>
        <p class="blog-post-meta">Februari, 17 2021 by <a href="#">Khalil</a></p>

        <p>Update LOG</p>
        <ul>
          <li>Penambahan login</li>
          <li>Penambahan update, hapus</li>
          <li>Fix bug searching</li>
        </ul>
        <p>Semoga log tersebut bisa membantu </p>
      </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->