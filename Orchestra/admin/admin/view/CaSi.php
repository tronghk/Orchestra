<?php
    include '../inc/header.php';
    include '../controller/ArtistManager.php';

?>
<?php
    
    $class = new ArtistManager();
    $helper = new Format();
    $class->get();
    $class->edit();
    $class->add();
    
    $rEdit = $class->editSinger();
    $rAdd = $class->addSinger();
    $rDelete = $class->deleteSinger();
    $class->search();


    $row = 0;
    $length = 1;
    $list = $_SESSION["list"];
    $trang =$_SESSION["trang"];
    $object = $_SESSION['object'];
    $add = $_SESSION['add'];


    if($list != null)
        $length = $class->count();
        $row = ceil($length/6);
    if($row*6 < $length)
        $row = $row+1;

        
    if($rEdit != null){
        $message = "Sửa ca sĩ ".$helper->messageResult($rEdit);
    }
    if($rAdd != null){
        $message = "Thêm ca sĩ ".$helper->messageResult($rAdd);
    }

    if($rDelete != null){
        $message = "Xóa ca sĩ ".$helper->messageResult($rDelete);
    }
    ?>



            <!-- Chuyển hướng con trỏ -->
            <div class="page-header">
                <h4 class="page-title m-1">Dữ liệu</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="bi bi-house"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="bi bi-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Phát triển</a>
                        </li>
                        <li class="separator">
                            <i class="bi bi-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Ca sĩ</a>
                        </li>
                    </ul>
            </div>

            <!-- Content -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Thêm ca sĩ</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <a href="CaSi.php?add=''">
                        <i class="bi bi-plus"></i>
                            Thêm ca sĩ
                        </a>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row m-2">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="add-row_length">
                                    <label>Show
                                        <select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm">
                                            <option value="10">10</option><option value="25">25</option><option value="50">50</option>
                                            <option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6">
                                                <div id="add-row_filter" class="dataTables_filter">
                                                    <label>Search:
                                                    <form action="" method="post">
                                                            <input type="search" name="search" value="<?php echo $_SESSION['search']; ?>"   class="form-control form-control-sm" placeholder="" aria-controls="add-row">
                                                            </form>
                        </label>
                    </div>
                    </div>
                        </div>
                        <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                            <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Mã: activate to sort column descending" style="width: 74.05px;">Mã</th><th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Tên: activate to sort column ascending" style="width: 199.475px;">Tên</th><th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Hình: activate to sort column ascending" style="width: 77.775px;">Hình</th><th style="width: 196.225px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th></tr>
                            </thead>
                            <tfoot>
                                <tr><th rowspan="1" colspan="1">Mã</th><th rowspan="1" colspan="1">Tên</th><th rowspan="1" colspan="1">Hình</th><th rowspan="1" colspan="1">Action</th></tr>
                            </tfoot>
                            <tbody>                                                                    
                               
                                        <?php
                                            if($list != null){

                                                    foreach($list as $value){
                                                        $id = $value->get_idArtist();
                                                        $name = $value->get_name();
                                                        $image= $value->get_image();
                                                        echo'
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">
                                                                '.$id.'
                                                                </td>  
                                                                <td>
                                                                    '.$name.'
                                                                </td>
                                                                <td><img src="'.$image.'" style="height: 50px; width: 40px;"></td>
                                                                <td>
                                                                        <div class="form-button-action">
                                                                            
                                                                            <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                                            data-original-title="Edit">
                                                                            <a href="CaSi.php?edit='.$id.'">
                                                                            edit</a>
                                                                            </button>

                                                                            <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                                            data-original-title="delete">
                                                                            
                                                                            <a href="CaSi.php?delete='.$id.'">
                                                                            <i class="fa fa-times"></i>
                                                                            delete</a>
                                                                            </button>
                                                            
                                                                        </div>  
                                                                </td>            
                                                        </tr>
                                                    '; 
                                                    }
                                                }
                                ?>           
                                </tbody>
                        </table>
                        <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                    <?php
                                    echo 'Showing '.$trang.' to '.$row.' of 6 entries '
                                ?></div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                    <ul class="pagination">
                                    <?php
                                            if($trang == 1){
                                                echo'
                                                <li class="disabled paginate_button page-item previous" id="add-row_previous">
                                                <a aria-controls="add-row" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                ';
                                            }else{
                                                echo'
                                                <li class=" paginate_button page-item previous" id="add-row_previous">
                                                <a href="CaSi.php?trang='.($trang-1).'" aria-controls="add-row" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                ';
                                            }
                                            for($i = 1;$i <= $row; $i++)
                                            {
                                                if($trang != $i){
                                                    echo '<li class="paginate_button page-item active" ><a href="CaSi.php?trang='.$i.'"
                                                    id='.$i.' style="background-color: blue !important"  aria-controls="add-row" data-dt-idx="1" tabindex="0"
                                                    class="page-link">'.$i.'</a></li>';
                                                }else{
                                                    echo '<li class="paginate_button page-item active" ><a href="#"
                                                    id='.$i.' style="background-color: red !important"  aria-controls="add-row" data-dt-idx="1" tabindex="0"
                                                    class="page-link">'.$i.'</a></li>';
                                                }
                                            }

                                            if($trang == $row){
                                                echo'
                                                <li class="disabled paginate_button page-item previous" id="add-row_previous">
                                                <a aria-controls="add-row" data-dt-idx="0" tabindex="0" class="page-link">Next</a>
                                                </li>
                                                ';
                                            }else{
                                                echo'
                                                <li class=" paginate_button page-item previous" id="add-row_previous">
                                                <a href="CaSi.php?trang='.($trang+1).'" aria-controls="add-row" data-dt-idx="0" tabindex="0" class="page-link">Next</a>
                                                </li>
                                                ';
                                            }
                                            ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
    <?php
            include '../inc/footer.php'
        ?>
    </div>
   
    <?php
    if($object != null){
        $image ="/image/".$object->get_image();
        echo'
        <form action="CaSi.php" method="post" class="form-add align-content-center justify-content-center " style="display: flex;">
        <div class="form-group add-form" >
             <a href="CaSi.php?trang='.($trang).'" >
                <i class="out bi bi-x-circle-fill"></i>
           </a>
            <h1 class="card-title text-center m-lg-3 mt-0" >
                Thông tin ca sĩ
            </h1>
    
            <span >Mã ca sĩ:</span> <input name="id" required="required" readonly="readonly" value="'.$object->get_idArtist().'" type="text">
            <span >Tên ca sĩ:</span> <input name="name" required="required" value="'.$object->get_name().'" type="text"> <br><br>
            <span >Mô tả ca sĩ:</span> <br> <textarea name="des" id="" cols="60" rows="3">'.$object->get_des().'</textarea>
                       
             
            <br>
            <div class="optionAdd">
                <div class="d-block text-center">
                    <br><br>
                    Lựa chọn: <br>
                    <button  type="submit"  class="load-form btn btn-primary btn-round ml-auto text-center " style="width: 150px; height: 40px; margin-top: 15px;">
                            
                    <i class="bi bi-plus"></i>
                        Sửa thông tin
                    </button>
                    
                </div>
                <div class="image-add" style="position: relative;">
                    <img style="width:150px;height:150px" class="update-image" src="'.$image.'" alt="Image preview...">
                    <input onchange="readUrl(this)"  type="file" name="image" class="text-center" style="position: absolute; bottom: -30px; border: none;left:24%;width:82px" id="imageAdd" > 
                    </div>
               
                
            </div>
            
    
        </div>
    </form>
        ';
    }
    if($add != null){
        echo'
        <form action="CaSi.php" method="post" class="form-add align-content-center justify-content-center " style="display: flex;">
        <div class="form-group add-form" >
             <a href="CaSi.php?trang='.($trang).'" >
                <i class="out bi bi-x-circle-fill"></i>
           </a>
            <h1 class="card-title text-center m-lg-3 mt-0" >
                Thông tin ca sĩ
            </h1>
    
            <span >Mã ca sĩ:</span> <input name="idadd" required="required" readonly="readonly" value="'.$add.'" type="text">
            <span >Tên ca sĩ:</span> <input name="nameadd" required="required" value="" type="text"> <br><br>
            <span >Mô tả ca sĩ:</span> <br> <textarea name="desadd" id="" cols="60" rows="3"></textarea>
                       
             
            <br>
            <div class="optionAdd">
                <div class="d-block text-center">
                    <br><br>
                    Lựa chọn: <br>
                    <button  type="submit"  class="load-form btn btn-primary btn-round ml-auto text-center " style="width: 150px; height: 40px; margin-top: 15px;">
                            
                    <i class="bi bi-plus"></i>
                        Thêm album
                    </button>

                </div>
                <div class="image-add" style="position: relative;">
                    <img style="width:150px;height:150px" class="update-image" src="'.$image.'" alt="Image preview...">
                    <input onchange="readUrl(this)"  type="file" name="imageadd" class="text-center" style="position: absolute; bottom: -30px; border: none;left:24%;width:82px" id="imageAdd" > 
                    </div>
               
                
            </div>
            
    
        </div>
    </form>
        ';
    }
   ?>
   <?php
    if($rEdit != null || $rAdd != null || $rDelete != null){
        echo'
                        <div class="message-action" style="width:100%;display:flex;justify-content:center">
                        <div id="msgAlert" class="panel-body text-center" style="position: fixed;top:0;z-index: 1001; width:130%;">
                        <div class="form-alert">
                            <div class="alert">
                                '.$message.'
                            </div>
                        </div>
                        
                    </div>
                    </div>
                    
                <script>
                setTimeout(function(){
                    $("#msgAlert").fadeOut("slow");
                },2000); 

                </script>
        ';
    }
   ?>
    
</body>
</html>