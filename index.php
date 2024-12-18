<?php
$page = 'home'; // Página padrão

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$pageFile = 'pages/' . $page . '.php';

if (file_exists($pageFile)) {
    include $pageFile;
} else {
    // Página não encontrada
    http_response_code(404);
    echo "<h1>404 - Página não encontrada</h1>";
}
?>