<?php
$brandName = $brandName ?? 'BoardZone';
if (!defined('BASE_URL')) {
    $calculatedBase = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
    if ($calculatedBase === '.' || $calculatedBase === '/') {
        $calculatedBase = '';
    }
    define('BASE_URL', $calculatedBase);
}
$baseUrl = BASE_URL;
$pageTitle = $pageTitle ?? $brandName;
$pageDescription = $pageDescription ?? 'Deskové hry, výběrová piva a přátelská atmosféra. Rezervujte si stůl v BoardZone online.';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($pageTitle . ' | ' . $brandName, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:site_name" content="<?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:type" content="website">
  <link rel="icon" type="image/svg+xml" href="<?php echo $baseUrl; ?>/assets/icons/favicon.svg">
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/styles.css" media="all">
  <script type="module" src="<?php echo $baseUrl; ?>/assets/js/main.js" defer></script>
</head>
<body class="layout-body">
  <a class="skip-link" href="#main-content">Přeskočit na obsah</a>
<?php // TODO: Symfony layout will render <body> and global assets ?>
