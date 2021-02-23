<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>My Bloggu</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/blog/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/all.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/blog.css">


</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-1 pt-1">
                    <form action="<?= base_url(); ?>" method="POST" class="form-inline my-2 my-lg-0">
                        <input type="hidden" value="" name="keyword">
                        <button class="nav-link btn text-muted" type="home" name="home">Home</button>
                    </form>
                </div>
                <div class="col-1 pt-1">
                    <form action="<?= base_url(); ?>posts" method="POST" class="form-inline my-2 my-lg-0">
                        <input type="hidden" value="" name="keyword">
                        <button class="nav-link btn text-muted" type="submit" name="submit">List</button>
                    </form>
                </div>
                <div class="col-2 pt-1">
                    <form action="<?= base_url(); ?>posts/tambah" method="POST" class="form-inline my-2 my-lg-0">
                        <button class="nav-link btn text-muted" type="submit" name="submit">Tambah</button>
                    </form>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="<?= base_url() ?>">My Blog</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <form class="form-inline my-2 my-lg-0" method="POST" action=" <?= base_url(); ?>posts">
                        <input class="form-control form-control-sm mr-sm-2 border-secondary " type="search" placeholder="Searching.." name="keyword">
                        <button class="btn btn-sm btn-outline-secondary my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <?php if (logged_in()) : ?>
                        <a class="btn btn-sm btn-outline-warning my-2 my-sm-0 mx-3" href="<?= base_url() ?>auth/logout"><i class="fas fa-sign-out-alt"></i></a>
                    <?php else : ?>
                        <a class="btn btn-sm btn-outline-warning my-2 my-sm-0 mx-3" href="<?= base_url() ?>auth"><i class="fas fa-home"></i></a>
                    <?php endif ?>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between bg-warning">
                <form action="<?= base_url(); ?>posts/newest" method="POST" class="">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Newest</button>
                </form>
                <form action="#" method="POST" class="">
                    <button class="p-2 text-muted btn text-muted disabled" type="submit" name="submit">Complete</button>
                </form>
                <form action="#" method="POST" class="">
                    <button class="p-2 text-muted btn text-muted disabled" type="submit" name="submit">OnGoing</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="action" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Action</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="isekai" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Isekai</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="horor" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Horor</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="historical" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Historical</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="mystery" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Mystery</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="politics" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Politics</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="romance" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Romance</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="supernatural" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">Supernatural</button>
                </form>
                <form action="<?= base_url(); ?>posts/genre" method="POST" class="">
                    <input type="hidden" value="superpower" name="keywordGenre">
                    <button class="p-2 text-muted btn text-muted" type="submit" name="submit">SuperPower</button>
                </form>
            </nav>
        </div>