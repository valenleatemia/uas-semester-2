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

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/catering/updateCatering" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['catering']['id']; ?>">

                <div class="card-body">

                    <div class="form-group">

                        <label >Nama Pesanan</label>

                        <input type="text" class="form-control" placeholder="masukkan nama..." name="nama_pesanan" value="<?= $data['catering']['nama_pesanan'];?>" required>

                    </div>

                    <div class="form-group">

                        <label >Pesanan Menu 1</label>

                        <select class="form-control" name="menu1" required>

                            <option value="">Pilih Menu</option>

                            <?php foreach ($data['menu'] as $row) :?>

                                <option value="<?= $row['nama_menu']; ?>" <?php if($data['catering']['menu1'] == $row['nama_menu']) { echo "selected"; } ?>><?= $row['nama_menu']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div> 

                    <div class="form-group">

                        <label >Pesanan Menu 2</label>

                        <select class="form-control" name="menu2" required>

                            <option value="">Pilih Menu</option>

                            <?php foreach ($data['menu'] as $row) :?>

                                <option value="<?= $row['nama_menu']; ?>" <?php if($data['catering']['menu2'] == $row['nama_menu']) { echo "selected"; } ?>><?= $row['nama_menu']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div> 

                    <div class="form-group">

                        <label >Pesanan Menu 3</label>

                        <select class="form-control" name="menu3" required>

                            <option value="">Pilih Menu</option>

                            <?php foreach ($data['menu'] as $row) :?>

                                <option value="<?= $row['nama_menu']; ?>" <?php if($data['catering']['menu3'] == $row['nama_menu']) { echo "selected"; } ?>><?= $row['nama_menu']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div> 

                    <div class="form-group">

                        <label >Pesanan Menu 4</label>

                        <select class="form-control" name="menu4" required>

                            <option value="">Pilih Menu</option>

                            <?php foreach ($data['menu'] as $row) :?>

                                <option value="<?= $row['nama_menu']; ?>" <?php if($data['catering']['menu4'] == $row['nama_menu']) { echo "selected"; } ?>><?= $row['nama_menu']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div> 

                    <div class="form-group">

                        <label >Pesanan Menu5</label>

                        <select class="form-control" name="menu5" required>

                            <option value="">Pilih Menu</option>

                            <?php foreach ($data['menu'] as $row) :?>

                                <option value="<?= $row['nama_menu']; ?>" <?php if($data['catering']['menu5'] == $row['nama_menu']) { echo "selected"; } ?>><?= $row['nama_menu']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div> 

                    <div class="form-group">

                        <label >Harga</label>

                        <input type="number" class="form-control" placeholder="masukkan harga..." name="harga" value="<?= $data['catering']['harga'];?>" required>

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>