<?php

class Jobs extends Database
{

    public function createjob($loc, $descrip, $estcost, $date, $lastdate)
    {   
        $sesutype = $_SESSION['utype'];
        $sesuserid = $_SESSION['uid'];

        $query = "INSERT INTO JOBS VALUES ('', '$loc', '$descrip', '$estcost', '$date', '$lastdate', '0', '$sesuserid')";
        $prepCheck = $this->conn->prepare($query);
        $res = $prepCheck->execute();
        return $res;    
    }

    public function displayjoblanding()
    {   
        $query = "SELECT  jid, loc, descr, estcost, jdate, ldate FROM jobs WHERE workerid = 0;";
        $prepLogin = $this->conn->prepare($query);
        $res = $prepLogin->execute();
        ?>
        <ol>
        <table class = "table table-hover">
       <tbody>
       
        <?php
        while($job = $prepLogin->fetch(PDO::FETCH_ASSOC))
        {
            $_SESSION['sjid'] = $job['jid'];
            $sjid = $_SESSION['sjid'];
            ?>
            <div class="container-fluid">   
                 
                <tr><td><li><a href = "./jobdetails.php?jid=<?php echo $sjid; ?>"><?= $job['descr']; ?></a></li> <tr><td>
               
            </div>
            <?php
        }   
        ?>
        </tbody>
        </table>
        <?php    
        return true; 
    }

    public function displayjobdetails()
    {   
        $sjid = $_SESSION['sjid'];

        $query = "SELECT  jid, loc, descr, estcost, jdate, ldate FROM jobs where jid = '$sjid';";
        $prepLogin = $this->conn->prepare($query);
        $res = $prepLogin->execute();

        if(!$res)
        {
            echo "<script>alert('SQL Error!');</script>";
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else
        { 
            ?>
              <table class = "table table-hover">
            <thead>
      <tr>
      <th>Jobid</th>
        <th>Location</th>
        <th>Description</th>
        <th>Estimated Cost</th>
        <th>Job Start Date</th>
        <th>Job end date</th>
      </tr>
    </thead>
    <tbody>
    <?php
            while($job = $prepLogin->fetch(PDO::FETCH_ASSOC))
            {
                $id = $job['jid'];
                ?>
                
                <div class="container-fluid">
                
                    <tr>
                    <td><?= $job['jid']; ?> </td>
                    <td><?= $job['loc']; ?> </td>
                    <td><?= $job['descr']; ?> </td>
                    <td><?= $job['estcost']; ?> </td>
                    <td><?= $job['jdate']; ?> </td>
                    <td><?= $job['ldate']; ?> </td> 
                    </tr>
                </div>
                
                <?php 
            }
            ?>
            </tbody></table>
            <?php
        }
    }

}

 ?>