<?php

$recordPage = 10;
            if(isset($_GET['page'])){
                $output = '<h1>Products</h1>
                <table id="usersT">
                <tr>
                   <th>Image</th>
                   <th>Name</th>
                   <th>Sales</th>
                   <th>Active</th>
                   
                </tr>';
            
            include("../php/common.php");
            include("../php/config.php");
            $sql = "SELECT * FROM products";
            $rec = $conn->query($sql);
            $limit = ($_GET['page'] - 1) * $recordPage;
            $sql = "SELECT * FROM products LIMIT ".$limit.",".$recordPage."";
            $results = $conn->query($sql);
            $totalRecords = $rec->num_rows;
            if($results->num_rows > 0){
                while($row = $results->fetch_assoc()){
                    $sql = "SELECT * FROM Subproducts WHERE productID ='".$row['id']."' LIMIT 0,1 "; 
                    $subID = $conn->query($sql);
                    while($subRow = $subID->fetch_assoc()){
                        $sql = "SELECT photopath FROM photos WHERE productID ='".$subRow['id']."' LIMIT 0,1";
                        $picPath = $conn->query($sql);
                        while($picRow = $picPath->fetch_assoc()){
                            $output .= '<tr class="productRow" id="'.$row["id"].'"><td><img id="pro" src="photos/'.$picRow["photopath"].'"/></td>
                            <input type="hidden" name="id" class="Pid" value="'.$row["id"].'">
                            <td>'.$row["productName"].'</td>
                            <td>sales</td>
                            <td>
                                <select>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                            </tr>
                            ';
                        }
                        
                        
                    }
                }
                
            }else{
                $output .='No results';
            }
            $conn->close();
                writelog("Connection Closed");
                $output .= '</table>';
                $output .= '<div id="numC">';
                $numPages = ceil($totalRecords/$recordPage);
                for($i=0; $i<$numPages; $i++){
                    $output.='<span class="pagenum" id='.($i+1).'>'.($i+1).'</span>';
                }
                $output .= '</div>';
                echo $output;
            }
            
        ?>