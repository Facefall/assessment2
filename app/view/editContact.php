<div class="container">
    
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 box text-center">
            Update Contact
        </div>
        <div class="col-sm-3"></div>
        
    </div>
    
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 jumbotron">
            <form class="form-horizontal" action="" method="post"  novalidate="true" enctype="multipart/form-data">

                <div class="table-hover form-group">
                    <label class="text-left">
                        Portrait Photo :
                    </label>
                    <img style="width: 20%" src="
                <?php
                    if( file_exists("assets/img/photos/".$data["photo_filename"]) ) echo "assets/img/photos/".$data["photo_filename"];
                    else echo "assets/img/photos/default.png";
                    ?>
                " alt="" class="img-thumbnail center-block">
                </div>

                <div class="form-group">
                    <label>
                        First Name
                    </label>
                    <input class="form-control" type="text" name="first_name" maxlength='30' value='<?=$data['first_name']?>'/>
                </div>
                
                
                <div class="form-group">
                    <label>
                        Last Name
                    </label>
                    <input class="form-control" type="text" name="last_name" maxlength='30' value='<?=$data['last_name']?>'/>
                </div>
                
                
                <div class="form-group">
                    <label>
                        Email
                    </label>
                    <input class="form-control" type="email" name="email" maxlength='30' value='<?=$data['email']?>'/>
                </div>
                
                
                <div class="form-group">
                    <label>
                        Mobile
                    </label>
                    <input class="form-control" type="text" name="mobile" maxlength='30' value='<?=$data['mobile']?>'/>
                </div>
                
                
                <div class="form-group">
                    <label>
                        Photo
                    </label>               
                        <input class="form-control" type="file" name="photo_filename"/>
                </div>
                
                
                <input type="submit" value="UPDATE" class="btn btn-primary btn-block" name="update"> 
        </form>
        </div>
        <div class="col-sm-3"></div>
    </div>    
</div>



