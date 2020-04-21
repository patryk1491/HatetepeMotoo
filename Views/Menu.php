<?php
    $loggedIn = (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== '') ? $_SESSION['logged_in'] : false;
?>
    <div class="menu">
        <ul>
            <li><a href="home">Home </a></li>
            <li><a href="add-ad">Add ad</a></li>
            <li><a href="my-ads">My ads</a></li>
            <?php
                if($loggedIn) {
                    echo('<li><a href="logout">Log out</a></li>');
                } else {
                    echo('
                        <li><a href="login">Log in</a></li>
                        <li><a href="register">Sign up</a></li>
                    ');

                }
            ?>
        </ul>
    </div>
    </div>