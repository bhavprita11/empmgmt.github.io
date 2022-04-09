<?php include_once 'aheader.php'; ?>
<script>
    $(function () {
        $('#tblstds').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                extend: 'excelHtml5',
                title: 'Employees Record'
            },
            {
                extend: 'pdfHtml5',
                title: 'Employees Record'
            }
            ]
        });
    });
</script>
<div class="container-fluid p-2">
    <div class="card shadow">
        <div class="card-body">
            <a href="addemp.php" class="btn btn-primary btn-sm float-right">Add New</a>
            <h5 class="p-2" style="border-bottom: 2px solid green;">All Employees</h5>
             <table id="tblstds" class="table table-bordered table-sm">
        <thead class="table-dark">
            <tr>
                <th>Select</th>
                <th style="width:100px;">Emp Id</th>
                <th>Emp Name</th>
                <th>Father Name</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email Id</th>
                <th>City</th>
                <th>Qualification</th>                  
            </tr>
        </thead>
        <tbody>
            <?php foreach (findall("emps","1=1") as $row) { ?>
                <tr>
                    <td><a href='addemp.php?empid=<?= $row["empid"] ?>' 
                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Select</a></td>
                    <td><?= $row["empid"] ?></td>
                    <td><?= $row["ename"] ?></td>
                    <td><?= $row["father"] ?></td>
                    <td><?= $row["gender"] ?></td>
                    <td><?= $row["phone"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["city"] ?></td>
                    <td><?= $row["qual"] ?></td>                                     
                </tr>
            <?php } ?>
        </tbody>
    </table>
        </div>
    </div>
   
</div>

<?php include_once 'afooter.php'; ?>