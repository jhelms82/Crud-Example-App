<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
            integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
            integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous">
        </script>
        <title>Crud Operation</title>
    </head>

    <body>
        <?php require_once 'conn.php'; ?>
        <?php require_once 'process.php'; ?>
        <?php
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
            <div class="row justify-content-center">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
            </div>
        </div>
        <?php endif ?>
        <div class="container">

            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <?php
                    while ($row = $result->fetch_assoc()):
                        ?>
                    <tr>
                        <td> <?php echo $row['name']; ?></td>
                        <td>
                            <?php echo $row['location']; ?>
                        </td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <div class="row justify-content-center">
                <form action="process.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name ?>"
                            placeholder="Enter Your name">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" value="<?php echo $location ?>"
                            placeholder="Enter Your location">
                    </div>
                    <div class="form-group">
                        <?php if ($update == true): ?>
                        <button type="submit" class="btn btn-info" name="update">Update</button>
                        <?php else: ?>
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>


    </body>

</html>