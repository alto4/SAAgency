<?php
     $title = "Dashboard";
     $file = "dashboard.php";
     $description = "Lab #1 is captured in this page and demonstrates several skills using PHP, including: database set-up, user login functionality, and...";
     $date = "October 2, 2020";
 
    include "./includes/header.php";    
    
    //header("Location:./sign-in.php");
    //user_authenticate($_SESSION['id']);
    //redirect("sign-in.php");
?>    
<h1 class="h2">Dashboard</h1>
<div class="container d-flex justify-content-center w-100">
    <h3 class="text-success px-5 py-2"><?php echo $message; ?></h3>
</div>

<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Share</button>
    <button class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar"></span>
    This week
    </button>
</div>
</div>

<h2>Section title</h2>
<div class="table-responsive">
<table class="table table-striped table-sm">
    <thead>
    <tr>
        <th>#</th>
        <th>Header</th>
        <th>Header</th>
        <th>Header</th>
        <th>Header</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1,001</td>
        <td>Lorem</td>
        <td>ipsum</td>
        <td>dolor</td>
        <td>sit</td>
    </tr>
    <tr>
        <td>1,002</td>
        <td>amet</td>
        <td>consectetur</td>
        <td>adipiscing</td>
        <td>elit</td>
    </tr>
    <tr>
        <td>1,003</td>
        <td>Integer</td>
        <td>nec</td>
        <td>odio</td>
        <td>Praesent</td>
    </tr>
    <tr>
        <td>1,003</td>
        <td>libero</td>
        <td>Sed</td>
        <td>cursus</td>
        <td>ante</td>
    </tr>
    <tr>
        <td>1,004</td>
        <td>dapibus</td>
        <td>diam</td>
        <td>Sed</td>
        <td>nisi</td>
    </tr>
    <tr>
        <td>1,005</td>
        <td>Nulla</td>
        <td>quis</td>
        <td>sem</td>
        <td>at</td>
    </tr>
    <tr>
        <td>1,006</td>
        <td>nibh</td>
        <td>elementum</td>
        <td>imperdiet</td>
        <td>Duis</td>
    </tr>
    <tr>
        <td>1,007</td>
        <td>sagittis</td>
        <td>ipsum</td>
        <td>Praesent</td>
        <td>mauris</td>
    </tr>
    <tr>
        <td>1,008</td>
        <td>Fusce</td>
        <td>nec</td>
        <td>tellus</td>
        <td>sed</td>
    </tr>
    <tr>
        <td>1,009</td>
        <td>augue</td>
        <td>semper</td>
        <td>porta</td>
        <td>Mauris</td>
    </tr>
    <tr>
        <td>1,010</td>
        <td>massa</td>
        <td>Vestibulum</td>
        <td>lacinia</td>
        <td>arcu</td>
    </tr>
    <tr>
        <td>1,011</td>
        <td>eget</td>
        <td>nulla</td>
        <td>Class</td>
        <td>aptent</td>
    </tr>
    <tr>
        <td>1,012</td>
        <td>taciti</td>
        <td>sociosqu</td>
        <td>ad</td>
        <td>litora</td>
    </tr>
    <tr>
        <td>1,013</td>
        <td>torquent</td>
        <td>per</td>
        <td>conubia</td>
        <td>nostra</td>
    </tr>
    <tr>
        <td>1,014</td>
        <td>per</td>
        <td>inceptos</td>
        <td>himenaeos</td>
        <td>Curabitur</td>
    </tr>
    <tr>
        <td>1,015</td>
        <td>sodales</td>
        <td>ligula</td>
        <td>in</td>
        <td>libero</td>
    </tr>
    </tbody>
</table>

<?php
include "./includes/footer.php";
?>    