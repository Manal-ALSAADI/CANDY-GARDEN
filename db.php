<?php
if (!isset($_SESSION)) {
    session_start();
}

include("dbconnect.php");

function login($email, $password)
{
    $password = md5($password);
    $sql = "select id from admin where email='" . $email . "' and password='" . $password . "'";
    global $conn;

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$result) {
        return 'An error occured during login: ' . $conn->error;
    }
    if (count($row) == 1) {
        $_SESSION["userId"] = $row['id'];
        $_SESSION["email"] = $email;
        header("Location: admin.php");
        exit();
    } else {
        return 'Email or password is not correct';
    }

    $conn->close();
}

function viewProduct($sql)
{

    global $conn;

    $result = $conn->query($sql);

    if ($result) {

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo '<div class="product"><h3>' .
                    $row["name"] .
                    "</h3>" .
                    '<a href="#" data-lightbox="images">
            <img src="data:image/png;base64,' . base64_encode($row['img']) . '" width="260" height="260" alt="proizvod6"/></a>'
                    . "<p>" .
                    $row["description"] .
                    "</p><br><p>" .
                    $row["price"] .
                    "SR</p></div>";
            }
        } else {
            echo '<tr><td class="bg-info" colspan="8">لا توجد بيانات</td></tr>';
        }
    } else {
        echo '<tr><td class="bg-danger" colspan="8">تاكد من صيغة جمله القواعد البياتات </td></tr>';
    }
    // $conn->close();
}



function getAllProducts($sql)
{

    global $conn;

    $result = $conn->query($sql);

    if ($result) {

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>"
                    . $row["id"]
                    . "</td><td>"
                    . $row["name"]
                    . "</td><td>"
                    . $row["cardId"]
                    . "</td><td>"
                    . $row["email"]
                    . "</td><td>"
                    . $row["phone"]
                    . "</td><td>"
                    . $row["major"]
                    . "</td><td>"
                    . '<a class="btn btn-primary" href="add-product.php?id=' . $row["pk"] . '">تعديل</a>'
                    . "</td><td>"
                    . '<a class="btn btn-danger" href="delete.php?id=' . $row["pk"] . '">حذف</a>'
                    . "</td></tr>";
            }
        } else {
            echo '<tr><td class="bg-info" colspan="8">لا توجد بيانات</td></tr>';
        }
    } else {
        echo '<tr><td class="bg-danger" colspan="8">تاكد من صيغة جمله القواعد البياتات </td></tr>';
    }
    $conn->close();
}


function getCategories($sql, $isSelect = 0)
{

    global $conn;

    $result = $conn->query($sql);

    if ($result) {

        if ($result->num_rows > 0) {
            echo '<option>....</option>';
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["id"] . '"';
                if ($isSelect == $row["id"])
                    echo 'selected="selected"';
                echo '>' . $row["name"] . '</option>';
            }
        } else {
            echo 'no categoy found';
        }
    } else {
        echo 'sql statment not ';
    }
    //$conn->close();

}



function createRequest($p_number, $t_request, $d_request, $name, $email, $code)
{
    global $conn;


    $sql = "INSERT INTO tables (p_number,t_request,d_request,name,email,t_code)
VALUES ('" . $p_number . "', '" . $t_request . "',  '" . $d_request . "','" . $name . "', '" . $email . "', '" . $code . "')";

    if ($conn->query($sql) === true) {
        echo "Your booking is confirmed succssfully";
    } else {
        $msg = "An error occured when you try to book a table" . $conn->error;
        echo $msg;
    }

    $conn->close();
}


function addProduct($name, $description, $img, $price, $categoryId, $userId)
{
    global $conn;
    $sql = "INSERT INTO product (name,description,img,price,categoryId,userId)
VALUES ('" . $name . "', '" . $description . "','" . $img . "'," . $price . ", " . $categoryId . "," . $userId . ")";
    if ($conn->query($sql) === TRUE) {
        return '<div class="alert alert-success" role="alert">product added successfully...</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">An error occured ' . $conn->error . '</div>';
        return $msg;
    }

    $conn->close();
}

function EditProduct($id, $name, $description, $img, $price, $categoryId, $userId)
{
    global $conn;
    $sql = "";
    if (strlen($img) <= 0) {
        $sql = "UPDATE product set name='" . $name . "', description='" . $description . "' 
    , price=" . $price . ", categoryId=" . $categoryId . ", userId=" . $userId . " where id=" . $id;
    } else {
        $sql = "UPDATE product set name='" . $name . "', description='" . $description . "', img='" . $img .
            "', price=" . $price . ", categoryId=" . $categoryId . ", userId=" . $userId . " where id=" . $id;
    }

    if ($conn->query($sql) === TRUE) {
        return '<div class="alert alert-success" role="alert">product update successfully...</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">An error occured ' . $conn->error . '</div>';
        return $msg;
    }

    $conn->close();
}

