<?php
    $tableData = $this-> models('homeslider')->select()-> execute()->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Page</title>
    <link rel="stylesheet" href="<?= URL_ROOT; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?= URL_ROOT; ?>/public/css/all.css">
    <link rel="stylesheet" href="<?= URL_ROOT; ?>/public/css/admin_style.css">
</head>
<body>
<div class  = "products">
    <div class = "product_h2 center">
        <div class = "h2 display">
            <h2>Deal Of the Day</h2>
        </div>
        <div class = "arrow display">
            <div class = "left_arrow display" onclick = "prev_products2()">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class = "right_arrow display" onclick = "next_products2()">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <div class = "product_arrow d-flex center overflow-hidden">
        <?php
            foreach($tableData as $tableData[0]){
                $image = $tableData[0]['image'];
                $path = "../../../../public/uploads/homeslider/";
                $image_path = $path.$image;
                $tableData[0]['image'] = "<div> <img class='srcc user_src' src = '"."$image_path"."'></div>";
        ?>
                <div class = "flex center p-3 nk" id = "abs2_content">
                    <div class="bg tooltip ">
                        <span class="tooltiptext"><?= ($tableData[0]['arm_title'])?></span>
                        <?= ($tableData[0]['image']);?>
                    </div>
                </div>
        <?php
            }
        ?>

    </div>
</div>
</body>
</html>
