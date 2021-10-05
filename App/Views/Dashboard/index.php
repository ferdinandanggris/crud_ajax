<div class="container">
    <h1 class="my-3">Dashboard</h1>
    <div class="row">
        <div class="detail-data mb-5" style="display: none;">
            <div class="card" style="width: 80%;">
                <div class="container">
                    <div class="modal-header mb-4">
                        <h3 class="mx-3">Detail Data</h3>
                        <button type="button" class="btn-close close"></button>
                    </div>
                    <ul class="">
                        <li style="list-style-type: none;" class="">
                            <dl>
                                <dd class="text-muted">Nama Lengkap</dd>
                                <dt class="fw-bolt detail-nama"></dt>
                            </dl>
                            <dl>
                                <dd class="text-muted">Tempat dan Tanggal Lahir</dd>
                                <dt class="fw-bolt detail-ttl"></dt>
                            </dl>
                            <dl>
                                <dd class="text-muted">Pekerjaan</dd>
                                <dt class="fw-bolt detail-pekerjaan"></dt>
                            </dl>
                            <dl>
                                <dd class="text-muted">Agama</dd>
                                <dt class="fw-bolt detail-agama"></dt>
                            </dl>
                            <dl>
                                <dd class="text-muted">Jenis Kelamin</dd>
                                <dt class="fw-bolt detail-jenkel"></dt>
                            </dl>
                            <dl>
                                <dd class="text-muted">Alamat</dd>
                                <dt class="fw-bolt detail-alamat"></dt>
                            </dl>
                        </li>
                    </ul>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close">Close</button>
                        <button class="btn btn-warning ubah detail-ubah" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $p["id"]; ?>>edit</button>
                        <button class="btn btn-danger hapus detail-hapus" onclick="return confirm('Yakin?')" data-id="<?= $p["id"]; ?>">hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="card mx-5 mb-5" style="width: 80%;">
    <div class="container">
        <h3 class="mx-3 mt-3">Data Penduduk</h3>
        <hr>
        <button class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Data</button>
        <div class="col-md-5">
            <input class="form-control my-3 " id="keyword" type="text" placeholder="Masukkan keyword pencarian.." aria-label="default input example" name="keyword" value="">
        </div>
        <div class="data">
        </div>
    </div>
</div>
<div class="mb-5">
    &nbsp;
</div>
<!-- modal -->
<div class="modal fade" id="formModal" class="tambah" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Form Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row mx-3 my-3 form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" id="nama" name="nama" value="" required autofocus>
                        <p class="text-danger" id="errNama"></p>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" required>
                            <p class="text-danger" id="errTempatLahir"></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" required>
                            <p class="text-danger" id="errTanggalLahir"></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                            <p class="text-danger" id="errPekerjaan"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <input type="text" class="form-control" id="agama" name="agama" required>
                            <p class="text-danger" id="errAgama"></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
                        <br>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="jenkel1" value="Laki-laki" name="jenis_kelamin" id="jenkel1" required>
                                <label class="form-check-label" for="jenkel1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenkel2" value="Perempuan" id="jenkel2" required>
                                <label class="form-check-label" for="jenkel2">Perempuan</label>
                            </div>
                        </div>
                        <p class="text-danger" id="errJenisKelamin"></p>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                        <p class="text-danger" id="errAlamat"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-submit" id="submit" name="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#submit').click(function() {
        const id = document.getElementById('id').value;
        const nama = document.getElementById('nama');
        const tempat_lahir = document.getElementById('tempat_lahir');
        const tanggal_lahir = document.getElementById('tanggal_lahir');
        const pekerjaan = document.getElementById('pekerjaan');
        const agama = document.getElementById('agama');
        const jenkel1 = document.getElementById('jenkel1');
        const jenkel2 = document.getElementById('jenkel2');
        // const alamat = document.getElemetById('alamat');

        //validation
        nama.value == "" ? $('#errNama').html("Masukkan nama anda") : $('#errNama').html("");

        tempat_lahir.value == "" ? $('#errTempatLahir').html("Masukkan Tempat Lahir") : $('#errTempatLahir').html("");

        tanggal_lahir.value == "" ? $('#errTanggalLahir').html("Masukkan Tanggal Lahir") : $('#errTanggalLahir').html("");

        pekerjaan.value == "" ? $('#errPekerjaan').html("Masukkan Pekerjaan") : $('#errPekerjaan').html("");

        agama.value == "" ? $('#errAgama').html("Masukkan Agama") : $('#errAgama').html("");

        if (jenkel1.checked == false && jenkel2.checked == false) {
            $('#errJenisKelamin').html("Jenis Kelamin Harus Dipilih")
        } else {
            $('#errJenisKelamin').html("")
        }

        alamat.value == "" ? $('#errAlamat').html("Masukkan Alamat") : $('#errAlamat').html("");


        if (nama.value != "" && tempat_lahir.value != "" && tanggal_lahir.value != "" && pekerjaan.value != "" && agama.value != "" && jenkel1.checked == true || jenkel2.checked == true && alamat.value != "") {
            if (id == "") {
                $.post("http://localhost/crud_ajax/Public/Dashboard/tambah", {
                    nama: nama.value,
                    tempat_lahir: tempat_lahir.value,
                    tanggal_lahir: tanggal_lahir.value,
                    pekerjaan: pekerjaan.value,
                    agama: agama.value,
                    jenis_kelamin: jenkel1.checked == true ? jenkel1.value : jenkel2.value,
                    alamat: alamat.value
                }, function(response, status) {
                    alert(status);
                    $('.data').load("http://localhost/crud_ajax/Public/Dashboard/data");
                });
            } else {
                $.post("http://localhost/crud_ajax/Public/Dashboard/ubah", {
                    id: $('#id').val(),
                    nama: nama.value,
                    tempat_lahir: tempat_lahir.value,
                    tanggal_lahir: tanggal_lahir.value,
                    pekerjaan: pekerjaan.value,
                    agama: agama.value,
                    jenis_kelamin: jenkel1.checked == true ? jenkel1.value : jenkel2.value,
                    alamat: alamat.value
                }, function(response, status) {
                    alert(response);
                    $('.data').load("http://localhost/crud_ajax/Public/Dashboard/data");
                });
            }
        }
    });

    ///pencarian
    $('#keyword').keyup(function() {
        $.post("http://localhost/crud_ajax/Public/Dashboard/cari", {
            keyword: $(this).val()
        }, function(res) {
            $('.data').html(res);
        })
    })
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.data').load("http://localhost/crud_ajax/Public/Dashboard/data");
    });
</script>