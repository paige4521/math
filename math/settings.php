<?php
    require_once('../admin/config.php');
    require_once(SITE_ROOT.DS.'admin'.DS.'functions.php');
    require_once('../inc/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="info-bar">
                <h2><i class="fas fa-cogs"></i> Math Settings</h2>
            </div>
        </div>
        <div class="offset-md-4 col-md-4 col-6 offset-3">
            <div class="card w-100 mt-5 shadow">
                <div class="card-body">
                    <h5 class="card-title p-3" style="margin: -1rem -1rem 1rem -1rem">Set Minimum &amp; Maximum Value here</h5>
                    <form method="post" action="../admin/math_setting.php">
                        <div class="mb-3 row">
                            <label for="minVal" class="col-sm-6 col-form-label text-end">Minimum :</label>
                            <div class="col-6">
                                <input type="number" step="1" class="form-control" id="minVal" name="minVal" placeholder="5" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="maxVal" class="col-sm-6 col-form-label text-end">Maximum :</label>
                            <div class="col-sm-6">
                                <input type="number" step="1" class="form-control" id="maxVal" name="maxVal" placeholder="10" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-success btn-sm" style="width:70px">Set</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" style="width:70px">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <a href="../users/dashboard.php">Back to Dashboard</a>
    </div>
</div>

<?php require_once('../inc/footer.php');