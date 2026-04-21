<?php
// chrome.php - Instagram'dan gelen linki Chrome'a yönlendirir
$url = isset($_GET['url']) ? urldecode($_GET['url']) : '';

if (empty($url)) {
    die('Geçersiz link');
}

// User-Agent kontrolü (mobil cihaz mı?)
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$isAndroid = stripos($userAgent, 'Android') !== false;
$isiOS = stripos($userAgent, 'iPhone') !== false || stripos($userAgent, 'iPad') !== false;

// Instagram'dan mı geliyor?
$isInstagram = stripos($userAgent, 'Instagram') !== false;

if ($isInstagram) {
    // Instagram WebView'da ise Chrome'a yönlendir
    if ($isAndroid) {
        // Android için intent:// şeması
        $intentUrl = "intent://" . str_replace(['http://', 'https://'], '', $url) . "#Intent;scheme=https;package=com.android.chrome;end";
        header("Location: " . $intentUrl);
    } elseif ($isiOS) {
        // iOS için googlechrome:// şeması
        $chromeUrl = "googlechrome://" . str_replace(['http://', 'https://'], '', $url);
        header("Location: " . $chromeUrl);
    } else {
        // Diğer durumlarda normal yönlendir
        header("Location: " . $url);
    }
} else {
    // Instagram'dan gelmiyorsa doğrudan hedefe git
    header("Location: " . $url);
}
exit;
?>