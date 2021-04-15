
<br>
    <h3>Categories</h3>
        <ul>

<?php 
    if($pdo){
        $sql ="select distinct(product_catagary) from product ";
        $stmt =$pdo->prepare($sql);
        $stmt->execute();

        while($posts=$stmt->fetch(PDO::FETCH_ASSOC)){
            $categoryName = $posts['product_catagary'];
            echo "<li>{$categoryName}</li>";
        }
    }
    else {
        echo "<h1>Error</h1>";
    }
?>
        </ul>
<br>
<div class="input-group">
    <form action="search.php" method="post" class="form-outline">
        <input name="input-item" type="search" id="form1" class="form-control">     
        <button name="search" type="submit" class="btn btn-primary" style="padding:10px;">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>