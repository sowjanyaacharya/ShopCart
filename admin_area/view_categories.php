<!--this is the page to display all the categories with edit and delete option-->
<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered table-success table-striped-columns mt-2">
    <thead >
        <tr>
            <th>Sl.No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_cat = "select * from categories";
        $result_cat = mysqli_query($con,$get_cat);
        $numbers = 0;
        while($row_fetch=mysqli_fetch_assoc($result_cat))
        {
            $cat_id = $row_fetch['category_id'];
            $cat_title = $row_fetch['category_title'];
            $numbers++;
            ?>
            <tr class='text-center'>
            <td><?php echo $numbers; ?></td>
            <td><?php echo $cat_title; ?></td>
            <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>" class="btn btn-info text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="index.php?delete_cat=<?php echo $cat_id; ?>" class="btn btn-danger text-light"><i class="fa-solid fa-trash"></i></a></td></td>
         </tr>
         <?php
        }
        ?>
    </tbody>
</table>