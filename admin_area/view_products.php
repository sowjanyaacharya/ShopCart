<!--this is the page to display all the products-->
<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered table-success table-striped-columns mt-2">
    <thead >
        <tr>
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_prod = "select * from products";
        $result = mysqli_query($con,$get_prod);
        $number = 0;
        while($row_fetch=mysqli_fetch_assoc($result))
        {
            $products_id = $row_fetch['products_id'];
            $products_title = $row_fetch['products_title'];
            $products_price = $row_fetch['products_price'];
            $products_image1 = $row_fetch['products_image1'];
            $products_status = $row_fetch['status'];
            //$products_title = $row_fetch['products_title'];
            $number++;
            ?>
            <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $products_title; ?></td>
            <td> <img src='./product_images/<?php echo $products_image1; ?>' class="prod_img"></td>
            <td><?php echo $products_price; ?>/-</td>
            <td><?php
            $get_count = "select * from pendingorders where products_id = $products_id";
            $results = mysqli_query($con,$get_count);
            $rows_count = mysqli_num_rows($results);
            echo $rows_count;
            ?></td>
            <td><?php echo $products_status; ?></td>
            <td><a href="index.php?edit_prod=<?php echo $products_id; ?>" class="btn btn-info text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="index.php?delete_prod=<?php echo $products_id; ?>" class="btn btn-danger text-light"><i class="fa-solid fa-trash"></i></a></td></td>
         </tr>
         <?php
        }
        ?>
    </tbody>
</table>