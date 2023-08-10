<?php require_once "app/views/admin/layouts/header.php";?>
<div class="insert_post">
    <div class="ins_post_div container-fluid" id="container-wrapper">
        <form action="<?= URL_ROOT.'/admin/dashboard'?>" method = "post" enctype = "multipart/form-data">
            <div class = "row">
                <div class = "col-lg-4">
                    <input class = "mt-3 w-100" type = "text" name = "eng_title" placeholder = "english title" />
                </div>
                <div class = "col-lg-4">
                    <input class = "mt-3 w-100" type = "text" name = "arm_title" placeholder = "armenian title" />
                </div>
                <div class = "col-lg-4 my-3">
                    <input type = "file" name = "image"/>
                </div>
            </div>
            <div class = "row">
                <div class = "col-lg-4">
                    <textarea class = "mt-3 w-100" type = "text" name = "eng_text"  placeholder = "english textarea"></textarea>
                </div>
                <div class = "col-lg-4">
                    <textarea class = "mt-3 w-100" type = "text" name = "arm_text" placeholder = "armenian textarea"></textarea>
                </div>
            </div>
            <div class = "mt-3">
                <input class = "w-75 border border-light p-2" style="background-color: #7B89EC;" type = "submit" name = "submit" value = "submit"/>
            </div>
        </form>
        <div>
            <?= get_session('error'); ?>
        </div>

        <table  class="item_class_0 class_5 mt-5" id = "myTable">
            <thead>
            <tr >

                <th scope="col" >
                    English title
                    <br>
                </th>
                <th scope="col" >
                    English text
                </th>
                <th scope="col" >
                    Armenia title
                </th>
                <th>
                    Armenia text
                </th>
                <th scope="col" >
                    Image
                    <br>
                </th>
                <!--<th scope="col" >
                    #
                </th>-->
            </tr>
            </thead>
            <tbody class="js-rows" id = "sortable">
            <?php if(!empty($data)):?>
                <?php foreach($data as $data):?>
                    <tr class="item_class_1 class_10 post_div"  style = "cursor:pointer;">
                        <td>
                            <?=htmlspecialchars($data['arm_text'])?>
                        </td>
                        <td>
                            <?=htmlspecialchars($data['eng_title'])?>
                        </td>
                        <td >
                            <?=htmlspecialchars($data['eng_text'])?>
                        </td>
                        <td>
                            <?=htmlspecialchars($data['arm_title'])?>
                        </td>
                        <td >
                            <img src = "<?= URL_ROOT.'/public/uploads/homeslider/'.$data['image'];?>" alt="img" class = "img_style">
                        </td>

                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>

    </div>
</div>
<?php require_once "app/views/admin/layouts/footer.php";?>

















































<!--  <78td  class="class_7">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square class_8 update_click"
                                 data-bs-toggle="modal"  data-id = "<?php /*= $data['id'] */?>" data-bs-target="#staticBack" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" data-id = "<?php /*= $data['id'] */?>" class="bi bi-trash3-fill class_9 del_click"
                                 data-bs-toggle="modal" data-bs-target="#staticBackdrop" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </td>-->