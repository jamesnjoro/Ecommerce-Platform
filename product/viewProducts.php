
<?php
                     include("../admin/php/common.php");
                     include("../admin/php/config.php");
                     $sql = "SELECT * FROM products";
                     $output = "<ul>";
                     
       
                     $results = $conn->query($sql);
                     
       
                     if($results->num_rows > 0){
                         while($row = $results->fetch_assoc()){
                        $ProductId = $row['id'];
                        $sql3 = "SELECT * FROM Subproducts WHERE productID ='".$ProductId."'";
                        $results3 = $conn->query($sql3);
                        if($results3->num_rows > 0){
                            while($row3 = $results3->fetch_assoc()){
                                $photoId = $row3['id'];
                                $price = $row3['price'];
                                break;
                            }
                        }
                           $sql2 = "SELECT * FROM photos WHERE productID ='".$photoId."'";
                           $results2 = $conn->query($sql2);
                             if($results2->num_rows>0){
                                 while($row2 = $results2->fetch_assoc()){
                                     $pic = $row2['photopath'];
                                     break;
                                 }
                             }
                           $output .= "<li>
                           <form method='post' action='cart/addto.php'>
                                <div  style ='margin-bottom:20px;  padding-bottom:10px; border-bottom:1px black solid' id='pro'>
                        <div><img src='admin/photos/". $pic ."'></div>
                           <div id='Pname'><b>".$row['productName']."</b></div>
                           <div id='Pprice'>".$price."</div>
                                </div>
                           <input type='hidden' name='hidden_price' class='hidden_price' value='".$price."' />
                           <input type='hidden' name='hidden_name' class='hidden_name' value='".$row['productName']."' />
                           <input type='hidden' name='hidden_id' class='hidden_id' value='".$row['id']."' />
                           <input type='hidden' name='hidden_pic' class='hidden_pic' value='".$pic."' />
                        
                           <input style ='padding-bottom:20px;' type='submit' name='add_to_cart' class='addto' value ='Add to cart' />
                           </form>
                       </li>";
                         }
                     }else{
                         $output .= "no results";
                     }
                     
                         $conn->close();
                         writelog("Connection Closed");

                         $output .= "</ul>";

                         echo $output;
?>