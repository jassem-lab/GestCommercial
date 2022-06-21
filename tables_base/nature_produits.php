<?php
$nature		        =	"" ;

$req="select * from delta_nature_prd where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $nature	        =	$enreg["nature"] ;
}
?>

<div class="col-xl-12">
    <h3 class="col-lg-12 " style="color : red">Liste des natures produit</h3>
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th><b>Nature</b></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_nature_prd"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["nature"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>