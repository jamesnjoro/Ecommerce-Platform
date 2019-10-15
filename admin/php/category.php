<?php
include('common.php');
include('config.php');
if(isset($_POST['catego'])){
    $sql='INSERT INTO categories (name) VALUES("'.$_POST['catego'].'")';
    if($conn->query($sql)=== true){
        writelog('category created successfully');
        $id =mysqli_insert_id($conn);
        $subcategories = $_POST["subcat"];
        foreach($subcategories as $subcategory){
            $sql = 'INSERT INTO subcategories (categoryID,subcategory) VALUES("'.$id.'","'.$subcategory.'")';
            if($conn->query($sql)=== true){
                writelog("subcategory creation succesful");
            }else{
                writelog("subcategory creation failed");
            }
        }
        
    }else{
        writelog('category creation failed');
    }
}

if(isset($_GET['list'])){
    $output ='';
    $sql = 'SELECT * FROM categories';
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $output .= '<form id ="cate" class="category">';
        $output.='<div class="cat"><input type="text" name="catego" id="catego" value="'.$row["Name"].'"></div>
        <div><span>&#8208;</span></div>';
        $sql = 'SELECT * FROM subcategories WHERE categoryID="'.$row["id"].'"';
        $result2 = $conn->query($sql);
        $output.='<div class="sub">';
        while($row2 = $result2->fetch_assoc()){
            
            $output.='<div  class="subcat" id="subC"><input type="text" class="SC" id="subcat" name="subcat[]" value="'.$row2["subcategory"].'"></div>';
            
        }
        $output.='</div>';
        $output.='</form>';
        $output.='<a class="removeCat" id="'.$row["id"].'" href="#">remove</a>';
    }

    echo $output;
}

if(isset($_GET['action'])){
    if($_GET['action']=="delete"){
        $sql = 'DELETE FROM categories WHERE id = "'.$_GET['id'].'"';
        if($conn->query($sql)===true){
            writelog('category deleted');
            $sql = 'DELETE FROM subcategories WHERE categoryID="'.$_GET['id'].'"';
            if($conn->query($sql)===true){
                writelog('subcategory deleted');
            }else{
                writelog('subcategory deletion failed');
            }
        }else{
            writelog('category deletion failed');
        }
    }
    
}

if(isset($_GET['listSub'])){
    $Subid = $_GET['id'];

    $sql = 'SELECT * FROM subcategories WHERE categoryID="'.$Subid.'"';
    $result = $conn->query($sql);
    $output = "";
    if($result->num_rows == 0){
        $output.= '<option value="none">none</option>';
    }else{
    while($row = $result->fetch_assoc()){
        $output.='<option value="'.$row['subcategory'].'">'.$row['subcategory'].'</option>';
    }
}
echo $output;
}
?>