<!--this is the page to display all the brands with edit and delete option-->
<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered table-success table-striped-columns mt-2">
    <thead >
        <tr>
            <th>Sl.No</th>
            <th>Brands Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_brands = "select * from brands";
        $result_brands = mysqli_query($con,$get_brands);
        $nos = 0;
        while($row_fetch=mysqli_fetch_assoc($result_brands))
        {
            $brands_id = $row_fetch['brands_id'];
            $brands_title = $row_fetch['brands_category'];
            $nos++;
            ?>
            <tr class='text-center'>
            <td><?php echo $nos; ?></td>
            <td><?php echo $brands_title; ?></td>
            <td><a href="index.php?edit_brands=<?php echo $brands_id; ?>" class="btn btn-info text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="index.php?delete_brands=<?php echo $brands_id; ?>"  class="btn btn-danger text-light" ><i class="fa-solid fa-trash"></i></a></td></td>
         </tr>
         
         <?php
        }
        ?>
    </tbody>
</table>