<h2>USER TRAFFIC LIMITER</h2><br>

<b>#Usage:<b> <br>
$limiter = new TrafficLimiter(); <br> // Initiate class
$limiter->setLimit(100)<br> // Set user max visitor (default 100)
        ->setBreakTime(2) <br> // Set range time (default 2 seconds)
        ->activate(); // activate limiter
