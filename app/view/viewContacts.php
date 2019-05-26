<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-1 text-center"></div>
        <div class="col-md-10 box text-center">View Contacts: <?=count($records)?> results</div>
        <div class="col-md-1 text-center"></div>
    </div>
    <div class="row">
        <div class="col-md-1 text-center"></div>
        <div class="col-md-10 jumbotron text-center">
            <table class="table table-striped table-hover" >
                <tr class="info">
                    <th>ID</th><th>First Name</th><th>Last Name</th><th>email</th><th>Mobile</th><th>Photo</th><th>Manage</th>
                </tr>
                <?php foreach ($records as $row): ?>
                <tr>
                    <td align="left"><?=$row['id'] ?></td>
                    <td align="left"><?=$row['first_name'] ?></td>
                    <td align="left"><?=$row['last_name'] ?></td>
                    <td align="left"><?=$row['email'] ?></td>
                    <td align="left"><?=$row['mobile'] ?></td>
                    <td align="left" style="width: 15%;">
                        <img  class="img-thumbnail" src="assets/img/photos/<?=$row['photo_filename'] ?>" />
                    </td>
                    <td align="left">
                    <a href="?action=editcontact&id=<?=$row['id']?>" >Edit</a>
                   
                    <a href="?action=deletecontact&id=<?=$row['id']?>" >Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
             </table>
        </div>
        <div class="col-md-1 text-center"></div>
    </div>
</div>
\




