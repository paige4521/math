<?php
    require_once('../admin/config.php');
    require_once(SITE_ROOT.DS.'admin'.DS.'functions.php');
    require_once('../inc/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="info-bar">
                <h2>Basic Math (Addition) </h2>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <table class="responsive-table">
                <tbody>
                    <?php $res = genNumber(); for($i = 1; $i < 11; ++$i):?>
                    <tr class="math">
                        <td class="text-start">
                            <span style="border: none;"><?php echo $i.". "; ?></span> 
                            <span style="width:60px"><?php echo $res[$i-1]['first']; ?></span> 
                            <span class="text-center border-0">+</span> 
                            <span style="width:60px"><?php echo $res[$i-1]['second']; ?></span>
                            <span class="text-center border-0">=</span>
                            <span class="text-center border-0" id=<?php echo "sp-res-".$i-1; ?>>
                                <input class="ps-2 border-end-0 border-top-0 border-start-0" type="number" style="max-width:80px" name=<?php echo "input-".$i-1; ?> id=<?php echo "input-".$i-1; ?>>
                            </span>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-12">
        <table class="responsive-table">
                <tbody>
                    <?php for($i = 11; $i < 21; ++$i):?>
                    <tr class="math">
                        <td class="text-start">
                            <span style="border: none;"><?php echo $i.". "; ?></span> 
                            <span style="width:60px"><?php echo $res[$i-1]['first']; ?></span> 
                            <span class="text-center border-0">+</span> 
                            <span style="width:60px"><?php echo $res[$i-1]['second']; ?></span>
                            <span class="text-center border-0">=</span>
                            <span class="text-center border-0" id=<?php echo "sp-res-".$i-1; ?>>
                                <input class="ps-2 border-end-0 border-top-0 border-start-0" type="number" style="max-width:80px" name=<?php echo "input-".$i-1; ?> id=<?php echo "input-".$i-1; ?>>
                            </span>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        <a href="../users/dashboard.php">Back to Dashboard</a>
    </div>
</div>




<script>
    var res = <?php echo json_encode($res); ?>;
    $("[id^=input-]").change(function(){
        var no = $(this).attr("id").split('-');
        var value = $(this).val();
        $("#sp-res-"+no[1]).addClass( value != res[no[1]]["res"] ? "wrong-res": "correct-res");
        $(this).prop("disabled",'true');
    });
    console.log(res);
</script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php require_once('../inc/footer.php');