function deleteProduct($id)
{
    global $conn;
    $sql = "delete from product where id=" . $id;

    if ($conn->query($sql) === TRUE) {

        return '<div class="alert alert-success" role="alert">product deleted successfully...</div>';
    } else {
        $msg = '<div class="alert alert-danger" role="alert">An error occured ' . $conn->error . '</div>';
        return $msg;
    }

    $conn->close();
}

function viewProductforEdit($id)
{
    global $conn;

    $sql = "SELECT * FROM product where id= " . $id;

    $items = $conn->query($sql);
    $arr = array();
    while ($row = $items->fetch_assoc()) {
        $arr = $row;
    };
    return $arr;
    $conn->close();
}

function getProductforView($id)
{
    global $conn;

    $sql = "SELECT price, description,img , p.name as pname,p.id as pId ,c.name as cname
     FROM product p, category c where p.categoryid=c.id and  p.id= " . $id;

    $items = $conn->query($sql);
    $arr = array();
    while ($row = $items->fetch_assoc()) {
        $arr = $row;
    };
    return $arr;
    $conn->close();
}


function listProduct($items_per_page = 5)
{
    global $conn;
    $page = 1;

    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };

    $start_from = ($page - 1) * $items_per_page;
    $sql = "SELECT p.name as pname , c.name as cname ,p.id as pid , c.id as cid,price ,img,description
      FROM product as p , category as c where categoryId=c.id ORDER BY p.ID ASC LIMIT $start_from, " . $items_per_page;

    $items = $conn->query($sql);

    while ($row = $items->fetch_assoc()) {

        echo  '<tr>
        <td>' . $row["pid"] . '</td>
        <td>' . $row["pname"] . '</td>
        <td>' . $row["price"] . 'RS</td>
        <td>' . $row["cname"] . '</td>
        <td><a href="view-product.php?id=' . $row["pid"] . '">view</a></td>
        <td><a href="edit-product.php?id=' . $row["pid"] . '">edit</a></td>
        <td><a href="delete-product.php?id=' . $row["pid"] . '">delete</a></td>
        </tr>';
    };
}

function listRequests($items_per_page = 2, $search = null)
{
    global $conn;
    $page = 1;


    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $sql = null;
    $start_from = ($page - 1) * $items_per_page;

    if (!is_null($search) && $search != "") {
        $sql = "SELECT * FROM tables
    WHERE name LIKE '%" . $search . "%'
     ORDER BY ID ASC";
    
    } else {
        $sql = "SELECT * FROM tables ORDER BY ID ASC LIMIT $start_from, " . $items_per_page;
    }
    $items = $conn->query($sql);

    while ($row = $items->fetch_assoc()) {

        echo  '<tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["name"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["t_request"] . '</td>
        <td>' . $row["d_request"] . '</td>
        <td>' . $row["p_number"] . '</td>
        <td>' . $row["t_code"] . '</td>
        </tr>';
    };
    if($items->num_rows <=0){
        echo  '<tr><td colspan="7"> no result found</td></tr>' ;
    }
    return $items->num_rows;
}

function pagenationRequest($table_name, $URL, $page = 1, $items_per_page = 5,$search=null)
{
    global $conn;
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $sql=null;
    if (!is_null($search) && $search != "") 
    $sql = "SELECT COUNT(ID) AS total FROM $table_name WHERE name LIKE '%$search%'";
    else
    $sql = "SELECT COUNT(ID) AS total FROM $table_name ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row["total"] / $items_per_page);

    echo ' <li class="page-item">
 <a class="page-link" href="' . $URL . '.php?page=1" aria-label="Previous">
     <span aria-hidden="true">&laquo;</span>
 </a>
</li>';

    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item">';
        echo "<a href='" . $URL . ".php?page=" . $i . "'";
        if ($i == $page)
            echo " class='active page-link'";
        else
            echo 'class="page-link"';
        echo '>' . $i . "</a> </li>";
    }

    echo ' <li class="page-item">
    <a class="page-link" href="' . $URL . '.php?page=' . $total_pages . '" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
    </a>
   </li>';

    $conn->close();
}
