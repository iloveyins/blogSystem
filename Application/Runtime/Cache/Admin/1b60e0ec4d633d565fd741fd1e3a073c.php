<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章管理</title>
    <link rel="stylesheet" href="/Public/plugin/layui/css/layui.css">
    <style>
        .layui-btn-small   {
            padding: 0 15px;
        }

        .layui-form-checkbox {
            margin: 0;
        }

        tr td:not(:nth-child(0)),
        tr th:not(:nth-child(0)) {
            text-align: center;
        }

        #dataConsole {
            text-align: center;
        }
        /*分页页容量样式*/
        /*可选*/
        .layui-laypage {
            display: block;
        }

        /*可选*/
        .layui-laypage > * {
            float: left;
        }
        /*可选*/
        .layui-laypage .laypage-extend-pagesize {
            float: right;
        }
        /*可选*/
        .layui-laypage:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        /*必须*/
        .layui-laypage .laypage-extend-pagesize {
            height: 30px;
            line-height: 30px;
            margin: 0px;
            border: none;
            font-weight: 400;
        }
        /*分页页容量样式END*/
    </style>
</head>
<body>
<div style="padding: 10px">
    <fieldset id="dataConsole" class="layui-elem-field layui-field-title"  style="">
        <legend>控制台</legend>
        <div class="layui-field-box">
            <div id="articleIndexTop">
                <form class="layui-form layui-form-pane" action="">
                    <div class="layui-form-item" style="margin:0;margin-top:15px;">
                        <div class="layui-inline">
                            <label class="layui-form-label">分类</label>
                            <div class="layui-input-inline">
                                <select name="city">
                                    <option value="0"></option>
                                    <option value="1">类别1</option>
                                    <option value="2">类别2</option>
                                    <option value="3">类别3</option>
                                </select>
                            </div>
                            <label class="layui-form-label">关键词</label>
                            <div class="layui-input-inline">
                                <input type="text" name="keywords" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-input-inline" style="width:auto">
                                <button class="layui-btn" lay-submit lay-filter="formSearch">搜索</button>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <div class="layui-input-inline" style="width:auto">
                                <a id="addArticle" lay-filter="addArticle" class="layui-btn layui-btn-normal">发表文章</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </fieldset>
    <fieldset id="dataList" class="layui-elem-field layui-field-title sys-list-field" style=";">
        <legend style="text-align:center;">文章列表</legend>
        <div class="layui-field-box">
            <div id="dataContent" class="">
                <!--内容区域 ajax获取-->
                <table style="" class="layui-table" lay-even="">
                    <colgroup>
                        <col width="180">
                        <col>
                        <col width="150">
                        <col width="180">
                        <col width="90">
                        <col width="90">
                        <col width="50">
                        <col width="50">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>发表时间</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>类别</th>
                        <th colspan="2">选项</th>
                        <th colspan="2">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["create_Time"]); ?></td>
                        <td><?php echo ($vo["title"]); ?></td>
                        <td><?php echo ($vo["author"]); ?></td>
                        <td><?php echo ($vo["type_name"]); ?></td>
                        <td>
                            <form class="layui-form" action="">
                                <div class="layui-form-item" style="margin:0;">
                                    <input type="checkbox" name="top" title="置顶" lay-filter="top" checked>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form class="layui-form" action="">
                                <div class="layui-form-item" style="margin:0;">
                                    <input type="checkbox" name="top" title="推荐" lay-filter="recommend" checked>
                                </div>
                            </form>
                        </td>
                        <td>
                            <button class="layui-btn layui-btn-small layui-btn-normal"><i class="layui-icon">&#xe642;</i></button>
                        </td>
                        <td>
                            <button class="layui-btn layui-btn-small layui-btn-danger"><i class="layui-icon">&#xe640;</i></button>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>

                <div id="pageNavs" name="page">
                    <div>  <span class="current">1</span><a class="num" href="/Admin.php?m=Admin&c=Article&a=Index&p=2">2</a><a class="num" href="/Admin.php?m=Admin&c=Article&a=Index&p=3">3</a><a class="num" href="/Admin.php?m=Admin&c=Article&a=Index&p=4">4</a><a class="num" href="/Admin.php?m=Admin&c=Article&a=Index&p=5">5</a> <a class="next" href="/Admin.php?m=Admin&c=Article&a=Index&p=2">>></a> </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>

<!-- layui.js -->
<script src="/Public/plugin/layui/layui.js"></script>

<!-- layui规范化用法 -->
<script type="text/javascript">
    layui.config({
        base: '/Public/js/Admin/'
    }).use(['datalist','Article']);

</script>
</body>
</html>