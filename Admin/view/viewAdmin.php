<div class="table-responsive">
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
$admin = view_admin();
foreach ($admin as $result) {
    ?>
        <tr>
            <th scope="row"><?php echo $result['userID']; ?></th>
            <td><?php echo $result['username']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['uType']; ?></td>
            <td><?php if ($_SESSION['admin']['user_name'] != $result['username']) {?><a href="<?php echo $base_url . "?p=home&a=viewAdmin&id=" . $result['userID'] . "&type=" . $result['status']; ?>
" onclick="return confirm('Do you want to change?');"><?php if ($result['status'] == '1') {echo '<span class="badge badge-primary">Active</span>';} else {echo '<span class="badge badge-secondary">Inactive</span>';}
    ;?></a><?php }?></td>
            <td> <?php if ($_SESSION['admin']['user_name'] != $result['username']) {?> <a
                    href="<?php echo $base_url . "?p=home&a=deleteAdmin&id=" . $result['userID'] . "&img=" . $result['image'];  ?>" onClick="return confirm('Are you absolutely sure you want to delete?')" ><?php }?>
                    <?php if ($_SESSION['admin']['user_name'] != $result['username']) {?><button
                        class="btn btn-danger">Delete</button></a><?php }?></td>
        </tr>
        <?php
} 
?>
    </tbody>
</table>