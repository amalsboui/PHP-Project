<?php
function calculate_time($created)
    {
            $timeDifference = time() - strtotime($created);

            $hoursAgo = floor($timeDifference / (60 * 60));
            $daysAgo = floor($timeDifference / (24 * 60 * 60));
            $monthsAgo = floor($daysAgo / 30); 

            if ($monthsAgo == 1) {
                echo "1 month ago";
            }elseif ($monthsAgo > 1) {
                echo "$monthsAgo months ago";
            }elseif ($daysAgo == 1) {
                echo "1 day ago";
            }elseif ($daysAgo > 1) {
                echo "$daysAgo days ago";
            }elseif ($hoursAgo==1){
                echo "1 hour ago";
            }
            else {
                echo "$hoursAgo hours ago";
            }
    }
    ?>
<main class=" container d-flew flex-row justify-content-evenly">
      <?php foreach($jobs as $job): ?>
      <div class="card w3-theme-l5">
  
        <div class="card-body d-flex flex-column">
          <div class="card-title" ><?php echo("🚀".$job["position"] )?></div>
          <span class="text-muted font-italic "><?php calculate_time($job["created_at"])?></span>
          <div class="tags mb-2 mt-1">
              <span class="badge bg-secondary " ><?php echo $job["employment_type"] ?></span>
              <span class="badge bg-primary"><?php echo $job["category"] ?></span>
          </div>
          <p class="card-text"><?php echo(strlen($job["description"]) > 284 ? substr($job["description"], 0, 284) . '...' : $job["description"]);?></p>
          <ul class="list-group list-group-flush ">
            <li class="list-group-item w3-theme-l5"><?php echo("🧱".$job["entreprise"] )?></li>
            <li class="list-group-item w3-theme-l5"><?php echo("📍".$job["location"] )?></li>
          </ul>
        
          <a href="/PHP-PROJECT/jobdetails/index.php?id=<?php echo $job['id_job']; ?>" class="btn btn-primary w3-theme-d4 align-self-end mt-auto">See More</a>
        
        </div>

      </div>
      <?php endforeach;?>

    </main>