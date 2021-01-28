<!doctype html>
<html lang="en">
  <head>
    <title>Belajar Laravel</title>
  </head>

  <body>
    <header>
        <nav>
            <a href="/home">Home</a>
            <a href="/tentang">Tentang</a>
        </nav>
    </header>
   
   <hr>
   <br>
   <!----Judul halaman -->
   <h2>@yield('judul')</h2>

   <!----Konten halaman -->
   @yield('konten')

   <br>
   <footer>
     <p>Percobaan membuat halaman dengan template</p>
   </footer>


  </body>
</html>