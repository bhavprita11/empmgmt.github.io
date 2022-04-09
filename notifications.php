<?php include_once 'aheader.php'; ?>
<div class="container-fluid p-2">
    <div class="card shadow" style="min-height: 88vh">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">Notifications</h5>
            <div class="row">
                <div class="col-sm-2">
                    <!-- List group -->
                    <div class="list-group" id="myList" role="tablist">
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#compose" role="tab">Compose</a>
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#inbox" role="tab">Inbox</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#sent" role="tab">Send Items</a>  
                    </div>

                                        
                </div>
                <div class="col-sm-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane" id="compose" role="tabpanel">
                            <div class="card shadow">
                            <div class="card-body">
                                <form method="post" action="sendnoti.php">
                                    <input type="hidden" name="nfrom" value="admin">
                                    <div class="form-row form-group">
                                        <label class="col-sm-2">Select Category</label>
                                        <div class="col-sm-10">
                                            <select id="type" name="type" class="form-control form-control-sm">
                                                <option value="1">All</option>
                                                <option value="2">All Students</option>
                                                <option value="3">Paticular Class</option>
                                                <option value="4">All Teachers</option>
                                                <option value="5">Particular Teachers</option>
                                                <option value="6">Particular Student</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row form-group d-none" id="classdiv">
                                        <label class="col-sm-2">Select Class</label>
                                        <div class="col-sm-10">
                                            <select id="cid" name="cid" class="form-control form-control-sm">
                                                <?php foreach (allrecords("classes") as $c) { ?>
                                                    <option value="<?= $c["id"] ?>"><?= $c["name"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row form-group d-none" id="todiv">
                                        <label class="col-sm-2">To</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nto" placeholder="Enter Student Id or Teacher Id" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <label class="col-sm-2">Subject</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="subject" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <label class="col-sm-2">Message</label>
                                        <div class="col-sm-10">
                                            <textarea rows="10" name="msg" class="form-control form-control-sm no-resize">
                                            </textarea>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Send Now">
                                </form>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane active" id="inbox" role="tabpanel">
                            <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width:100px;">From</th>
                                    <th>Subject</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (findall("notifications", "nto='admin' order by id desc") as $r) { ?>
                                    <tr>
                                    <tr>
                                        <td><?= $r["sendtype"] ?></td>
                                        <td><?= $r["subject"] ?>
                                        <span class="float-right"><?= date('d, M y',strtotime($r["ndate"])) ?></span>
                                        </td>
                                        <td><a onclick="showme('<?= $r["id"] ?>')" href="#" class="btn btn-success btn-sm">Read</a></td>
                                    </tr>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane" id="sent" role="tabpanel">
                            <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width:100px;">To</th>
                                    <th>Subject</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (findall("notifications", "nfrom='admin' order by id desc") as $r) { ?>
                                    <tr>
                                        <td><?= $r["sendtype"] ?></td>
                                        <td><?= $r["subject"] ?>
                                            <span class="float-right"><?= date('d, M y',strtotime($r["ndate"])) ?></span>
                                        </td>
                                        <td><a onclick="showme('<?= $r["id"] ?>')" href="#" class="btn btn-success btn-sm">Read</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#type").change(function () {
            let type = $(this).val();
            if (type == "3") {
                $("#classdiv").removeClass("d-none");
            } else if (type == "5" || type == "6") {
                $("#todiv").removeClass("d-none");
            } else {
                $("#classdiv").addClass("d-none");
                $("#todiv").addClass("d-none");
            }
        });
    });
    function showme(id){
        console.log(id);
        var left  = ($(window).width()/2)-(500/2),
        top   = ($(window).height()/2)-(400/2),
        popup = window.open ("http://localhost/SchoolERP/readmsg.php?id="+id, "popup", "width=500, height=400, top="+top+", left="+left);        
    }
</script>
<?php include_once 'afooter.php'; ?>
