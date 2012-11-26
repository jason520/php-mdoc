<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/reset.css" />        
        <link rel="stylesheet" type="text/css" href="/assets/css/mdoc.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/highlight/99_solarized_dark.css" />
        <script src="/assets/js/highlight.pack.js" type=text/javascript></script>
        <title><?php echo $siteName; ?></title>
    </head>
    <body>
        <div id="wrapper" >
            <div id="main">
                <?php echo $content; ?>
            </div>
        </div>
        <script>hljs.initHighlightingOnLoad();</script>
    </body>
</html>
