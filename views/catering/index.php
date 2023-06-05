<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?= $data['title']; ?></h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-sm-12">

                <?php Flasher::Message(); ?>

            </div>

        </div>

        <div class="card">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title'] ?></h3> 

                <div class="btn-group float-right">

                    <a href="<?= base_url; ?>/catering/tambahCatering" class="btn float-right btn-xs btn btn-primary">Tambah Catering</a>
        
                    <a href="<?= base_url; ?>/catering/laporanCatering" class="btn float-right btn-xs btn btn-info">Laporan Catering</a>

                </div>
            
            </div>


            <div class="card-body">

                <form action="<?= base_url; ?>/catering/cariCatering" method="post">

                    <div class="row mb-3">

                        <div class="col-lg-6">

                            <div class="input-group">

                                <input type="text" class="form-control" placeholder="" name="key" >

                                <div class="input-group-append">

                                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>

                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/catering" >Reset</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </form>

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th style="width: 10px">#</th>

                            <th>Nama Pesanan</th>

                            <th>Menu 1</th>

                            <th>Menu 2</th>

                            <th>Menu 3</th>

                            <th>Menu 4</th>

                            <th>Menu 5</th>

                            <th>Harga</th>
                            
                            <th style="width: 150px">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $no=1; ?>

                        <?php foreach ($data['catering'] as $row) :?>

                            <tr>

                                <td><?= $no; ?></td>

                                <td><?= $row['nama_pesanan'];?></td>

                                <td><?= $row['menu1'];?></td>

                                <td><?= $row['menu2'];?></td>

                                <td><?= $row['menu3'];?></td>

                                <td><?= $row['menu4'];?></td>

                                <td><?= $row['menu5'];?></td>

                                <td><div class="badge badge-warning">Rp.<?=$row['harga'];?></div></td>

                                <td>

                                    <a href="<?= base_url; ?>/catering/editCatering/<?= $row['id'] ?>" class="badge badge-info">Edit</a> 

                                    <a href="<?= base_url; ?>/catering/hapusCatering/<?= $row['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>

                                </td>

                            </tr>

                        <?php $no++; endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>
