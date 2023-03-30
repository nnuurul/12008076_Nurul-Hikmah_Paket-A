<br>
<div class="row mt-3">
  <div class="col-md-4 offset-md-4">
    <div class="card">
      <div class="card-header">
        LOGIN
      </div>
      <div class="card-body">
        <form action="config/aksi_login.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Login Sebagai</label>
        <br>
          <select class="form-control" name="level">
            <option option="Masyarakat">Masyarakat </option>
            <option option="Petugas">Petugas </option>
          </select>
        </div>
        </div>

        <div class="card-footer">
          <a href="index.php?page=registrasi" class="col-md-4"> <font size="2">Belum punya akun? Daftar disini!</font> </a>
          <button type="submit" style="float: right;" name="kirim" class="btn btn-sm btn-primary">  <font size="2">LOGIN</font> </button>
        </div>
      </form>
    </div>  
  </div>
</div>
<br>