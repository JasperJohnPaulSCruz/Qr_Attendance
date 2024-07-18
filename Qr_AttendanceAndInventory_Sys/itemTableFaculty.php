<?php
session_start();

include "connect.php";

    if(isset($_SESSION['notifChange'])){
        unset($_SESSION['notifChange']);
    }

    $query = "SELECT * from items ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $i = 0;
    if($result && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $i += 1;
            $userid = $row['faculty_id'];
            $itemid = $row['item_id'];
            $name = $row['item_name'];
            $imagePath = "";

            $qavatar = "SELECT * from inventory where item_id = '$itemid' limit 1";
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

            $faculty_name="";
            $s_query = "SELECT name from user_acount where id = '$userid' limit 1";
            $s_result = mysqli_query($conn, $s_query);
            if(mysqli_num_rows($s_result)>0){
                $fetchName=mysqli_fetch_assoc($s_result);
                $faculty_name = $fetchName['name'];
            }

            $imageQR="";
            $i_query = "SELECT * from qr_code where item_id = '$itemid' limit 1";
            $i_result = mysqli_query($conn, $i_query);
            if(mysqli_num_rows($i_result)>0){
                $fetchItem=mysqli_fetch_assoc($i_result);
                $imageQR = $fetchItem['path'].$fetchItem['name'];
            }

            $imageItem="";
            $ii_query = "SELECT * from inventory where item_id = '$itemid' limit 1";
            $ii_result = mysqli_query($conn, $ii_query);
            if(mysqli_num_rows($ii_result)>0){
                $fetchItem=mysqli_fetch_assoc($ii_result);
                $imageItem = $fetchItem['path'].$fetchItem['name'];
            }

?>

<tr class="bg-white border-b hover:bg-green-100 cursor-pointer" >

    <td class="px-6 py-4 font-semibold">
        <?php echo $i;?>
    </td>
    <th scope="row" class="text-gray-900 whitespace-nowrap px-6 py-4" onclick="showItemImage('<?php echo $imageItem;?>')">
        <div class="text-base font-semibold"><?php echo ucwords($row['item_name'])?></div>
    </th>
    <td class="px-6 py-4 text-nowrap">
        <div class="relative flex items-center w-20 z-20">
            <input type="number" id="<?php echo $row['id']; ?>" onblur="updateQuantity(<?php echo $row['id']; ?>)" class="quan rounded outline-none border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 " placeholder="0"     />
        </div>
    </td>
    <td class="px-6 py-4 ">
        <img class="cursor-pointer " src="<?php echo $imageQR; ?>" width="50"  alt="QR Code" onclick="zoomImage('<?php echo $imageQR; ?>')" data-modal-target="zoom-modal" data-modal-toggle="zoom-modal">
    </td>   
    <td class="px-6 py-4 text-nowrap">
        <?php echo $row['datetime'];?>
    </td>
    
                                            
</tr>


<?php
        }

        
    } else {
        // echo "Error executing query: " . mysqli_error($conn);

?>

<tr class="w-full">
    <td colSpan="7" class=" w-full text-center bg-white py-4">
        No Data Available.
    </td>
</tr>


<?php
        
    }

    

?>

<script>
    // var element = document.querySelector(".quan");
    // element.addEventListener("blur", function() {
    //     const id = element.id;
    //     console.log(id);
    //     // window.location = 'login.php?id='.id;
    // }); 

    function updateQuantity(id){
        let quantity = document.getElementById(id);
        window.location.href = 'login.php?id='+id+'&quantity='+quantity.value;
    }
</script>


