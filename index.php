<!DOCTYPE html>
<html>
<head>
    <title>Android Push Notification using GCM</title>
    <script type="text/javascript" src="assets/jquery-3.1.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">

                <h2 align="center">FAAST Android Push Notification </h2>

                <form action="">
                    <div class="col-lg-4">
                        <select class="form-control" name="" id="">
                            <option value="0">Select type of notification</option>
                            <option value="1">Invoice Generated Notification</option>
                            <option value="2">90% Data Consumption</option>
                            <option value="3">Due Date Notification For Unpaid Users</option>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <button class="btn btn-success">Go</button>
                    </div>
                </form>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>
</html>