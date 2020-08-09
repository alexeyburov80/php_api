<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <h3 class="text-primary">Тестовое задание <a
                href="https://ulyanovsk.hh.ru/resume/b0ed5ca1ff07ce3ec00039ed1f6f543057656d">Буров Алексей</a></h3>
    <h5>API для приема контактных данных клиентов</h5>
    <hr style="border-top:1px dotted #ccc;"/>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span
                class="glyphicon glyphicon-plus"></span> Add Contact
    </button>
    <h4 class="info text-primary"><?php echo 'added '.$_GET["response"] .' lines' ?></h4>
    <br/><br/ >

    <table class="table table-bordered">
        <thead class="alert-info">
        <tr>
            <th>Source ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require 'conn.php';
        $query = $conn->prepare("SELECT * FROM `contacts`");
        $query->execute();
        while ($fetch = $query->fetch()) {
            ?>
            <tr>
                <td><?php echo $fetch['source_id'] ?></td>
                <td><?php echo $fetch['name'] ?></td>
                <td><?php echo $fetch['phone'] ?></td>
                <td><?php echo $fetch['email'] ?></td>
                <td>
                    <button class="btn btn-warning" type="button" data-toggle="modal"
                            data-target="#update_contact<?php echo $fetch['id'] ?>"><span
                                class="glyphicon glyphicon-edit"></span> Edit
                    </button>
                    <a href="delete.php?id=<?php echo $fetch['id'] ?>" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a></td>
            </tr>

            <div class="modal fade" id="update_contact<?php echo $fetch['id'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="update_contact.php" method="POST">
                            <div class="modal-header">
                                <h3 class="modal-title">Update Contact</h3>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Source ID</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $fetch['source_id'] ?>" name="source_id"/>
                                        <input type="hidden" class="form-control" value="<?php echo $fetch['id'] ?>"
                                               name="id"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch['name'] ?>"
                                               name="name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch['phone'] ?>"
                                               name="phone"/>

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="<?php echo $fetch['email'] ?>"
                                               name="email"/>
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="modal-footer">
                                <button class="btn btn-warning" name="update"><span
                                            class="glyphicon glyphicon-update"></span> Update
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                            class="glyphicon glyphicon-remove"></span> Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
        </tbody>
    </table>

    <form method="POST" action="insert_array.php">
        <textarea class="form-control" rows="9" id="contact_list" name="contact_list">
            {
                "source_id": 1,
                "items": [
                    { "name": "Анна", "phone": 9001234453, "email": "mail1@gmail.com" },
                    { "name": "Иван", "phone": "+79001234123", "email": "mail2@gmail.com" }
                ]
            }

        </textarea>
        <button class="btn btn-primary" name="array">Add array</button>
    </form>

</div>
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="save_contact.php">
                <div class="modal-header">
                    <h3 class="modal-title">Add Contact</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Source ID</label>
                            <input type="text" class="form-control" name="source_id"/>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email"/>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button class="btn btn-primary" name="save">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>