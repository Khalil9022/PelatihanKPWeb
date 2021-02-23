<main role="main" class="container">
    <div class="row">
        <div class="col-2 ">
        </div>
        <div class="col-8 mx-2 my-2">
            <form method="POST" enctype="multipart/form-data">
                <div class="card mx-4" style="width: 40rem;">
                    <div class="card-body">
                        <h4 class="text-md-center"><?= $judul ?></h4>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Judul</label>
                            <input type="text" class="form-control" id="" name="judul" value="<?= $post['judul'] ?>">
                            <?= form_error('judul', '<small class = "text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">isi</label>
                            <textarea name="isi" id="isi" rows="5" class="form-control"><?= $post['deskripsi'] ?></textarea>
                            <?= form_error('isi', '<small class = "text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Genre </label>

                            <select class="form-control" id="genre" name="genre">
                                <?php foreach ($listgenre as $genre) : ?>
                                    <option value="<?= $genre['nama_genre'] ?>" selected="selected"><?php echo $genre['nama_genre'] ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Episode</label>
                            <br>
                            <input type="number" id="" name="episode" value="<?= $post['episode'] ?>"> /
                            <input type="number" id="" name="max_episode" value="<?= $post['max_episode'] ?>">
                            <br>
                            <?= form_error('episode', '<small class = "text-danger"> ', '</small>') ?>
                            <?= form_error('max_episode', '<small class = "text-danger">', '</small>') ?>
                        </div>
                        <!-- <div class="form-group">
                            <label for="img">Image : </label>
                            <input type="file" class="form-control" name="img">
                        </div> -->
                        <button type="submit" class="btn btn-primary" name="submit">Confirm</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</main>