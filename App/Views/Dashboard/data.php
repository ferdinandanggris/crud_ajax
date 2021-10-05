<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<table class="table table-hover" id="show-data">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">TTL</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $number = 1;
        foreach ($data['penduduk'] as $p) :
        ?>
            <tr>
                <th scope="row"><?= $number; ?></th>
                <td><?= $p["nama"]; ?></td>
                <td><?= $p["tempat_lahir"] . "," . date('d F Y', strtotime($p["tanggal_lahir"])); ?></td>
                <td><?= $p["alamat"]; ?></td>
                <td><button class="btn btn-warning ubah" data-bs-toggle="modal" data-bs-target="#formModal" data-id=<?= $p["id"]; ?>>edit</button>
                    <button class="btn btn-danger hapus" data-id="<?= $p["id"]; ?>">hapus</button>
                    <button class="btn btn-info detail" data-id=<?= $p["id"]; ?>>detail</button>
                </td>
            </tr>
        <?php $number++;
        endforeach; ?>
    </tbody>
</table>



<script>
    //ubah
    $('.ubah').click(function(e) {
        var id = $(this).attr("data-id");
        $('.modal-title').html("Form Ubah Data");
        $('.btn-submit').html("Ubah Data");
        $.ajax({
            url: 'http://localhost/crud_ajax/Public/Dashboard/getubah/',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#pekerjaan').val(data.pekerjaan);
                $('#agama').val(data.agama);
                $('#alamat').val(data.alamat);
                data.jenis_kelamin == "Laki-laki" ? $('#jenkel1').prop('checked', true) : $('#jenkel2').prop('checked', true);
            }
        });
    });

    //tambah
    $('.tambahData').click(function() {
        $('.modal-title').html("Form Tambah Data");
        $('.btn-submit').html("Tambah Data");
        $('#id').val("");
        $('#nama').val("");
        $('#tempat_lahir').val("");
        $('#tanggal_lahir').val("");
        $('#pekerjaan').val("");
        $('#agama').val("");
        $('#alamat').val("");
        $('#jenkel1').prop('checked', false);
        $('#jenkel2').prop('checked', false);
    });

    //hapus
    $('.hapus').click(function() {
        var r = confirm("Yakin?");
        if (r == false) {
            return null
        }
        var id = $(this).attr("data-id");
        $.ajax({
            url: 'http://localhost/crud_ajax/Public/Dashboard/hapus/',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                alert(data.sukses);
                $('.data').load("http://localhost/crud_ajax/Public/Dashboard/data");
            }
        })
    })

    //detail
    $('.detail').click(function() {
        var id = $(this).attr("data-id");
        $('.detail-data').show("slow", "swing");
        $.ajax({
            url: 'http://localhost/crud_ajax/Public/Dashboard/getubah/',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                tanggal = data.tanggal_lahir.split("-");
                tgl = tanggal[2] + "-" + tanggal[1] + "-" + tanggal[0];
                $('.detail-ubah').attr("data-id", data.id);
                $('.detail-hapus').attr("data-id", data.id);
                $('.detail-nama').html(data.nama);
                $('.detail-ttl').html(data.tempat_lahir + "," + tgl);
                $('.detail-pekerjaan').html(data.pekerjaan);
                $('.detail-agama').html(data.agama);
                $('.detail-alamat').html(data.alamat);
                $('.detail-jenkel').html(data.jenis_kelamin);
            }
        });
    })

    $('.close').click(function() {
        $('.detail-data').hide("slow", "swing");
    })

    $('.detail-hapus').click(function() {
        $('.detail-data').hide("slow", "swing");
    })
</script>