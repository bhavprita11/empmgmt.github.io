<?php include_once 'aheader.php'; ?>
<script>
    $(function () {
        $('#tblstds').DataTable();
    });
</script>
<div class="container-fluid p-2">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">All Users</h5>
             <table id="tblstds" class="table table-bordered table-sm">
        <thead class="table-dark">
            <tr>                
                <th>User Id</th>
                <th>User Name</th>
                <th>Role</th>
                <th>Password</th>
                <th>Active</th>                                  
            </tr>
        </thead>
        <tbody>
            <?php foreach (allrecords("users") as $row) { ?>
                <tr>                   
                    <td><?= $row["userid"] ?></td>
                    <td><?= $row["uname"] ?></td>
                    <td><?= $row["role"] ?></td>
                    <td><?= $row["pwd"] ?></td>
                    <td><?= $row["active"]==1?"Active":"InActive" ?></td>                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
        </div>
    </div>
   
</div>

<?php include_once 'afooter.php'; ?>