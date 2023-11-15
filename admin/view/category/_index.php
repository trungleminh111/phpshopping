<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="stylesheet" href="../../view/public/admin/css/style.css">
    <link rel="stylesheet" href="../../view/public/admin/css/styles.css">

    <link href="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    <?php include_once '../view/inc/_navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once '../view/inc/_sideleft.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <table class="table" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">IMG</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php $index = 0; ?>
                            <?php foreach ($category_list as $category) { ?>
                                <tr>
                                    <td>
                                        <?php echo ++$index; ?>
                                    </td>
                                    <td><img src="../../view/public/img/<?php echo $category['img']; ?>" width="70" height="70" /></td>
                                    <td>
                                        <?php echo $category['name']; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="edit.php?category_id=<?php echo
                                            $category['id']; ?>">Edit</a>
                                        <a class="btn btn-danger" href="delete.php?category_id=<?php echo
                                            $category['id']; ?> ">Delete</a>
                                    </td>
                                   


                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                 
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../view/public/admin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>

</body>

</html>