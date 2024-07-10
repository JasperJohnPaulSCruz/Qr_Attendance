<?php


include "connect.php";

    $section = $_SESSION['section'];
    $group_no = $_SESSION['groupnumber'];

    $query = "SELECT * from student where yr_sec = '$section' and group_no = '$group_no'";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $name = $row['name'];
            $imagePath = "";

            $qavatar = "SELECT * from avatar where user_id = '$user_id' limit 1";
            $qavatar_result = mysqli_query($conn, $qavatar);

            if($qavatar_result){
                $qavatar_row = mysqli_fetch_assoc($qavatar_result);
                if(!empty($qavatar_row['path']) && !empty($qavatar_row['path'])){
                    $imagePath =  $qavatar_row['path'] . $qavatar_row['name'];
                }else{
                    $imagePath = "https://ui-avatars.com/api/?name=". $name . "&background=random";
                }
            }else{
            }

            $yearAndSec = "";
            $y_q="SELECT * from yr_sec LEFT JOIN student ON yr_sec.id = student.yr_sec LIMIT 1";
            $y_r=mysqli_query($conn, $y_q);
            if(mysqli_num_rows($y_r)>0){
                $y_row = mysqli_fetch_assoc($y_r);
                $yearAndSec = $y_row['year_and_sec'];
            }

            $groupNo = "";
            $gn_q="SELECT * from group_no LEFT JOIN student ON group_no.id = student.group_no LIMIT 1";
            $gn_r=mysqli_query($conn, $gn_q);
            if(mysqli_num_rows($gn_r)>0){
                $gn_row = mysqli_fetch_assoc($gn_r);
                echo $groupNo = $gn_row['group_number'];
            }


?>

<tr class="bg-white border-b ">
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
        <img class="w-10 h-10 rounded-full" src="<?php echo $imagePath;?>" alt="Jese image">
            <div class="ps-3">
                <div class="text-base font-semibold"><?php echo ucwords($row['name'])?></div>
                <div class="font-normal text-gray-500"><?php echo $row['email'];?></div>
            </div>  
    </th>
    <td class="px-6 py-4">
        <?php echo $row['student_number'];?>
    </td>
    <td class="px-6 py-4">
        <?php echo strtoupper($yearAndSec);?>
    </td>
    <td class="px-6 py-4">
        <?php echo $groupNo;?>
    </td>
    <td class="text-center">
        <button type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Edit
        </button>
        <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Delete
        </button>
    </td>
                                            
</tr>


<?php
        }
    } else {
        // echo "Error executing query: " . mysqli_error($conn);

?>

<tr class="w-full">
    <td colSpan="5" class=" w-full text-center bg-white py-4">
        No Student Available.
    </td>
</tr>


<?php
        
    }

?>


