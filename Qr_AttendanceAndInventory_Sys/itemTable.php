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

?>

<tr class="bg-white border-b ">

    <td class="px-6 py-4 font-semibold">
        <?php echo $i;?>
    </td>
    <th scope="row" class="text-gray-900 whitespace-nowrap px-6 py-4">
        <div class="text-base font-semibold"><?php echo ucwords($row['item_name'])?></div>
    </th>
    <td class="px-6 py-4">
        <?php echo $faculty_name;?>
    </td>
    <td class="px-6 py-4">
        <?php echo $row['quantity'];?>
    </td>
    <td class="px-6 py-4 text-nowrap">
        <?php echo $row['datetime'];?>
    </td>
    <td class="px-6 py-4 hover:bg-gray-100">
        <img class="cursor-pointer " src="<?php echo $imageQR; ?>" width="50"  alt="QR Code" onclick="zoomImage('<?php echo $imageQR; ?>')" data-modal-target="zoom-modal" data-modal-toggle="zoom-modal">
    </td>
    <td class="flex-nowrap flex pt-6">
        <button id="<?php echo $row['id'];?>" onclick="updateThisItem(this.id)" data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg p-2 text-center me-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="m12.9 6.855l4.242 4.242l-9.9 9.9H3v-4.243zm1.414-1.415l2.121-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z"/></svg>
        </button>
        <button id="<?php echo $row['id'];?>" onclick="deleteThisItem(this.id)" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg  p-2 text-center me-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z"/></svg>
        </button>
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


