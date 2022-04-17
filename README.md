<h2>USER TRAFFIC LIMITER</h2><br>

<b>#Usage:<b> <br>
$limiter = new TrafficLimiter(); // Initiate class <br>
$limiter->setLimit(100) // Set user max visitor (default 100) <br>
        ->setBreakTime(2) // Set range time (default 2 seconds) <br>
        ->activate(); // activate limiter 
