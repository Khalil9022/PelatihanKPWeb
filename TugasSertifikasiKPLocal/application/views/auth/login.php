  <form class="box " enctype="multipart/form-data" method="post">
      <?php if ($this->session->flashdata('alert')) : ?>
          <div class="row">
              <div class="col-md-12 alert alert-success">
                  <?= $this->session->flashdata('alert') ?>
                  <?php $this->session->unset_userdata('alert'); ?>
              </div>
          </div>
      <?php endif ?>
      <h2>Login</h2>

      <input type="email" name="email" placeholder="Email" value="<?= set_value('email')  ?>">
      <?= $this->session->flashdata('message') ?>
      <?php $this->session->unset_userdata('message'); ?>
      <?= form_error('email', '<small class = "text-danger">', '</small>') ?>

      <input type="password" name="password" placeholder="Password" value="<?= set_value('password')  ?>">
      <?= form_error('password', '<small class = "text-danger">', '</small>') ?>
      <?= $this->session->flashdata('message2') ?>
      <?php $this->session->unset_userdata('message2'); ?>
      <input type="submit" name="" value="Login">
      <small class="text-white">Belum punya akun? <a href="<?= base_url() ?>auth/register" class="font-weight-bold">Daftar</a></small>
      <br>
      <small class="text-white"><a href="<?= base_url() ?>" class="font-weight-bold">
              < Kembali</a>
      </small>
  </form>