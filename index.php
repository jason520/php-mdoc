<?php
/**
 * @brief Mdoc - A simple documention site with markdown.
 * @author JonChou <ilorn.mc@gmail.com>
 * @version 0.1
 * @date 2012-11-26
 */

// 载入composer autoload类
include_once __DIR__.'/vendor/autoload.php';

// 载入命名空间
use dflydev\markdown\MarkdownExtraParser;
use mdoc\Template;

// 定义Mdoc文档目录和拓展名
define('MDOC', 'wiki');
define('EXT', '.md');

// 获取文档信息
$dir = isset($_GET['dir']) ? $_GET['dir'] : 'site';
$file = isset($_GET['file']) ? $_GET['file'] : $dir;

// 获取文档完整地址
$path = __DIR__.'/'.MDOC.'/'.$dir.'/'.$file.EXT;
if ( ! file_exists($path)) {
    $path = __DIR__.'/'.MDOC.'/site/404'.EXT;
}

// 读取文档内容，并通过正则提取相关信息
$markdown = file_get_contents($path);
$regex = '/%(.+)%([\s\S]*)/';
preg_match($regex, $markdown, $match);

// 获取template需要的变量
$data = array();
if (empty($match)) {
    $fileinfo = pathinfo($path);
    $data['siteName'] = $fileinfo['filename'];
    $data['content'] = $markdown;
} else {
    $data['siteName'] = $match[1];
    $data['content'] = $match[2];
}

// Markdown转换为HTML
$markdownParser = new MarkdownExtraParser();
$data['content'] = $markdownParser->transformMarkdown($data['content']);

// 模板完整路径
$template = __DIR__.'/template/mdoc.php';

// 实例化模板类
$template = new Template($template, $data);

// 输出内容
echo $template->render();
