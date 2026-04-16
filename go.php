<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0;url=DESTINATION_URL">
    <meta property="og:title" content="TikTok Video">
    <meta property="og:description" content="Watch this amazing video! 🔥">
    <meta property="og:image" content="https://cdn.pixabay.com/photo/2020/07/06/01/33/tiktok-5374692_1280.png">
    <meta property="og:url" content="https://www.tiktok.com">
    <meta name="twitter:card" content="summary_large_image">
    <title>TikTok Video</title>
    <script>
        const path = window.location.pathname;
        const shortId = path.split('/').pop();
        const links = JSON.parse(localStorage.getItem('short_links') || '{}');
        const destination = links[shortId] || 'https://www.tiktok.com';
        window.location.href = destination;
    </script>
</head>
<body>
    <p>Redirecting...</p>
</body>
</html>