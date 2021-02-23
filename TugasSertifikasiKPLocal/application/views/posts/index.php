<main role="main" class="container my-4">
    <div class="row">
        <div class="col-md-8 blog-main">
            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="row">
                    <div class="col-md-12 alert alert-success">
                        Post Berhasil <?= $this->session->flashdata('pesan') ?>
                        <?php $this->session->unset_userdata('pesan'); ?>
                    </div>
                </div>
            <?php endif ?>
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                List
            </h3>
            <?php foreach ($posts as $post) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="https://placehold.co/150x200" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h3 class="text-truncate"><?= $post['judul']; ?></h3>
                        <p>genre : <?= $post['genre']; ?></p>
                        <p>Espiode : <?= $post['episode'] == null ? "-" : $post['episode']; ?> / <?= $post['max_episode'] == null ? "-" : $post['max_episode'] ?></p>
                        <p>Status : <?= $post['episode'] == null ?  "-" : $post['status']; ?></p>
                        <p style="-webkit-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;"><?= $post['isi'] ?></p>
                        <a href="<?= base_url() ?>posts/detail/<?= $post['id_post'] ?>">Lihat Selengkapnya...</a>
                        <br>
                        <?php if (logged_in()) : ?>
                            <a role="button" href="<?= base_url() ?>posts/update/<?= $post['id_post'] ?>" class="btn btn-success btn-sm">Update ></a>
                            <a role="button" href="<?= base_url() ?>posts/hapus/<?= $post['id_post'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda ingin menghapusnya?')">Hapus ></a>
                        <?php endif ?>
                    </div>

                </div>
                <hr>
            <?php endforeach; ?>
            <?= $this->pagination->create_links(); ?>
        </div><!-- /.blog-main -->