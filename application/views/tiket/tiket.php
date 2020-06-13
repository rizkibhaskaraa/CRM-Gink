<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tiket/tiket.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/body.css')?>">
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
		$(function () {
		$('#dateline').datepicker({
            dateFormat: 'yy-mm-dd'
	});
	});
	</script>

    <title>Gink Technology</title>
</head>
<body>
    <h1><?php echo $status?></h1>
    <div class="container-tiket">
        <div class="judul">
            <h3>Buat Tiket</h3>
        </div>
        <form action="<?php echo base_url('index.php/tiket/addtiket/').$id_employ?>" method="POST">

        <!-- jika CS yang buat tiket dari complain customer-->
            <?php if($status == "CS"){?>
                <input type="text" name="id_pelanggan" value="<?php echo $id_pelanggan?>" hidden>
                <div class="form-group">
                    <label for="title">Customer</label>
                    <input type="text" class="form-control" name="customer" id="customer" placeholder="<?php echo $customer?>" value="<?php echo $customer?>" readonly>
                </div>
                <div class="form-group">
                    <label for="title">Layanan</label>
                    <input type="text" class="form-control" name="layanan" id="layanan" placeholder="<?php echo $layanan?>" value="<?php echo $layanan?>" readonly>
                </div>
                <div class="form-group">
                    <label for="masalah">Jenis Masalah</label>
                    <select name="masalah" id="masalah" class="form-control">
                        <option value="umum">General</option>
                        <option value="support">Support</option>
                        <option value="hosting">Hosting</option>
                        <option value="biling">Billing</option>
                    </select>
                </div>
            <!-- akhir jika CS yang buat tiket dari complain customer-->
            <!-- jika staff yang buat tiket untuk staff lainnya-->
            <?php }else{?>
                <input type="text" name="id_pelanggan" value="<?php echo $id_pelanggan?>" hidden>
                <input type="text" name="masalah" value="" hidden>
                <input type="text" name="layanan" value="" hidden>
                <div class="form-group">
                    <label for="departemen">Departemen tujuan</label>
                    <select name="departemen" id="departemen" class="form-control">
                        <option value="developer">Developer</option>
                        <option value="finance">Finance</option>
                    </select>
                </div>
            <?php }?>
            <div class="form-group">
                <label for="title">Judul Tugas</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="judul / subject">
                <?= form_error('title', '<span class="text-danger">', '</span>') ?>
            </div>
            <div class="form-group">
                <label for="dateline">Deadline</label>
                <input type="text" class="form-control" name="dateline" id="dateline">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="isi deskripsi"></textarea>
                <?= form_error('deskripsi', '<span class="text-danger">', '</span>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Buat</button>
            <button type="reset" class="btn btn-primary">Reset</button>
            <!-- akhir jika staff yang buat tiket untuk staff lainnya-->
        </form>
    </div>
</body>
</html>