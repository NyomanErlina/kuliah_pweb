<!DOCTYPE html>

    <head>
       <title>Belajar Laravel</title>
    </head>
    <body>
       
       <p>Nama: {{ $nama }} </p>
       <br>

       @foreach($matkul as $mk)
       		<li>{{ $mk }}</li>
       	@endforeach
    </body>
</html>
