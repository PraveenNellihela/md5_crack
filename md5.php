<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Praveen Nellihela MD5 Cracker</title>
  </head>
  <body>
    <h1>MD5 Cracker by Praveen Nellihela</h1>

    <pre>
    Debug Output:
    <?php
    $goodtext = "Not found";
    // If there is no parameter, this code is all skipped
    if ( isset($_GET['md5']) ) {
        $time_pre = microtime(true);
        $md5 = $_GET['md5'];

        // This is our alphabet
        $txt = "0123456789";
        $show = 15;
        // Outer loop go go through the alphabet for the
        // first position in our "possible" pre-hash
        // text
        for($i=0; $i<strlen($txt); $i++ ) {
            $ch1 = $txt[$i];   // The first of two characters
            // Our inner loop Not the use of new variables
            // $j and $ch2
            for($j=0; $j<strlen($txt); $j++ ) {
                $ch2 = $txt[$j];  // Our second character
                for ($k=0; $k <strlen($txt) ; $k++) {
                  $ch3 = $txt[$k];
                  for ($l=0; $l < strlen($txt); $l++) {
                    $ch4= $txt[$l];
                    $try = $ch1.$ch2.$ch3.$ch4;
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }
                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                  }
                }
            }
        }
        // Compute elapsed time
        $time_post = microtime(true);
        print "Elapsed time: ";
        print $time_post-$time_pre;
        print "\n";
    }
    ?>
    </pre>



    <!-- Use the very short syntax and call htmlentities() -->
    <p>Original Text: <?= htmlentities($goodtext); ?></p>

    <form>
      <input type="text" name="md5" size="60" />
      <input type="submit" value="Crack">

    </form>


  </body>
</html>
