<h2>USER TRAFFIC LIMITER</h2><br>

<b>#Usage:</b> <br>
$limiter = new TrafficLimiter(); <em>// Initiate class</em> <br>
$limiter->setLimit(100) <em>// Set user max visitor (default 100)</em> <br>
        ->setBreakTime(2) <em>// Set range time (default 2 seconds)</em> <br>
        ->activate(); <em>// activate limiter</em> 
