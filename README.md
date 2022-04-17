<h2>USER TRAFFIC LIMITER</h2><br>

<b>#Usage:</b> <br>
$limiter = new TrafficLimiter(); <em>// Initiate class</em> <br>
$limiter->setLimit(100) <em>// Set user max visitor (default 100)</em> <br>
        ->setBreakTime(2) <em>// Set range time (default 2 seconds)</em> <br>
        ->activate(); <em>// activate limiter</em> <br> 
<br>
<b>#DONT FORGET TO ADD WINDOW ONLOAD EVENT LISTENER IN FRONTEND APP</b><br>
<h3>EXAMPLE</h3> <br>
<em>window.addEventListener('DOMContentLoaded', function() {<br>
            &nbsp;&nbsp;fetch("/limiter.php?success")<br>
                &nbsp;&nbsp;&nbsp;.then(response => {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;if (response.status !== 200) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;console.error('error traffic limiter')<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                &nbsp;&nbsp;&nbsp;})<br>
        })<br>
</em>