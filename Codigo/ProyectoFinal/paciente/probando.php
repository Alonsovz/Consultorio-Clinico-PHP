<?php
include "../credenciales.php";





?>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>

<?php
$conex= new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
 $sql="select * from Paciente";
 $resultado=$conex->query($sql);



 

 $DataTable=null;
 $DataTable.="<table id='example' class='table table-striped table-bordered' style='width:100%'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>";
         while($fila=$resultado->fetch_assoc()){
            $DataTable.="
                <tr>
                    <td>".$fila['Id_Paciente']."</td>
                    <td>".$fila['Nombre']."</td>
                    <td>".$fila['Domicilio']."</td>
                    <td>".$fila['Telefono']."</td>
                    <td>".$fila['fecha_nac']."</td>


                </tr>
            ";
        }
        $DataTable.="</table>";
        return $DataTable;
    

        
?>
            


 