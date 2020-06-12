<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tiket/tiket.css')?>">
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <title>Gink Technology</title>
</head>
<body>
    <div class="container-tiket">
        <div class="judul">
            <h3>Buat Tiket</h3>
        </div>
        <form action="<?php echo base_url('index.php/tiket/addtiket/').$id_employ?>" method="POST">
            <div class="form-group">
                <label for="title">Judul Tugas</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="dateline">Deadline</label>
                <input type="text" class="form-control" name="dateline" id="dateline">
            </div>
            <div class="form-group">
                <label for="departemen">Departemen tujuan</label>
                <select name="departemen" id="departemen" class="form-control">
                    <option value="developer">Developer</option>
                    <option value="finance">Finance</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Buat</button>
        </form>
    </div>
</body>
</html>