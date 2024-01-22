<!--this is the page to display all the users-->
<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered table-success table-striped-columns mt-2">
    <thead>
        <?php 
            $get_userss = "select * from usertable";
            $result_userss = mysqli_query($con,$get_userss);
            $row_countsss = mysqli_num_rows($result_userss);
            ?>
            <tr>
            <th>SL.No</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Address</th>
            <th>User Image</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
    if($row_countsss == 0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No Users Registered Yet</h2>";
    }
    else
    {
        $numbs=0;
        while($row_dataas = mysqli_fetch_assoc($result_userss))
        {
            $user_id = $row_dataas['user_id'];
            $user_name = $row_dataas['user_name'];
            $user_email = $row_dataas['user_email'];
            $user_address = $row_dataas['user_address'];
            $user_image = $row_dataas['user_image'];
            $user_mobile = $row_dataas['user_mobile'];
            $numbs++;
            ?>
           <tr>
            <td><?php echo $numbs; ?></td>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $user_email ; ?></td>
            <td><?php echo $user_address; ?></td>
            <td><img src='../users_area/user_images/<?php echo $user_image; ?>' class="prod_img"></td>
            <td><?php echo $user_mobile; ?></td>
            <td><a href="index.php?delete_user=<?php echo $user_id; ?>" class="btn btn-danger text-light"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
           <?php
        }
    }
     ?>   
</tbody>
</table>