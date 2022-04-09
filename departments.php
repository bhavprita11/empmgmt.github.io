<?php include_once 'aheader.php'; ?>
<div class="container-fluid p-2">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">Department Master</h5>
            <div class="row">
                <div class="col-sm-8">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Dept Code</th>
                                <th>Dept Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(allrecords("departments") as $r) { ?>
                            <tr>
                                <td><?= $r["dcode"] ?></td>
                                <td><?= $r["dname"] ?></td>
                                <td><a href="departments.php?dcode=<?= $r["dcode"] ?>" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <form method="post" action="savedept.php">
                        <?php
                        $dname="";
                        $dcode="";                        
                        if(isset($_GET["dcode"])) {
                            $dcode=$_GET["dcode"];
                            $dname= single("departments", "dcode='$dcode'")["dname"];
                            ?>
                            <input type="hidden" name="action" value="update">
                        <?php }  ?>
                        <div class="form-group">
                            <label>Department Code</label>
                            <input type="text" name="dcode" value="<?= $dcode ?>" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" name="dname" value="<?= $dname ?>" class="form-control form-control-sm">
                        </div>
                        <input type="submit" class="btn btn-primary btn-sm" value="Save Department">
                        <a href="departments.php" class="btn btn-danger btn-sm">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'afooter.php'; ?>
