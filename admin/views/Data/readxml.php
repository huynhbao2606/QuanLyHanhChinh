<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">

    <form action="" method="post">
        <div class="from-group mb-5">
            <?php function select_loai(): void
            {
                $arrtype =[];
                $xmlDoc = new DOMDocument();
                $xmlDoc ->preserveWhiteSpace=false;
                $xmlDoc -> load('books.xml');
                $root = $xmlDoc ->documentElement;
                $booktype = $root ->getElementsByTagName('book'); //danh sách thẻ book
                $select = "<select class='form-select' name = 'ddlbook'>";
                for($i=0;$i<$booktype->length;$i++){
                    $type = $booktype->item($i)->childNodes; // danh sách thẻ con của book thứ i
                    if(!isset($arrtype[$type->item(6)->nodeValue])){
                        $arrtype[$type->item(6)->nodeValue] = $type->item(6)->nodeValue;
                        $select .= '<option value="'.$type->item(6)->nodeValue.'">'.$type->item(5)->nodeValue.'</option>';
                    }
                }
                $select .= "</select>";
                echo $select;
            }
            select_loai();
            ?>
            <div class="mb-5"><input type="submit" value="Xem" class="btn btn-dark"/></div>
        </div>
        <div class="from-group mb-5">
            <table class="table table-dark table-hover table-bordered">
                <tr class="bg-success">
                    <th>STT</th>
                    <th>Tên Sách</th>
                    <th>Tác Giả</th>
                    <th>Giá</th>
                </tr>
                <?php
                $xmlDoc = new DOMDocument();
                $xmlDoc ->preserveWhiteSpace=false;
                $xmlDoc -> load('books.xml');
                $xpath = new DOMXPath($xmlDoc);
                if(isset($_POST['ddlbook'])){
                    $query = '//book/typeID[.="'.$_POST['ddlbook'].'"]/parent::*';
                    $book=$xpath->query($query);
                    for($i=0;$i<$book->length;$i++){
                        $ib=$book->item($i)->childNodes;
                        echo '<tr class="table-light">';
                        echo '<td>' . $ib->item(0)->nodeValue . '</td>';
                        echo '<td>' . $ib->item(1)->nodeValue . '</td>';
                        echo '<td>' . $ib->item(2)->nodeValue . '</td>';
                        echo '<td>' . $ib->item(7)->nodeValue . '</td>';
                        echo '</tr>';
                    }
                }else{
                    $start = $xmlDoc->documentElement; //doc node books
                    $book = $start->childNodes; // lấy tất cả con của books
                    for($i=0;$i<$book->length;$i++){
                        $ib=$book->item($i)->childNodes;
                        echo '<tr class="table-light">';
                        echo '<td>' . $ib->item(0)->nodeValue . '</td>';
                        echo '<td>' . $ib->item(1)->nodeValue . '</td>';
                        echo '<td>' . $ib->item(2)->nodeValue . '</td>';
                        echo '<td>' . $ib->item(7)->nodeValue . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
        </div>
    </form>

</div>

</body>
</html>