
    <?php 

        if(isset($_SESSION['user'])){
            if($_SESSION['user']->role_name=="admin"){
                $users = [];
                $logsNum = 0;
                $text = file_get_contents("data/userLog.txt");
                $logs = explode("\n", trim($text));
                foreach($logs as $log){
        
                    list($ip, $user, $time) = explode("__", $log);
                    $currentDateTime = new DateTime();
        
                    $twentyFourHoursAgo = $currentDateTime->sub(new DateInterval('P1D'));
        
                    $logDateTime = new DateTime($time);
        
                    if ($logDateTime > $twentyFourHoursAgo) {
                        $logsNum++;
                        array_push($users, $user);
                    }
                }
                $uniqueUsers = array_unique($users);
                $numberOfUsersLogged = count($uniqueUsers);
        
                $pages = [];
                $numberOfVisits = 0;
                $text = file_get_contents("data/pagelog.txt");
                $logs = explode("\n", trim($text));
                foreach($logs as $log){
                    list($ip, $user, $page, $date) = explode("__", $log);
        
                    $currentDateTime = new DateTime();
        
                    $twentyFourHoursAgo = $currentDateTime->sub(new DateInterval('P1D'));
        
                    $logDateTime = new DateTime($time);
        
                    if ($logDateTime > $twentyFourHoursAgo) {
                        array_push($pages, $page);
                        $numberOfVisits++;
                    }
                }
                $numberOfVisitsPerPage = array_count_values($pages);    
            }
            else{
                echo"<div class='alert alert-danger w-75 d-flex justify-content-center mx-auto my-5'><h1>You are not allowed to enter this page</h1></div>";
            }
        }
        else{
            echo"<div class='alert alert-danger w-75 d-flex justify-content-center mx-auto my-5'><h1>You are not allowed to enter this page</h1></div>";
        }
        ?>
        <?php 
        
        if($_SESSION['user']->role_name=="admin") {

        ?>

        <main>
            <div class="container d-flex justify-content-center my-3 ico"> 
                <h1>Admin panel</h1>
            </div>
            <div class = "container d-flex flex-wrap justify-content-center">
                <div class="col-md-2 col-12 d-flex justify-content-start align-items-center flex-column ">
                    <h3 class="ico">Admin tools</h3>
                    <a href="index.php?page=usersEdit" class="insertButton text-decoration-none p-2 fw-bold mb-3">Edit users</a>
                    <a href="index.php?page=newsEdit" class="insertButton text-decoration-none p-2 fw-bold mb-3">Edit news</a>
                    <a href="index.php?page=moviesEdit" class="insertButton text-decoration-none p-2 fw-bold mb-3">Edit movies</a>
                </div>
                <div class="col-md-4 col-12 d-flex justify-content-start align-items-center flex-column">
                    <h3 class="ico">Logs for today</h3>
                    <p>Number of users logged today: <?=$numberOfUsersLogged?></p>
                    <p>Number of all logins today: <?=$logsNum?></p>
                </div>
                <div class="col-md-6 col-12 d-flex justify-content-center flex-column">
                    <h3 class="ico">Page visits for today</h3>
                    <?php 
                        foreach ($numberOfVisitsPerPage as $key => $value) {
                            $percentage = round(($value / $numberOfVisits) * 100, 2);
                            echo "<p><span class='icoSecondary'>{$key}</span> was visited {$value} times which is <span class='icoSecondary'>{$percentage}%</span></p>";
                        }
            ?>
                </div>
            </div>
            

        </main>

        <?php  }?>