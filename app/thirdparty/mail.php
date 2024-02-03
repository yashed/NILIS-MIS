<?php


/**
 * courses model
 */
class Mail
{



    public function send($data)
    {

        echo "Mail sent";
        echo "<br>";
        echo "To: " . $data['to'];
        echo "<br>";
    }
}

?>