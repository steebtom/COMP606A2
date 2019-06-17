<?php

class Contracts extends Database
{
	
    public function createcontract($tcost, $labour, $material, $date, $sjid, $sesuser)
    {   
        $jid = $_SESSION['sjid'];
        

        $query = "SELECT uid from jobs where jid = '$jid'";
        $prepCheck = $this->conn->prepare($query);
        $res = $prepCheck->execute();
        if($res)
            {
                while($contract1 = $prepCheck->fetch(PDO::FETCH_ASSOC))
                {
                    $usrid = $contract1['uid'];
                    echo $usrid;
                }
                $query = "INSERT INTO CONTRACT VALUES ('', '$tcost', '$labour', '$material', '$date', '$sjid', '$sesuser', '0','$usrid')";
                $prepCheck = $this->conn->prepare($query);
                $res = $prepCheck->execute();
        
                if($res)
                    {
                        echo "<script>alert('Contract Created Successfully'); </script>";
                        // echo "<script>window.top.tcostation='index.php'</script>";
                        // echo "<script>window.tcostation.href='index.php'</script>";
                        header("location:../jobdetails.php?jid=$jid&success=contractcreated");
        
                    }
                else
                    {
                        echo "<script>alert('Couldnt Create the Contract'); </script>";
                    }
            }

            else{
                echo "No jobs";
            }
            }

       

    public function displayjobcontracts($jid,$ownerid)
    {   
        
        $query= "SELECT  coid, tcost, labour, material, date FROM CONTRACT where jid = '$jid' and ownerid = '$ownerid';";
        $prepLogin = $this->conn->prepare($query);
        $res1 = $prepLogin->execute();
        if(!$res1)
            {
                echo "<script>alert('SQL Error!');</script>";
                header("Location: ../landing.php?error=sqlerror");
                exit();
                return false;
            }
        else
            {
                
                ?>
                 <table class = "table table-hover">
                    <thead>
            <tr>
            <th>Contract ID</th>
                <th>Total Cost</th>
                <th>Labour Cost</th>
                <th>Material Cost</th>
                <th>Contract Expiry</th>
                
            </tr>
            </thead>
            <tbody>
<?php
                while($contract1 = $prepLogin->fetch(PDO::FETCH_ASSOC))
                {
                    // $id = $contract['jid'];
                  
                    ?>                    
                    <div class="container-fluid">
                    
                        <tr>
                        <td><?= $contract1['coid']; ?> </td>
                        <td><?= $contract1['tcost']; ?> </td>
                        <td><?= $contract1['labour']; ?> </td>
                        <td><?= $contract1['material']; ?> </td>
                        <td><?= $contract1['date']; ?> </td> </tr>                
                    </div>
                <?php
            }
            ?>
            </tbody>
            </table>
            <?php
            return true;
        }
    }

    public function displayjobcontracts1($jid,$uid)
    {   
        $query = "SELECT  coid, tcost, labour, material, date FROM CONTRACT where jid = '$jid' AND uid = '$uid';";
        $prepLogin = $this->conn->prepare($query);
        $res1 = $prepLogin->execute();

        if(!$res1)
            {
                echo "<script>alert('SQL Error!');</script>";
                header("Location: ../landing.php?error=sqlerror");
                exit();
                return false;
            }
        else
            {
                ?>
                 <table class = "table table-hover">
                    <thead>
            <tr>
            <th>Contract ID</th>
                <th>Total Cost</th>
                <th>Labour Cost</th>
                <th>Material Cost</th>
                <th>Contract Expiry</th>
                
            </tr>
            </thead>
            <tbody>
<?php
                while($contract = $prepLogin->fetch(PDO::FETCH_ASSOC)){
                    // $id = $contract['jid'];
                    ?>                    
                    <div class="container-fluid">
                    
                        <tr>
                        <td><?= $contract['coid']; ?> </td>
                        <td><?= $contract['tcost']; ?> </td>
                        <td><?= $contract['labour']; ?> </td>
                        <td><?= $contract['material']; ?> </td>
                        <td><?= $contract['date']; ?> </td> </tr>                
                    </div>
                <?php
            }
            ?>
            </tbody>
            </table>
            <?php
            return true;
        }
    }

}

?>