<?php
//if (isset($_SESSION['id']))
if (isset($_SESSION['username'])) {
    ?>
    <ul>
        <li>
            <a href="index.php">HOME</a>
        </li>
        <li>
            <a href="new_post.php">New Post</a>
        </li>
        <li>
            <a href="logout.php">Logout</a>
        </li>

        <li>
            <a href="user_post.php">My posts</a>
        </li>

    </ul>

    <?php
    echo "<span> Logged in as: ", $_SESSION['username'], "<br/></span>";
    ?>


    <?php
} else {
    ?>
    <ul>
        <li>
            <a href="index.php">HOME</a>
        </li>
        <li>
            <a href="registration.php">Registration</a>
        </li>
        <li>
            <a href="login.php">Login</a>
        </li>
    </ul>
    <?php
}

