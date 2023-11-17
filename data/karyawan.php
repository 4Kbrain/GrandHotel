<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="sweetalert.min.css">
<style>
              @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

      :root {
        --primary: #0077b6;
        --secondary: red;
        --black: #333;
        --white: #fff;
        --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      }

      * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform: capitalize;
        transition: 0.2s linear;
      }

      html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-padding-top: 9rem;
        scroll-behavior: smooth;
      }

      html::-webkit-scrollbar {
        width: 0.8rem;
      }

      html::-webkit-scrollbar-track {
        background: transparent;
      }

      html::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 0.5rem;
      }

      section {
        padding: 5rem 7%;
      }

      .heading {
        font-size: 4rem;
        color: var(--primary);
        text-align: center;
        text-transform: uppercase;
        font-weight: bolder;
        margin-bottom: 3rem;
      }

      .btn {
        display: inline-block;
        margin-top: 1rem;
        padding: 1rem 3rem;
        background: var(--primary);
        border-radius: 0.5rem;
        color: var(--white);
        font-size: 1.7rem;
        cursor: pointer;
      }

      .btn:hover {
        background: var(--secondary);
      }

      /* header */

      .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: var(--black);
        box-shadow: var(--box-shadow);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 2rem 9%;
      }

      .header .logo {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--white);
        font-style: italic;
        font-style: ;
      }

      .header .logo i {
        color: var(--primary);
        padding-right: 0.5rem;
      }

      .header .navbar a {
        font-size: 1.7rem;
        color: var(--white);
        margin: 0 1rem;
      }

      .header .navbar a:hover {
        color: var(--primary);
      }

      .header .navbar .btn {
        margin-top: 0;
        color: var(--white);
      }

      .header .navbar .btn:hover {
        color: var(--white);
      }

      #menu-btn {
        display: none;
        font-size: 2.5rem;
        margin-left: 1.7rem;
        cursor: pointer;
        color: var(--black);
      }

      #menu-btn:hover {
        color: var(--primary);
      }

      /* end */

      table {
        margin-top:100px;
      }

      .tabble .btn {
        color: var(--white);
        background-color: var(--primary);

      }

      /* input*/
      .tambah {

        color: var(--white);
        background-color: var(--primary);
        text-align: center;
        justify-content: center;
        border-radius: 5px;
        font-size: 4rem;
        text-transform: uppercase;
        color: var(--white);
        line-height: 1.1;
        padding: 2rem 0;
        text-shadow: 1px 1px 3px rgba(1, 1, 1, 0.5);
      }

      .add h3 {
        background-color: var(--primary);
      }
    </style>
</head>
<body>    <!-- header start -->
    <header class="header">
      <a href="#" class="logo">
        Grand<span style="color: coral">Emporium</span>
      </a>
      <nav class="navbar">
        <a href="admin.html" class="active">Beranda</a>
        <a href="karyawan.php">Karyawan</a>
        <a href="kamar.php">Kamar</a>
        <a href="fasilitas.php">Fasilitas</a>
        <a href="logout.php" class="btn">Logout</a>
      </nav>
      <div id="menu-btn" class="fas fa-bars"></div>
    </header>



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nama depan</th>
      <th scope="col">nama belakang</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  </tbody>

<?php 
include '../koneksi.php';
$amountdata = '20';
$data = mysqli_query($conn, "SELECT * FROM orang LIMIT 0, $amountdata");
while ($row = mysqli_fetch_array($data)):
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row ['prim']?></th>
      <td><?php echo $row['nama_depan']?></td>
      <td><?php echo $row['nama_belakang']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['password']?></td>
      <td>
        <a href="edit/edit-karyawan.php?id=<?php echo $row['prim']?>">Edit</a>
        <a href="delete/delete-karyawan.php?id=<?php echo $row['prim']?>">Hapus</a>
      </td>
    </tr>
</tbody> 

  <?php endwhile; ?>
  </table>

<div class="add">
  <a href="input/input-karyawan.php" class="tambah"><h3>tambahkan</h3></a>
</div>


<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>