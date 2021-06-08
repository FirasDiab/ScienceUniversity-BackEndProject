<?php
include('../entity/form.php');
include('partials/header_admin.php');

$form = new Form();
?>

<div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($form->getForm() as $gForm) {
                                echo "<tr>";
                                echo "<td>". $gForm['full_name'] . "</td>";
                                echo "<td>". $gForm['mobile'] . "</td>";
                                echo "<td>". $gForm['email'] . "</td>";
                                echo "<td>". $gForm['message_content'] . "</td>";
                                echo "<td><a href='delete_form.php?id={$gForm['id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

<?php
include('partials/footer_admin.php');
?>

