CARA PAKAI
1. Ekstrak folder "acara8" ke D:\xampp\htdocs\
2. Nyalakan Apache dan MySQL di XAMPP Control Panel.
3. Buka http://localhost/phpmyadmin -> tab Import -> pilih database/industri.sql -> Go.
   (File ini otomatis membuat database "latihan" dan tabel "industri".)
4. Buka folder acara8 di Visual Studio Code (File > Open Folder).
5. Buka http://localhost/acara8/index.php di browser.

Jika password MySQL Anda bukan kosong, ubah "" pada new mysqli("localhost","root","","latihan")
di index.php, delete.php, input/input.php, edit/index.php, dan edit/edit.php.
