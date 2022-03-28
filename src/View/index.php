<h1>Index</h1>
<?php 
foreach($users as $user) {
    echo '<p>Email : '.$user['email'].'<br>
        <form method="post" action="delete">
            <input type="hidden" name="id_user" value='.$user['id'].'>
            <input type="submit" value="Delete">
        </form><br>
        <form method="post" action="read">
            <input type="hidden" name="id_user" value='.$user['id'].'>
            <input type="submit" value="Infos">
        </form><br>';
}
?>