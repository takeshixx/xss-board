// author: takeshix@adversec.com
<?php
if(!isset($_COOKIE["PHPSESSID"]))
    setcookie('PHPSESSID',md5(uniqid(rand(), true)));

if($_COOKIE["PHPSESSID"]=='mag1c_c00k1e')
    echo "the flag is: put_flag_here";

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['comment']) && !empty($_POST['comment']) && isset($_POST['user']) && !empty($_POST['user'])){
    $file_name = substr(md5(uniqid(rand(), true)),10);
    $fh = fopen("./comments/$file_name", 'w+');
    fwrite($fh, $_POST['user']."\n".$_POST['comment']);
    fclose($fh);
}
$dh = opendir('./comments');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Picture of the week</title>
</head>
<body>
    <form method="post">
        <table style="width: 1000px;table-layout: fixed">
            <tr style="vertical-align: top">
                <th rowspan="100" width="600px">
                    <h3>Picture of the week:</h3>
                    <img src="./image.jpg" />
                </th>
            </tr>
            <tr width="400">
                <td colspan="2"><h3>Post a comment:</h3></td>
            </tr>
            <tr>
                <td colspan="2">
                    <labe for="comment">Username:</label>
                    <input type="text" name="user" style="width: 100%"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <labe for="comment">Comment:</label>
                    <input type="text" name="comment" style="width: 100%"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit" value="Post it!" />
                </td>   
            </tr>
            <tr>
                <td colspan="2"><h3>Comments:</h3></td>
            </tr>
                <?php
                    while($file = readdir($dh)){
                        if($file != "." && $file != "..") {
                            $content = file("./comments/$file");
                            echo "<tr style='border: 1px dotted black'>\n";
                            echo "\t<td colspan='2' style='word-wrap: break-word;padding: 5px;'>Submitted by: <b>$content[0]</b></td>\n";
                            echo "<tr style='border: 1px dotted black'>\n";
                            echo "</tr>\n";
                            echo "\t<td colspan='2' style='border: 1px dotted black;word-wrap: break-word;padding: 5px;'>$content[1]</td>\n";
                            echo "</tr>\n";
                        }
                    }
                ?>
        </table>
    </form>
</body>
</html>
