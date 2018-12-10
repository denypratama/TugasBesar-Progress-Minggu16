<?php
    //membuat koneksi
    $conn=mysqli_connect("localhost","root","","itcompany_tubesweb");

    //Cek koneksi
    if(!$conn)
    {
        die('Koneksi Error : '.mysqli_connect_errno()
        .' - '.mysqli_connect_error());
    }

    //ambil data dari tabel 
    $result=mysqli_query($conn,"SELECT * FROM pekerja");
    
    //function query
    function query($query_kedua)
    {
        global $conn;
        $result = mysqli_query($conn,$query_kedua);
        $rows =[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        return $rows;
    }

    function tambah($data)
    {
        global $conn;
        $nama=htmlspecialchars($data["Nama"]);
        $umur=htmlspecialchars($data["Umur"]);
        $pendidikan_terakhir=htmlspecialchars($data["Pendidikan_Terakhir"]);
        $pengalaman_kerja=htmlspecialchars($data["Pengalaman_Kerja"]);
        $alamat=htmlspecialchars($data["Alamat"]);
        $pekerjaan_yang_diinginkan=htmlspecialchars($data["Pekerjaan_yang_Diinginkan"]);


        $query= "INSERT INTO pekerja VALUES
                ('','$nama','$umur','$pendidikan_terakhir','$pengalaman_kerja','$alamat','$pekerjaan_yang_diinginkan')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }

    function Hapus($id)
    {
        global $conn;
        mysqli_query($conn,"DELETE FROM pekerja WHERE id=$id ");
        return mysqli_affected_rows($conn);
    }

    function Edit($data)
    {
        global $conn;

        $id                             =$data["id"];
        $nama                           =htmlspecialchars($data["Nama"]);
        $umur                           =htmlspecialchars($data["Umur"]);
        $pendidikan_terakhir             =htmlspecialchars($data["Pendidikan_Terakhir"]);
        $pengalaman_kerja               =htmlspecialchars($data["Pengalaman_Kerja"]);
        $alamat                         =htmlspecialchars($data["Alamat"]);
        $pekerjaan_yang_diinginkan      =htmlspecialchars($data["Pekerjaan_yang_Diinginkan"]);


        $query="UPDATE pekerja SET
            Nama ='$nama',
            Umur = '$umur',
            Pendidikan_Terakhir = '$pendidikan_terakhir',
            Pengalaman_Kerja = '$pengalaman_kerja',
            Alamat ='$alamat',
            Pekerjaan_yang_Diinginkan='$pekerjaan_yang_diinginkan'
            WHERE id = '$id'";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function Cari($keyword)
    {
        $sql = " SELECT * FROM pekerja
                WHERE
                Nama LIKE '%$keyword%' OR
                Umur LIKE '%$keyword%' OR
                Pendidikan_Terakhir LIKE '%$keyword%' OR
                Pengalaman_Kerja LIKE '%$keyword%' OR
                Alamat LIKE '%$keyword%' OR
                Pekerjaan_yang_Diinginkan LIKE '%$keyword%' ";  
        // kembalian ke function query dengan parameter $sql
        return query($sql);
        //pastikan $keyword pada line 77 terdapat petik satu karena nilai berupa String
    }

    function registrasi($data)
    {
        global $conn;

        //stripcslashes digunakan untuk menghilangkan blackslashes
        $username=strtolower(stripcslashes($data["username"]));

        //mysqli_real_escape_string untuk memberikan perlindungan terhadap karakter2 unik (sql_injection)
        //pada mysqli_real_escape_string terdapat 2 parameter
        $password=mysqli_real_escape_string($conn,$data["password"]);
        $password2=mysqli_real_escape_string($conn,$data["password2"]);

        //cek username sudah ada atau belum
        $result=mysqli_query($conn,"SELECT username FROM user WHERE username='$username'");

        //cek kondisi jika bernilai true maka cetak echo
        if(mysqli_fetch_assoc($result))
        {
            echo "
                <script>
                    alert('username sudah ada');
                </script>
            ";
            //agar proses insertnya gagal
            return false;
        }

        //cek konfirmasi password
        if($password!==$password2)
        {
            echo "
                <script>
                    alert('password anda tidak sama');
                </script>
                ";
                return false;
        }

        //enkripsi password
        //$password=md5($password);

        // $password=password_hash($password,PASSWORD_DEFAULT);

        //var_dump($password);

        //tambahkan user baru ke database
        mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");

        return mysqli_affected_rows($conn);
    }
?>    