<?php
include('header.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']!='')
{
    $type=$_GET['type'];
    $id=$_GET['id'];
    if($type=='delete'){
        mysqli_query($conn,"delete from category where id='$id'");
        redirect('category.php');
    }
}

$sql="select * from category order by order_number";
$res=mysqli_query($conn,$sql);
?>

<style>
    .category_title{
        margin-bottom: 40px;
    }
    .delete_red{
        background-color: red !important;
    }
</style>


<div class="card">
    <div class="card-body">
        <h1 class="Category_title">Category</h1>
        <div class="row">
        <div class="col-12">
            <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                <tr>
                    <th width="10%">S.NO.</th>
                    <th width="45%">Category</th>
                    <th width="20%">Order Number</th>
                    <th width="25%">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_array($res)){
                        ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['category']?></td>
                    <td><?php echo $row['order_number']?></td>
                    <td>
                        <a href=""><label class="badge badge-success">EDIT</label></a>
                        &nbsp;
                        <a href=""><label class="badge badge-danger">Pending</label></a>
                        &nbsp;
                        <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red">Delete</label></a>
                    </td>
                   
                </tr>
                <?php }} else { ?>
                    <tr>
                    <td colspan="5">NO DATA FOUND</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>




<?php
include('footer.php');
?>