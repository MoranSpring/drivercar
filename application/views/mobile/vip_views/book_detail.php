<style>
        #coach {
            list-style-type:none;
            padding: 0px;
            margin:0px;
        }
        #coach li{
            padding: 3px 3px 3px 0;
        }
        #coach ul{
            list-style-type:none;
            padding: 0px;
            margin: 0px;
        }
        .ml-red{
            color:#C83838;
        }
    </style>
    <link type="text/css" href="<?= base_url() ?>application/css/feedback/feedback.css" rel="stylesheet">
    <header data-am-widget="header" class="am-header am-header-default">
        <div class="am-header-left am-header-nav">
            <a href="javascript:history.back();">
                <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
                     alt="" />&nbsp;
            </a>
        </div>
        <h1 class="am-header-title">
            订单详情
        </h1>
    </header>
    <div class="am-margin-top am-margin-bottom">
        <div class="am-g am-text-md">
            <div class="am-u-sm-4 am-u-md-4 am-text-left" style="color:#aaa; line-height:28px;">
                <?php if($isFinish==0){
                    echo "<span class='am-icon-check' style='color:green;'></span>已学习";
                }else{
                    echo "<span class='am-icon-check' style='color:#bbb;'></span>未学习";
                }?></div>
            <div class="am-u-sm-4 am-u-md-4 am-text-center am-text-lg" style="color:#fff;background:#006BAF;line-height:28px;"><?=$course?></div>
            <div class="am-u-sm-4 am-u-md-4 am-text-right" style="line-height:28px;"><?=$date?></div>
        </div>
    </div>
    <table class="am-table" style="color:#888;background: #fff;margin-bottom: 0px;">
        <tbody>
            <tr>
                <td style="width:28%">内容 </td>
                <td><?=$course_content?></td>
            </tr>
            <tr>
                <td>节数</td>
                <td>第<?= $course_num ?>节课</td>
            </tr>

            <tr>
                <td>教练</td>
                <td><ul id="coach" class="clearfix">
                        <li style="float:left;">
                            <img class="am-circle" src="<?=$imageURL?>" width="70" height="70"/>
                        </li>
                        <li style="float:left;">
                            <ul>
                                <li>
                                    <?= $Name?>
                                </li>
                                <li>
                                    教练等级：<span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span><span class="am-icon-star-half-o ml-red"></span>
                                </li>
                            </ul>
                        </li>
                    </ul></td>
            </tr>
            <tr>
                <td>地点</td>
                <td><?= $school ?></td>
            </tr>
            <tr>
                <td>积分消费</td>
                <td>100RMB</td>
            </tr>
            <tr>
                <td>已学学时</td>
                <td>1课时</td>
            </tr>
            <tr>
                <td>教学建议</td>
                <td><?=$book_suggest?></td>
            </tr>
            <tr>
                <td>我的评价</td>
                <td>
                    <div><span class="am-icon-star ml-red"></span><span class="am-icon-star ml-red"></span></div>
                    <div>FontAwesome 在绘制图标的时候不同图标宽度有差异， 添加 .am-icon-fw 将图标设置为固定的宽度，解决宽度不</div>
      </td>
        </tbody>
         
    </table>
    <!--  分割线 --><div class="" style="width:100%;border-bottom: 1px solid #ddd"></div>

