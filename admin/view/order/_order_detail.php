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
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $order_detail = get_order_by_orderdetail($_GET['order_id']) ?>

                            <?php foreach ($order_detail as $item) { ?>
                                <?php $prname = get_product($item['product_id']) ?>
                                <tr>
                                    <td>
                                        <?php echo $prname['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $item['quantity'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($item['total']) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="order_detail.php" method="post">
                                <?php $order = find_order_by_id($order_id);
                                ?>
                                <input type="hidden" name="id" value="<?php echo $order_id?>">
                                <label for="">Đơn hàng</label>


                                <select name="status" class="form-select">
                                    <option value="1" <?php if ($order['status'] == 1)
                                        echo 'selected'; ?>>Đang xử lý
                                    </option>
                                    <option value="2" <?php if ($order['status'] == 2)
                                        echo 'selected'; ?>>Đang giao hàng
                                    </option>
                                    <option value="3" <?php if ($order['status'] == 3)
                                        echo 'selected'; ?>>Giao hàng thành
                                        công</option>
                                    <option value="4" <?php if ($order['status'] == 4)
                                        echo 'selected'; ?>>Hủy đơn hàng
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Cập nhật trạng thái</button>
                            </form>
                        </div>
                    </div>
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