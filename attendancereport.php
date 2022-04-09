<?php include_once 'aheader.php'; ?>
<script>
    $(function () {
        $('#tblstds').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                extend: 'excelHtml5',
                title: 'Attendance Record'
            },
            {
                extend: 'pdfHtml5',
                title: 'Attendance Record'
            }
            ]
        });
    });
</script>
<div class="container-fluid p-2">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">Attendance Report</h5>
    <div class="table-responsive">
        <table id="tblstds" class="table table-bordered table-sm">
            <thead class="table-dark">
                <tr>
                    <th>Emp Id</th>
                    <th>Emp Name</th>                    
                    <th>Date</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>                
                <?php
                $sql="select * from attendance a join emps e on a.empid=e.empid order by id desc";
                foreach(alldatasql($sql) as $row) {                     
                    ?>
                <tr>
                    <td><?= $row["empid"] ?></td>
                    <td><?= $row["ename"] ?></td>
                    <td><?= $row["adate"] ?></td>
                    <td><?= $row["progress"] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
    </div>
</div>
<?php include_once 'afooter.php'; ?>