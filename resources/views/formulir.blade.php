<!DOCTYPE html>

    <head>
       <title>Belajar Laravel</title>
    </head>
    <body>
       <h3>Belajar Post Pada Laravel</h3>
       <form action="/formulir/proses" method="post">
       	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
       	Nama : <input type="text" name="nama"><br>
       	Alamat : <input type="text" name="alamat"><br>
       	<input type="submit" value="simpan">
       </form>
       
    </body>
</html>
